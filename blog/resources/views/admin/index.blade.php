@extends('layouts.admin')

@section('content')
    
    @if(Session::has('info'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-info">{{Session:: get('info')}}</p>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('create_admin') }}" class="btn btn-success">New Post</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('delete_all_posts') }}" class="btn btn-success">Delete All</a>
        </div>
    </div>
    <hr>
    @foreach($posts as $id => $post)
    <div class="row">
        <div class="col-md-12">
            <h2 class="post-title"> {{$post['title']}}</h2>
            <p class="text-center">{{$post['content']}}</p>
            <a href="{{route('post',['id' => $id ])}}"><span class="post-link ">read more</span></a>
            <a href="{{ route('edit_admin',['id'=> $id]) }}"class="btn btn-primary post-link">Edit</a>
            <hr>
        </div>
    </div>
   @endforeach
    {{-- <div class="row">
        <div class="col-md-12">
            <p><strong>Learning Laravel</strong> <a href="{{ route('edit_admin',['id'=>1]) }}">Edit</a></p>
        </div>
    </div> --}}
@endsection