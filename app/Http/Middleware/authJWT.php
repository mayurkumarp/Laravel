<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Request;
class authJWT
{
    public function handle($request, Closure $next)
    {
        try {
            if(Request::header('Authorization')=='guest')
                return $next($request);
            $user=JWTAuth::toUser(Request::header('Authorization'));
//            JWTAuth::invalidate(Request::header('Authorization'));
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json(['error_code'=>401,'message'=>'Token is Invalid'],401);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return response()->json(['error_code'=>401,'message'=>'Token is Expired'],401);
            }else{
                return response()->json(['error_code'=>401,'message'=>'Bad credentials'],401);
            }
        }
        return $next($request);
    }
}
