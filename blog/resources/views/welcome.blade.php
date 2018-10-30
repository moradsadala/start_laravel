@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="quote">Hi From Welcome Page</h1>
            <hr>
            <h2 class="post-title">Control Structures</h2>
            @php($array = ['Tea','Milk','Sugar','Water'])          How to define variables in php in your view (not recommended)
            <ul>
                @foreach($array as $element)
                    <li>{{$element}}</li>
                @endforeach
            </ul>
            <hr>
            <h2 class="post-title">XSS Protection</h2>
            {{ "<h1> HTML Code in view </h1> " }}
            {!! "<h3> HTML Code in view </h3> " !!}
        </div>
    </div>

@stop
