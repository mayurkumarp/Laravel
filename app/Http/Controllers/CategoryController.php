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
use App\Category;
use App\Http\Controllers\BookController;

class CategoryController extends Controller
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
        ];
        return Validator::make($data, $validations);
    }
    
    protected function create(array $data){
        return Category::create($data);
    }
    
    public function add_category(Request $request){
        $request = $request->all();
        $request = json_decode($request['category'],TRUE);
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
                $response['message'] = "Category details added successfully";
                $response['data'] = $author;
                $response['error_code'] = 0;
            }else{
                $response['message'] = $author->errors()->first();
            }
        }
        return $response;
    }
    
    //List My -DataTable
    protected function my_category_list($isdatatable){
        $response = Config::get('constant.def_response');
        
        $authors = Category::where('user_id', $this->user_id)->get();
        
        if($isdatatable)
            return Datatables::of($authors)->make(true);
        else{
            $response['error_code'] = 0;
            $response['message'] = 'List of Categories';
            $response['data'] = $authors;
            return $response;
        }
        
    }
    
    //Delete
    public function delete_category($id,Request $request){
        $response = Config::get('constant.def_response');
        
        $category = Category::with('books')->find($id);
        
        $response['message'] = 'no Category found!';
        if($category){
            $B = new BookController($request);
            foreach ($category['books'] as $key => &$value) {
                $B->delete_book($value['id']);
            }
            if($category->destroy($id)){
                $response['error_code'] = 0;
                $response['message'] = 'Category is Deleted successfully';
            }
        }
        return $response;
    }
    
    //Update Book
    protected function update_category(Request $request){
        $request = $request->all();
        $request = json_decode($request['category'],TRUE);
        $request['user_id'] = $this->user_id;
        $response = Config::get('constant.def_response');
        
        //VALIDATION
        $ch = $this->validator($request);
        if ($ch->fails()) {
            $response['message'] = $ch->errors()->first();
            $response['data'] = (object) 0;
            $response['error_code'] = 1;
        }else{
            $response['message'] = "No category Found";
            $category = Category::find($request['id']);
            if($category){
                $response['message'] = "Error in updating Author Details";
                $ch = $category->update($request);
                if($ch){
                    $response['message'] = "Book updated successfuly";
                    $response['error_code'] = 0;
                    $response['data'] = $category;
                }
            }
        }
        return $response;
    }
}
