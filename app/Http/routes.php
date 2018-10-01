<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::auth();

Route::get('/', 'HomeController@index');

//ADMIN ROUTES 
Route::group(['prefix'=>'/admin'],  function (){
    Route::get('',['as'=>'/','uses'=>'AdminAuth\AuthController@showLoginForm']);
    Route::get('/login',['as'=>'admin.login','uses'=>'AdminAuth\AuthController@showLoginForm']);
    Route::post('/login','AdminAuth\AuthController@login');
    Route::get('/register','AdminAuth\AuthController@showRegisterationForm');
    Route::post('/register','AdminAuth\AuthController@register');
    Route::get('/logout','AdminAuth\AuthController@logout');
    Route::group(['middleware'=>'admin'], function (){
        Route::get('/dashboard',['as'=>'admin.dashboard','uses'=>'AdminController@adminDashboard']);
        Route::get('/change-password', 'AdminController@changepassword');
        Route::post('/savepassword', 'AdminController@savepassword');
    });
});

//GUIDE ROUTES
Route::group(['prefix'=>'/guide'],  function (){
    Route::get('',['as'=>'/','uses'=>'GuideAuth\AuthController@showLoginForm']);
    Route::get('/login',['as'=>'guide.login','uses'=>'GuideAuth\AuthController@showLoginForm']);
    Route::post('/login','GuideAuth\AuthController@login');
    Route::get('/register',['as'=>'guide.register','uses'=>'GuideAuth\AuthController@showRegisterationForm']);
    Route::post('/register','GuideAuth\AuthController@register');
    Route::get('/logout','GuideAuth\AuthController@logout');
    Route::group(['middleware'=>'guide'],function(){
        Route::get('/dashboard',['as'=>'guide.dashboard','uses'=>'GuideController@guideDashboard']);
        Route::get('/profile', 'GuideController@profile');
        Route::post('/savepassword', 'GuideController@savepassword');
        Route::post('/updateprofile', 'GuideController@updateprofile');

    });
    
});

Route::group(['prefix'=>'/api'],  function (){
        Route::post('/user/authenticate', 'APIController@login');
  //JWT AUTH=======================================================================
    Route::group(['middleware' => 'jwt-auth'], function () {
        Route::post('/user/login','UserController@login');
        Route::post('/user/register','UserController@register');
        Route::post('/user/forgot_password','UserController@forgotPassword');
    	//Route::get('get-user-details', 'APIController@get_user_details');
        Route::get('/user-profile','UserController@detail');
        Route::post('/user/update','UserController@update');
        Route::post('/user/change-password','UserController@change_password');
        Route::get('/user/dashboard','UserController@dashboard');
        
        Route::post('/book/add','BookController@add_book');
        Route::delete('/book/delete/{id}','BookController@delete_book');
        Route::post('/book/update','BookController@update_book');
        Route::any('/book/mylist','BookController@my_book_list');
        Route::any('/book/list','BookController@book_list');
        
        Route::post('/book/rate','RateController@rate');
        
        Route::post('/author/add','AuthorController@add_author');
        Route::any('/author/list/{isdatatable}','AuthorController@my_author_list');
        Route::delete('/author/delete/{id}','AuthorController@delete_author');
        Route::post('/author/update','AuthorController@update_author');
        
        Route::post('/category/add','CategoryController@add_category');
        Route::any('/category/list/{isdatatable}','CategoryController@my_category_list');
        Route::delete('/category/delete/{id}','CategoryController@delete_category');
        Route::post('/category/update','CategoryController@update_category');
        
    });
});
Route::group(['prefix'=>'user'],  function (){
    Route::get('/reset_password_form','UserController@resetPasswordForm');
    Route::post('reset_password','UserController@resetPassword');
    Route::post('/forgot_password','UserController@forgotPassword');
});

//DATATABLE ROUTES
Route::group(['prefix'=>'/data'],  function (){
	
});
