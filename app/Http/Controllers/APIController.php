<?php

namespace App\Http\Controllers;
use \Illuminate\Http\Request;
use App\User;
use Hash;
use JWTAuth;
class APIController extends Controller
{
	
    public function register(Request $request){        
    	$input = $request->all();
    	$input['password'] = Hash::make($input['password']);
    	User::create($input);
        return response()->json(['result'=>true]);
    }

    public static function generate_token($request){
        if(!$token = JWTAuth::fromUser($request)){
            return false;
        }
        return $token;
    }

    public static function login_user($request){
        
    	if (!$token = JWTAuth::attempt($request)) {
            return false;
        }
        return $token;
    }

    public static function social_login_user($request){
        if (!$token = JWTAuth::fromUser($request)) {
            return false;
        }
        return $token;
    }

    public function login(Request $request){
        $request=$request->all();
        if(isset($request['email']) && $request['email']!=null){
            if(isset($request['password']) && $request['password']!=null){
                if (!$token = JWTAuth::attempt($request)) {
                    return response()->json(['result' => 'wrong email or password.']);
                }
            }else if(isset($request['social_id']) && $request['social_id']!=null){
                if($user=  User::where($request)->first())
                    $token = self::social_login_user($user);
                else
                    return response()->json(['result' => 'invalid request']);
            }else{
                return response()->json(['result' => 'invalid request']);
            }
            return response()->json(['token' => $token]);
        }else{
            return response()->json(['result' => 'invalid request']);
        }
    }
    
    public function get_user_details(Request $request){
    	$user= JWTAuth::toUser($request->header('Authorization'));
        return response()->json(['result' => $user]);
        
    }
    
    public static function get_user($request){
        $user= JWTAuth::toUser($request);
        return $user;
    }
    
    public static function invalid_token($request){
        return JWTAuth::invalidate($request);
    }
    
}
