<?php

namespace App\Http\Controllers;

use App\User;
use App\UserLog;
use App\Follow;
use App\Trip;
use App\Rate;
use App\Helper\HelperFile;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Database;
use DB;
use Datatables;
use Config;
use Illuminate\Validation;
use Mail;
use App\Book;
use App\Author;
use App\Category;

class UserController extends Controller {

    protected $user_id = 0;
    protected $prefix;

    public function __construct(Request $request) {
        $this->prefix = trim($this->getRouter()->getCurrentRoute()->getPrefix(), '/');
        if ($this->prefix == 'admin' || $this->prefix == 'guide' || $this->prefix == 'data' || $this->prefix == 'user' || $this->prefix == 'api/user') {
            return "";
        } else if ($request->header('Authorization') != 'guest') {
            $this->user_id = APIController::get_user($request->header('Authorization'))->id;
        } else {
            return "";
        }
    }

    protected function validator(array $data) {
        $validations = [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'device_type' => 'required',
            'email' => 'required|unique:users|email|max:255'
        ];

        if ($this->getRouter()->getCurrentRoute()->getPrefix() != '/api') {
            return Validator::make($data, $validations);
        } else {
            if (!isset($data['is_social'])) {
                $validations['password'] = 'required|min:6';
            } else {
                $validations['social_id'] = 'required';
                $validations['social_profile'] = 'required';
            }
            return Validator::make($data, $validations);
        }
    }

    protected function validat_update(array $data) {
        if (isset($data['profile_img'])) {
            $validations = ['profile_img' => 'required | mimes:jpeg,jpg,png'];
        } else {
            $validations = [
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'address' => 'required',
            ];
        }
        return Validator::make($data, $validations);
    }

    protected function login_validator(array $data) {
        $validations = [
            'email' => 'required|max:255',
            'device_type' => 'required',
        ];
        if (isset($data['device_type']) && $data['device_type'] != 'web')
            $validations['device_token'] = 'required';
        if ($this->getRouter()->getCurrentRoute()->getPrefix() != '/api') {
            return Validator::make($data, $validations);
        } else {
            if (!isset($data['is_social'])) {
                $validations['password'] = 'required';
            } else {
                $validations['social_id'] = 'required';
            }
            return Validator::make($data, $validations);
        }
    }

    protected function create(array $data) {
//        if($this->getRouter()->getCurrentRoute()->getPrefix()=='/api'){
        if (!isset($data['is_social']))
            $data['password'] = bcrypt($data['password']);
        return User::create($data);
    }

    public function bindUserData($user, $viewer_id = 0) {

        $user['phone_number'] = "" . $user['phone_number'];
        $user['address'] = "" . $user['address'];
        $user['city'] = "" . $user['city'];
        $user['state'] = "" . $user['state'];
        $user['country'] = "" . $user['country'];
        $user['is_social'] = "" . $user['is_social'];
        $user['social_id'] = "" . $user['social_id'];
        $user['user_profile'] = HelperFile::getUserProfile($user);

        return $user;
    }

    public function login(Request $request) {
        $response = Config::get('constant.def_response');
        $request = $request->all();
        //VALIDATION
        $ch = $this->login_validator($request);
        if ($ch->fails()) {
            $response['message'] = $ch->errors()->first();
            $response['error_code'] = 1;
        } else {
            if (isset($request['password'])) {
                //USER
                $userdata = array(
                    'email' => $request['email'],
                    'password' => $request['password'],);
                $token = APIController::login_user($userdata);
            } else {
                //SOCIAL
                $userdata = array(
                    'email' => $request['email'],
                    'social_id' => $request['social_id'],);
                if ($user = User::with('user_notify')->where($userdata)->first()) {
                    $token = APIController::social_login_user($user);
                } else
                    $token = FALSE;
            }
            if ($token) {
                $user = APIController::get_user($token);

                $user_ID = $user['id'];
                if ($request['device_type'] != 'web') {
                    $user_log = array(
                        'device_type' => $request['device_type'],
                        'device_token' => $request['device_token']
                    );
                    //CHECK IF TOKEN EXIST OR NOT
                    if (!UserLog::where('user_id', $user_ID)->exists()) {
                        //INSERT
                        $userlog = new UserLog($user_log);
                        $user->userlogs()->save($userlog);
                    } else {
                        //UPDATE
                        $user->userlogs()->update($user_log);
                    }
                }
                $user = $this->bindUserData($user);
                $user['token'] = $token;
                //RETURN RESPONCE
                $response = ['error_code' => 0, 'message' => 'user logged in successfully', 'data' => $user];
                //            DB::table('user_log')->inser($user_log);
            } else {
                $response = ['error_code' => 1, 'message' => "Incorrect credentials!"];
            }
        }
        return ($response);
    }

