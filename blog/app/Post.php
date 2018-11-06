<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request as Request;

class Post extends Model
{
    public function getPosts(Request $request){
        if(!$request->session()->has('posts')){
            $this->fillDummyData($request);
        }
        return $request->session()->get('posts');
    }
    public function fillDummyData(Request $request){
        $posts =[[
            'title' => 'This Title for the none first dummy data',
            'content' => 'This first dummy data'
        ],[
            'title' => 'This Title for second dummy data',
            'content' => 'This second dummy data'
        ]] ;
        $request->session()->put('posts',$posts);
    }
}
