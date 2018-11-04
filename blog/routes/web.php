<?php

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

Route::get('/', function () {
    return view('blog.index');
})->name('index');
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
    Route::post('create', function (Illuminate\Http\Request $request) {
        return "It is work";
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
    Route::post('edit', function (Illuminate\Http\Request $request) {
        return redirect()->route('admin')->with('info','Post edited new title: ' . $request->input('title'));
    })->name('update_admin');
});
