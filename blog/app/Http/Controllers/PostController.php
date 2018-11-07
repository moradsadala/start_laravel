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
    public function getAdminIndex(Request $request){
        $post = new Post();
        $posts = $post->getPosts($request);
        return view('admin.index',['posts'=>$posts]);

    }
    public function getPost(Request $request, $id){
        $post = new Post();
        $post = $post->getPost($request,$id);
        return view('blog.post',['post'=>$post]);
    }
    public function addPost(Request $request){
        $request->validate([
            'title'=>'required|min:5',
            'content'=>'required|min:10'
        ]);
        $title = $request->input('title');
        $content = $request->input('content');
        $post = new Post();
        $post = $post->addPost($request,$title,$content);
        return redirect()->route('admin')->with('info','New post is added');
    }
    public function viewPost(Request $request,$id){
        $post = new Post();
        $post = $post->getPost($request,$id);
        return view('admin.edit',['post'=>$post,'id'=>$id]);
    }
    public function editPost(Request $request,$id){
        $request->validate([
            'title'=>'required|min:5',
            'content'=>'required|min:10'
        ]);
        $title = $request->input('title');
        $content = $request->input('content');
        $post = new Post();
        $post->editPost($request,$id,$title,$content);
        return redirect()->route('admin')->with('info','The post is edited successfully');
    }
    public function deleteAll(Request $request){
        $post = new Post();
        $posts = $post->deleteAll($request);
        return redirect()->route('admin');
    }

    
    
}
