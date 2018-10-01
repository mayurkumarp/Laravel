<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Auth;
use Route;
use Config;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Contracts\Auth\Authenticatable;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    public function __construct(){
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    public function adminDashboard(){
        return view('admin/dashboard');
    }

    public function showRegisterationForm(){
        return view('auth/register_form');
    }

    protected function validator(array $data){
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'gender' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
//            'phone_number' => 'required|digits:10',
//            'address' => 'required',
//            'city' => 'required',
//            'state' => 'required',
//            'about' => 'required',
//            'activities' => 'required',
        ]);
    }

    protected function create(array $data){
        $data['password'] = bcrypt($data['password']);
        return User::create($data);
    }
    


    
    
}
