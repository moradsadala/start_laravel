<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request as Request;

class Post extends Model
{
    public function getPosts(Request $request)
    {
        
        if (!$request->session()->has('posts')) {
            $this->createDummyData($request);
        }
        return $request->session()->get('posts');
    }

    public function getPost(Request $request, $id)
    {


        if (!$request->session()->has('posts')) {
            $this->createDummyData($request);
        }
        return $request->session()->get('posts')[($id)];
    }

    public function addPost(Request $request, $title, $content)
    {
        if (!$request->session()->has('posts')) {
            $this->createDummyData();
        }
        $posts = $request->session()->get('posts');
        array_push($posts, ['title' => $title, 'content' => $content]);
        $request->session()->put('posts', $posts);
    }

    public function editPost(Request $request, $id, $title, $content)
    {
        $posts = $request->session()->get('posts');
        //print_r ($posts[$id]);
        $posts[$id] = ['title' => $title, 'content' => $content];
        $request->session()->put('posts', $posts);
    }
    public function deleteAll(Request $request){
        if($request->session()->has('posts')){
            $request->session()->forget('posts');
        }
    }
    private function createDummyData(Request $request)
    {
     
        $posts = [
            [   
                'title' => 'Learning Laravel',
                'content' => 'This blog post will get you right on track with Laravel!'
            ],
            [   
                'title' => 'Something else',
                'content' => 'Some other content'
            ]
        ];
        $request->session()->put('posts', $posts);
    }
    
}
