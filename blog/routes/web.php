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
Route::get('post/{id}',function($id){
    if($id == 1){
        $post=[
            'title'=>'Learning Laravel',
            'content'=>'Mollit proident velit pariatur velit et dolor adipisicing occaecat ullamco dolor nisi velit.'
        ];
    }else{
        $post=[
            'title'=>'happy feast',
            'content'=>'Cillum aliqua aliquip adipisicing elit mollit nulla pariatur minim quis.'
        ];
    }
    return view('blog.post',['post'=>$post]);
})->name('post');
Route::get('about', function () {
    return view('other.about');
})->name('about');

Route::group(['prefix'=>'admin'],function(){
    Route::get('', function () {
        return view('admin.index');
    })->name('admin');
    Route::get('create', function () {
        return view('admin.create');
    })->name('create_admin');
    Route::post('create', function (Request $request) {
        $request->validate([
            'title'=>'required|min:5',
            'content'=>'required|min:10'
        ]);
        return redirect()->route('admin')->with('info','Post edited new title: ' . $request->input('title'));
    })->name('create_admin');
    Route::get('edit/{id}', function ($id) {
        if($id == 1){
            $post=[
                'title'=>'Learning Laravel',
                'content'=>'Mollit proident velit pariatur velit et dolor adipisicing occaecat ullamco dolor nisi velit.'
            ];
        }else{
            $post=[
                'title'=>'happy feast',
                'content'=>'Cillum aliqua aliquip adipisicing elit mollit nulla pariatur minim quis.'
            ];
        }
        return view('admin.edit',['post'=>$post]);
    })->name('edit_admin');
    Route::post('edit', function (Request $request) {
        $request->validate([
            'title'=>'required|min:5',
            'content'=>'required|min:10'
        ]);
        return redirect()->route('admin')->with('info','Post edited new title: ' . $request->input('title'));
    })->name('update_admin');
});