    public function register(Request $request) {
        $request->hasFile('profile_img') == 1 ? $file = $request->file('profile_img') : $file = FALSE;
        $request = $request->all();
        $response = Config::get('constant.def_response');

        //VALIDATION
        $ch = $this->validator($request);
        if ($ch->fails()) {
            $response['message'] = $ch->errors()->first();
            $response['data'] = (object) 0;
            $response['error_code'] = 1;
        } else {
            if (isset($request['is_social']) && $request['is_social'] != null) {
                //REGISTER THROUGH SOCIAL
                if (isset($request['profile_img']))
                    unset($request['profile_img']);

                $user = User::where('email', '=', $request['email'])->first();
                if (!$user) {
                    $uname = explode("@", $request['email'], 2);
                    $request['username'] = $uname[0];
                    $user = $this->create($request);
                    $user = User::where('id', '=', $user['id'])->first();
                } else {
                    if ($user->update([
                                'is_social' => $request['is_social'],
                                'social_id' => $request['social_id'],
                                'social_profile' => $request['social_profile']])) {
                        $user = User::where('id', '=', $user->id)->first();
                    }
                }
                $user['user_profile'] = $user['social_profile'];
            } else {
                //REGISTER THROUGH EMAIL
                //PROFILE
                $topath = Config::get('constant.image_profile');
                if (($file)) {
                    $profile = HelperFile::uploadImage($file, $topath);
                    if ($profile != null) {
                        $request['profile_img'] = $profile;
                    }
                }
                //UNIQUE USER
                $uname = explode("@", $request['email'], 2);
                $request['username'] = $uname[0];
//                dd($uname[0]);
                $user = $this->create($request);
                $user = User::where('id', '=', $user['id'])->first();
                //SET USER DEFAULT IMAGE
                if ($file) {
                    $user['user_profile'] = HelperFile::getimageURL($user['profile_img'], $topath);
                } else {
                    $user['user_profile'] = HelperFile::getimageURL('default_sm.png', $topath);
                }
            }
            $user_d = $this->bindUserData($user);
            $token = APIController::generate_token($user_d);
            $user['token'] = $token;
            if (isset($user)) {
                //LOG FOR API USER
                $user_log = new UserLog();
                $user_log->user_id = $user['id'];
                $user_log->device_type = $request['device_type'];
                $user_log->device_token = $request['device_token'];
                $user_log->save();
                $response = ['error_code' => 0,
                    'message' => 'User Registered successfully',
                    'data' => $user];
            }
        }
        return $response;
    }

    public function update(Request $request) {
        $request->hasFile('profile_img') == 1 ? $file = $request->file('profile_img') : $file = FALSE;

        $request = $request->all();
        $response = Config::get('constant.def_response');
        $response['message'] = 'Not a valid user';
        //VALIDATION
        $ch = $this->validat_update($request);
        if ($ch->fails()) {
            $response['message'] = $ch->errors()->first();
            $response['error_code'] = 1;
        } else {
            $user = User::where('id', '=', $this->user_id)->first();
            if ($user) {
                //PROFILE
                $topath = Config::get('constant.image_profile');
                if (($file)) {
                    if ($user['profile_img'])
                        unlink($_SERVER['DOCUMENT_ROOT'] . "$topath" . $user['profile_img']);

                    $profile = HelperFile::uploadImage($file, $topath);
                    if ($profile != null)
                        $request['profile_img'] = $profile;
                }
                if ($user->update($request)) {
                    $user = User::where('id', '=', $user->id)->first();
                }
                $user = $this->bindUserData($user);
                if (isset($user['profile_img']))
                    unset($user['profile_img']);

                $response = ['error_code' => 0,
                    'message' => 'User Updated successfully',
                    'data' => $user];
            }
        }
        return $response;
    }

