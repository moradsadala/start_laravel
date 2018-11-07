<?php

use Illuminate\Support\Facades\Validator;
//use Illuminate\Validation\Validator as newValidator;
use Illuminate\Http\Request as Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PostController@getIndex')->name('index');
Route::get('post/{id}','PostController@getPost')->name('post');


Route::get('about', function () {
    return view('other.about');
})->name('about');



// admin routes
Route::group(['prefix'=>'admin'],function(){

    Route::get('', 'PostController@getAdminIndex')->name('admin'); //get admin index
    Route::get('create', function () {     //get method to create post
        return view('admin.create');
    })->name('create_admin');
    Route::post('create', 'PostController@addPost')->name('create_admin');  //post method to create post


    Route::get('edit/{id}', 'PostController@viewPost')->name('edit_admin');

    Route::post('edit/{id}','PostController@editPost')->name('update_admin');
    Route::get('delete','PostController@deleteAll')->name('delete_all_posts');
});
