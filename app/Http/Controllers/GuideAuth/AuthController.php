<?php

namespace App\Http\Controllers\GuideAuth;

use Illuminate\Http\Request;
use App\Guide;
use App\Trip;
use App\Trip_Review;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Contracts\Auth\Authenticatable;
use Auth;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    
    protected $guard='guide';
    protected $redirectTo = '/guide/login';
    
    public function showLoginForm(){
        if (Auth::guard('guide')->check()){
                return redirect()->route('guide.dashboard');
        }
        return view('auth.login');
    }
    
    public function showRegisterationForm(){
            return view('guide/register_form');
    }
    
    public function resetPassword(){
            return view('auth.passwords.email');
    }

    public function logout(){
            Auth::guard('guide')->logout();
            return redirect('/guide/login');
    }
    
    protected function create(array $data){
        $data['password'] = bcrypt($data['password']);
        return Guide::create($data);
    }
    
    protected function validator(array $data){
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'gender' => 'required',
            'email' => 'required|email|max:255|unique:guides',
            'password' => 'required|min:6|confirmed',
            'phone_number' => 'required|digits:10',
            'address' => 'required',
            'city' => 'required',
//            'state' => 'required',
//            'about' => 'required',
//            'activities' => 'required',
        ]);
    }

    /*public function createGuide(Request $request){
        $ch=  $this->validator($request->all());
        if($ch->fails()){
            return back()->withInput()->withErrors($ch);
        }  else {
            $request['password']=  bcrypt($request['password']);
            if($guide= $this->create($request->all())){
                $login['email']=$guide['email'];
                $login['password']=$request['password'];
                if((Auth::guard('guide')->attempt($login))){
                    $guide= Auth::guard('guide')->user();
                    return redirect('/guide/dashboard')->with('flash_message_success','Welcome Guide');
                }else{
                    return back()->withInput()->with('flash_message_error','Credentials not matched!');
                }
            }
        }
    }*/
    
}
