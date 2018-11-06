<?php

namespace App\Http\Controllers;


use App\Post;
use Illuminate\Http\Request as Request;
//use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function getIndex(Request $request){
        $post = new Post();
        $posts = $post->getPosts($request);
        return view('blog.index',['posts'=>$posts]);

    }

    
    
}
