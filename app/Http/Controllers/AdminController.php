<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App;
use App\Admin;
use App\Guide;
use App\User;
use App\UserLog;
use Redirect;
use Validator;

class AdminController extends Controller {

    public function __construct() {
        return $this->middleware('admin', ['except' => 'logout']);
    }

    public function adminDashboard() {
        return view('admin/dashboard');
    }

    public function changepassword() {
        $admin = Admin::find(\Auth::guard("admin")->user()->id);
        return view('admin.change_password', ["page_title" => "Admin Change Password", "admin" => $admin]);
    }

    public function savepassword(Request $request) {
        
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed|different:old_password',
            'password_confirmation' => 'required_with:password|min:6',
        ]);
        
        $admin = \Auth::guard('admin')->user();
        if (!\Hash::check($request->old_password, $admin->password)) {
            flash('Old password must be correct')->error();
            return Redirect::back();
        }
        $password = \Hash::make($request->password);
        if ($admin->update(["password" => $password])) {
            flash('Your password has been updated successfully.')->success();
            return Redirect::back();
        }
    }

}
