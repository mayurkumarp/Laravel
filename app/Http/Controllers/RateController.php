<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Validation;
use App\Helper\HelperFile;
use Validator;
use Illuminate\Database;
use DB;
use Datatables;
use Config;
use App\Rate;

class rateController extends Controller
{
    protected $user_id = 0;
    protected $prefix;

    public function __construct(Request $request) {
        $this->prefix = trim($this->getRouter()->getCurrentRoute()->getPrefix(), '/');
        if ($this->prefix == 'admin' || $this->prefix == 'guide' || $this->prefix == 'data' || $this->prefix == 'user' || $this->prefix == 'api/book/rate') {
            return "";
        } else if ($request->header('Authorization') != 'guest') {
            $this->user_id = APIController::get_user($request->header('Authorization'))->id;
        } else {
            return "";
        }
    }
    protected function validator(array $data) {
        $validations = [
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'rate' => 'required|min:0'
        ];
        return Validator::make($data, $validations);
    }
    
    protected function create(array $data){
        return Rate::create($data);
    }
    
    //Add Book
    protected function rate(Request $request){
        $request = $request->all();
        $request['user_id'] = $this->user_id;
        $response = Config::get('constant.def_response');
        
        //VALIDATION
        $ch = $this->validator($request);
        $response['data'] = (object) 0;
        $response['error_code'] = 1;
        if ($ch->fails()) {
            $response['message'] = $ch->errors()->first();
        }else{
            $response['message'] = "Error in adding Rates";
            if($book = \App\Book::find($request['book_id'])){
                if($book->user_id == $this->user_id){
                    $response['message'] = "You can not rate your own books!";
                    return $response;
                }
                $rate = Rate::where(['user_id'=>$request['user_id'],'book_id'=>$request['book_id']])->first();
                if($rate){
                    $rate->update($request);
                    $response['data'] = $rate;
                    $response['error_code'] = 0;
                    $response['message'] = "Your Rates has been updated successfully";
                }else{
                    if($rate = $this->create($request)){
                        $response['data'] = $rate;
                        $response['error_code'] = 0;
                        $response['message'] = "Your Rates has been added successfully";
                    }
                }
            }
        }
        return $response;
    }
}