    public function change_password(Request $request) {
        $token = $request->header('Authorization');
        $user = APIController::get_user($token);
        $response = Config::get('constant.def_response');
        $request = $request->all();

        Validator::extend('old_password', function ($attribute, $value, $parameters, $validator) {
            return \Hash::check($value, current($parameters));
        });

        function validate($data, $user) {
            $validations = [
                'old_password' => 'required| min:6 | old_password:' . $user->password,
            ];
            if (isset($data['old_password']))
                $validations['new_password'] = 'required | min:6 | not_in:' . $data['old_password'];
            return Validator::make($data, $validations, [
                        'old_password' => 'old password not matched'
            ]);
        }

        $ch = validate($request, $user);
        if ($ch->fails())
            $response['message'] = $ch->errors()->first();
        else {

            if (User::where('id', '=', $user->id)
                            ->update(['password' => bcrypt($request['new_password'])]))
                if (APIController::invalid_token($token))
                    $response['error_code'] = 0;
            $response['message'] = 'password updated successfully';
        }
        return $response;
    }

    public function forgotPassword(Request $request) {
        $request = $request->all();
        $response = Config::get('constant.def_response');
        $user = User::where('email', '=', $request['email'])->first();

        if ($user) {
            $data = ['to' => 'geektechie712@gmail.com', 'from' => 'geektechie712@gmail.com',
                'name' => $user->first_name . " " . $user->last_name,
                'subject' => "Link for change password"];

            $url = url('/') . '/user/reset_password_form?email=' . base64_encode($request['email']);
            Mail::send('auth.emails.password', array('url' => $url), function ($m) use($data) {
                $m->from($data['from'], '');
                $m->to($data['to'], $data['name']);
                $m->subject($data['subject']);
            });

            $response = ['error_code' => 0, 'status' => 'success', 'message' => 'mail sent successfully'];
            if (isset($request['device_token']))
                return $response;
            else
                return self::resetPasswordForm();
        }else {
            unset($response['data']);
            $response['message'] = 'user does not exists';
            if (isset($request['device_token']))
                return $response;
            else
                return back()->with('msg_err', 'user does not exists');
        }
    }

    public function resetPasswordForm() {
        return view('auth/passwords/reset');
    }

    public function resetPassword(Request $request) {
        $request = $request->all();

        $request['email'] = base64_decode($request['email']);
        $request['password'] = bcrypt($request['password']);
        $response = Config::get('constant.def_response');

        $user = User::where('email', '=', $request['email'])->first();
        $response['message'] = "error in password resetting";
        if ($user) {
            $user->update(['password' => $request['password']]);
            $response['error_code'] = 0;
            $response['message'] = "password reset successfully";
        }
        return redirect(url('/login'))->with('flash_message_success', "your password has been changed. \n Please login with new password!");
    }

    public function detail() {
        $id = $this->user_id;
        if ($this->getRouter()->getCurrentRoute()->getPrefix() != '/api') {
            //WEB
            $page = [
                'page_name' => 'User',
                'sub' => 'Detail'
            ];
            $user = User::where('id', '=', $id)->with('usersocial', 'trips')->first();
            return view('user.detail')->with("user", $user)->with("page", $page);
        } else {
            //API
            $response = Config::get('constant.def_response');

            if ($user = User::where('id', '=', $id)->first()) {
                $user = $this->bindUserData($user, $this->user_id);
                $response['error_code'] = 0;
                $response['message'] = 'User Profile found';
                $response['data'] = $user;
            } else {
                $response['message'] = 'No user found';
            }
            return $response;
        }
    }
    
    
    //DAshboard
    protected function dashboard(){
        $B = Book::with('rates')->where('user_id',$this->user_id)->get();
        $Name = [];$Rate=[];
        foreach ($B as $key => &$book) {
            $v=0;
            foreach ($book['rates'] as $k => &$value) {
                $v+=$value['rate'];
            }
            $v = $v / (count($book['rates']) ? count($book['rates']) : 1);
            $Name[] = $book['name'];
            $Rate[] = $v;
        }
        $books = $B->count();
        $users = User::get()->count();
        $authors = Author::where('user_id',$this->user_id)->get()->count();
        $categories = Category::where('user_id',$this->user_id)->get()->count();
        $response = Config::get('constant.def_response');
        $response['error_code'] = 0;        
        $response['message'] = 'data found';
        $data = ['books'=>$Name,'rates'=>$Rate,'books_c'=>$books,'users_c'=>$users,'authors_c'=>$authors,'categories_c'=>$categories];
        $response['data'] = $data;
        return $response;
    }

}
