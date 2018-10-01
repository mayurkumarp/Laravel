<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use App\Admin;
use App\Blog;
use App\Bookie;
use App\Comment;
use App\Guide;
use App\Hotel;
use App\Like;
use App\Media;
use App\Trip;
use App\User;
use App\UserLog;
use Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Contracts\Auth\Authenticatable;
use Auth;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    
    protected $guard='admin';
    protected $redirectTo = '/admin/login';
    
    public function showLoginForm(){
        if (Auth::guard('admin')->check()){
                return redirect()->route('admin.dashboard');
        }
        return view('auth.login');
    }
    
    public function showRegisterationForm(){
            return view('admin/register_form');
    }

    public function resetPassword(){
            return view('admin.auth.passwords.email');
    }

    public function logout(){
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login');
    }
    
    protected function validator(array $data){
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|min:6|confirmed',
        ]);
    }
    
    protected function create(array $data){
        $data['password'] = bcrypt($data['password']);
        return Admin::create($data);
    }
    
   
}
