<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Config;
use Auth;
use App\Guide;
use DB;
use Datatables;
use Redirect;
use Validator;

class GuideController extends Controller {

    protected $guard = 'guide';
    protected $redirectTo = '/guide/login';
    protected $user_id = 0;
    protected $prefix;

    //Get a validator for an incoming registration request.
    public function __construct(Request $request) {
        $this->prefix = trim($this->getRouter()->getCurrentRoute()->getPrefix(), '/');
        if ($this->prefix == 'admin' || $this->prefix == 'guide' || $this->prefix == 'data') {
            return "";
        } else if ($request->header('Authorization') != 'guest') {
            $this->user_id = APIController::get_user($request->header('Authorization'))->id;
        } else {
            return "";
        }
    }

    public function index() {
        return redirect()->route('guide.login');
    }

    public function guideDashboard() {
        return view('guide/dashboard');
    }

    public function destroy($id) {
        return Guide::destroy($id);
    }

    public function profile() {
        $guide = Guide::find(\Auth::guard("guide")->user()->id);
        return view('guide.profile', ["page_title" => "Guide Profile", "guide" => $guide]);
    }

    public function updateprofile(Request $request) {
        $guide = \Auth::guard('guide')->user();
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:guides,email,'.$guide->id,
            'phone_number' => 'required|digits:10',
            'gender' => 'required',
            'city' => 'required',
            'address' => 'required',
        ]);
        $input = $request->all();
        $input["id"] = \Auth::guard('guide')->user()->id;
        if ($guide->update($input)) {
            flash('Personal Information has been updated successfully.')->success();
            return Redirect::back();
        }
    }

    public function savepassword(Request $request) {

        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed|different:old_password',
            'password_confirmation' => 'required_with:password|min:6',
        ]);

        $guide = \Auth::guard('guide')->user();
        if (!\Hash::check($request->old_password, $guide->password)) {
            flash('Old password must be correct')->error();
            return Redirect::back();
        }
        $password = \Hash::make($request->password);
        if ($guide->update(["password" => $password])) {
            flash('Your password has been updated successfully.')->success();
            return Redirect::back();
        }
    }

}
