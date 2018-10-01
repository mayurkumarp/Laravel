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
use App\Book;

class BookController extends Controller
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
    
    protected function validator(array $data) {
        $validations = [
            'user_id' => 'required|exists:users,id',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:category,id',
            'name' => 'required|max:255',
            'price' => 'required|min:1',
            'qty' => 'required|min:0'
        ];
        
        if(key_exists('cover',$data)){
            $validations['cover'] = 'required|mimes:jpg,jpeg,png';
        }
        if(key_exists('pdf',$data)){
            $validations['pdf'] = 'required|mimes:pdf';
        }
        return Validator::make($data, $validations);
    }
    
    protected function create(array $data){
        return Book::create($data);
    }
    
    //Add Book
    protected function add_book(Request $request){
        $request = $request->all();
        
        $cover = isset($request['cover']) ? $request['cover'] : FALSE;
        $pdf = isset($request['pdf']) ? $request['pdf'] : FALSE;
        $request = json_decode($request['book'],TRUE);
        $request['user_id'] = $this->user_id;
        $request['cover'] = $cover;
        $request['pdf'] = $pdf;
        $response = Config::get('constant.def_response');
        
        //VALIDATION
        $ch = $this->validator($request);
        if ($ch->fails()) {
            $response['message'] = $ch->errors()->first();
            $response['data'] = (object) 0;
            $response['error_code'] = 1;
        }else{
            
            $response['message'] = "Book cover is required";
            if(!is_file($cover)){
                return $response;
            }
            $response['message'] = "Book pdf is required";
            if(!is_file($pdf)){
                return $response;
            }
            
            //Add Cover
            $topath = Config::get('constant._cover');
            if($cover = HelperFile::uploadImage($cover, $topath)){
                $request['cover'] = $cover;
            }else{
                $response['message'] = $cover->getErrorMessage();
            }
            //Add PDf
            $topathpdf = Config::get('constant._pdf');
            if($pdf = HelperFile::uploadFile($pdf, $topathpdf)){
                $request['pdf'] = $pdf;
            }else{
                $response['message'] = $pdf->getErrorMessage();
            }
            //Add Book
            if($book = $this->create($request)){
                $book['cover'] = HelperFile::getimageURL($cover,$topath);
                $book['pdf'] = HelperFile::getimageURL($pdf,$topathpdf);
                $response['message'] = "Book added successfully";
                $response['data'] = $book;
                $response['error_code'] = 0;
            }else{
                $response['message'] = $book->errors()->first();
            }
            
        }
        return $response;
    }
    
    //List My -DataTable
    protected function my_book_list(Request $request){
        $request = $request->all();
        $response = Config::get('constant.def_response');
        $topath = Config::get('constant._cover');
        $topathpdf = Config::get('constant._pdf');
        
        $books = Book::withCount('rates')->with('author','category')
                ->where('user_id', $this->user_id)->get();
        foreach ($books as $key => &$book) {
            $v=0;
            $book['cover'] = HelperFile::getimageURL($book['cover'], $topath);
            $book['pdf'] = HelperFile::getimageURL($book['pdf'], $topathpdf);
            $books[$key]['author_name'] = $book['author']->name;
            $books[$key]['category_name'] = $book['category']->name;
            unset($books[$key]['author']);
            unset($books[$key]['category']);
            foreach ($book['rates'] as $k => &$value) {
                $v+=$value['rate'];
            }
            $v = $v / (count($book['rates']) ? count($book['rates']) : 1);
            $books[$key]['rate'] = $v;
            unset($books[$key]['rates']);
        }
        return Datatables::of($books)->make(true);
        
    }
    
    //List All -DataTable
    protected function book_list(Request $request){
        $request = $request->all();
        $response = Config::get('constant.def_response');
        $topath = Config::get('constant._cover');
        $books = Book::withCount('rates')->with('author','user')->get();
        foreach ($books as $key => &$book) {
            $v=0;
            $book['cover'] = HelperFile::getimageURL($book['cover'], $topath);
            
            $books[$key]['author_name'] = $book['author']->name;
            unset($books[$key]['author']);
            if($book['user']->id == $this->user_id)
                $books[$key]['user_name'] = 'you';
            else
                $books[$key]['user_name'] = $book['user']->first_name.' '.$book['user']->last_name.'('.$book['user']->username.')';
            unset($books[$key]['user']);
            
            if(count($book['rates'])){
                foreach ($book['rates'] as $k => &$value) {
                    $v+=$value['rate'];
                }
            }
            $v = $v / (count($book['rates']) ? count($book['rates']) : 1);
            $books[$key]['rate'] = $v;
            unset($books[$key]['rates']);
        }
        return Datatables::of($books)->make(true);
        
    }
    
    //Delete
    public function delete_book($id){
        $response = Config::get('constant.def_response');
        $topath=Config::get('constant._cover');
        $topathpdf=Config::get('constant._pdf');
        $book = Book::where('user_id', $this->user_id)
                ->Where('id',$id)
                ->first();
        if(count($book)){
            //Delete Cover
            if(is_file($_SERVER['DOCUMENT_ROOT']."$topath".$book['cover']) && $book['cover'] != 'default.jpg')
                unlink ($_SERVER['DOCUMENT_ROOT']."$topath".$book->cover);
            //Delete PDf
            if(is_file($_SERVER['DOCUMENT_ROOT']."$topathpdf".$book['pdf']))
                unlink ($_SERVER['DOCUMENT_ROOT']."$topathpdf".$book->pdf);
            $book = $book->delete();
            if($book){
                $response['error_code'] = 0;
                $response['message'] = 'Book Deleted';
            }else{
                $response['message'] = 'Book Deleted';
            }
        }else{
            $response['message'] = 'Not a valid user';
        }
        return $response;
    }
    
    //Update Book
    protected function update_book(Request $request){
        $request = $request->all();
        $cover = isset($request['cover']) ? $request['cover'] : FALSE;
        $pdf = isset($request['pdf']) ? $request['pdf'] : FALSE;
        $request = json_decode($request['book'],TRUE);
        $request['user_id'] = $this->user_id;
        if($cover)
            $request['cover'] = $cover;
        else
            unset($request['cover']);
        
        if($pdf)
            $request['pdf'] = $pdf;
        else
            unset($request['pdf']);
        $response = Config::get('constant.def_response');
                
        //VALIDATION
        $ch = $this->validator($request);
        if ($ch->fails()) {
            $response['message'] = $ch->errors()->first();
            $response['data'] = (object) 0;
            $response['error_code'] = 1;
        }else{
            $response['message'] = "No book Found";
            $book = Book::find($request['id']);
            if($book){
                $topath = Config::get('constant._cover');
                $response['message'] = "Error in updating Book, Try again";
                if($cover){
                    //Delete Old
                    if(is_file($_SERVER['DOCUMENT_ROOT']."$topath".$book['cover']) && $book['cover'] != 'default.jpg')
                        unlink ($_SERVER['DOCUMENT_ROOT']."$topath".$book->cover);
                    
                    //Upload New
                    if ($cover = HelperFile::uploadImage($cover,$topath)) {
                        $request['cover']=$cover;
                    }else{
                        $response['message'] = $cover->getErrorMessage();
                    }
                }else{
                    //$cover = $request['cover'];
                    unset($request['cover']);
                }
                if($pdf){
                    $topathpdf = Config::get('constant._pdf');
                    //Delete Old
                    if(is_file($_SERVER['DOCUMENT_ROOT']."$topathpdf".$book['pdf']))
                        unlink ($_SERVER['DOCUMENT_ROOT']."$topathpdf".$book->pdf);
                    
                    //Upload New
                    if ($pdf = HelperFile::uploadFile($pdf,$topathpdf)) {
                        $request['pdf']=$pdf;
                    }else{
                        $response['message'] = $pdf->getErrorMessage();
                    }
                }else{
                    //$pdf = $request['pdf'];
                    unset($request['pdf']);
                }
                $ch = $book->update($request);
                if($ch){
                    if($cover)
                        $request['cover'] = HelperFile::getimageURL($cover,$topath);
                    if($pdf)
                        $request['pdf'] = HelperFile::getimageURL($pdf,$topathpdf);
                    $response['message'] = "Book updated successfuly";
                    $response['error_code'] = 0;
                    $response['data'] = $request;
                }
            }
        }
        return $response;
    }
    
    
}
