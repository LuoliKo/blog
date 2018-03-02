@extends('app')
@section('styles')
    <link rel="stylesheet" href="{{URL::asset('css/index.css')}}">
@stop
@section('content')
    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1>
                欢迎来到Laravel App社区
                <a class="btn btn-lg btn-primary float-right" href="/discussions/create" role="button">发布新帖子</a>
            </h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9" role="main">
                @foreach($discussions as $discussion)
                    <div class="media discussion-item">
                        <img class="mr-3 img-flag-64" src="{{$discussion->user->avatar}}"
                             alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0"><a href="/discussions/{{$discussion->id}}"
                                                title="{{$discussion->title}}">{{$discussion->title}}</a></h5>
                            {{$discussion->user->name}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop