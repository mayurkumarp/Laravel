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
use App\Author;
use App\Http\Controllers\BookController;

class AuthorController extends Controller
{
    protected $user_id = 0;
    protected $prefix;

    public function __construct(Request $request) {
        $this->prefix = trim($this->getRouter()->getCurrentRoute()->getPrefix(), '/');
        if ($this->prefix == 'admin' || $this->prefix == 'guide' || $this->prefix == 'data' || $this->prefix == 'user' || $this->prefix == 'api/book') {
            return "";
        } else if ($request->header('Authorization') != 'guest') {
            $this->user_id = APIController::get_user($request->header('Authorization'))->id;
        } else {
            return "";
        }
    }
    
    protected function validator(array $data){
        $validations = [
            'user_id' => 'required|exists:users,id',
            'name' => 'required|max:255',
            'city' => 'required|max:255',
            'about' => 'required|max:255',
        ];
        return Validator::make($data, $validations);
    }
    
    protected function create(array $data){
        return Author::create($data);
    }
    
    public function add_author(Request $request){
        $request = $request->all();
        $request = json_decode($request['author'],TRUE);
        $request['user_id'] = $this->user_id;
        $response = Config::get('constant.def_response');
        
        //VALIDATION
        $ch = $this->validator($request);
        if ($ch->fails()) {
            $response['message'] = $ch->errors()->first();
            $response['data'] = (object) 0;
            $response['error_code'] = 1;
        }else{
            if($author = $this->create($request)){
                $response['message'] = "Author details added successfully";
                $response['data'] = $author;
                $response['error_code'] = 0;
            }else{
                $response['message'] = $author->errors()->first();
            }
        }
        return $response;
    }
    
    //List My -DataTable
    protected function my_author_list($isdatatable){
        $response = Config::get('constant.def_response');
        
        $authors = Author::where('user_id', $this->user_id)->get();
        
        if($isdatatable)
            return Datatables::of($authors)->make(true);
        else{
            $response['error_code'] = 0;
            $response['message'] = 'List of Authors';
            $response['data'] = $authors;
            return $response;
        }
        
    }
    
    //Delete
    public function delete_author($id,Request $request){
        $response = Config::get('constant.def_response');
        
        $author = Author::with('books')->find($id);
        
        $response['message'] = 'no Author found!';
        if($author){
            $B = new BookController($request);
            foreach ($author['books'] as $key => &$value) {
                $B->delete_book($value['id']);
            }
            if($author->destroy($id)){
                $response['error_code'] = 0;
                $response['message'] = 'Author is Deleted successfully';
            }
        }
        return $response;
    }
    
    //Update Book
    protected function update_author(Request $request){
        $request = $request->all();
        $request = json_decode($request['author'],TRUE);
        $request['user_id'] = $this->user_id;
        $response = Config::get('constant.def_response');
        
        //VALIDATION
        $ch = $this->validator($request);
        if ($ch->fails()) {
            $response['message'] = $ch->errors()->first();
            $response['data'] = (object) 0;
            $response['error_code'] = 1;
        }else{
            $response['message'] = "No book Found";
            $author = Author::find($request['id']);
            if($author){
                $response['message'] = "Error in updating Author Details";
                $ch = $author->update($request);
                if($ch){
                    $response['message'] = "Book updated successfuly";
                    $response['error_code'] = 0;
                    $response['data'] = $request;
                }
            }
        }
        return $response;
    }
}
