@extends('app')
@section('styles')
    <link rel="stylesheet" href="{{URL::asset('css/index.css')}}">
@stop
@section('content')
    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <div class="media">
                <img class="mr-3 img-flag-64" src="{{$discussion->user->avatar}}"
                     alt="Generic placeholder image">
                <div class="media-body">
                    <h5 class="mt-0">
                        {{$discussion->title}}
                        @if(Auth::check()&&Auth::user()->id==$discussion->user_id)
                            <a class="btn btn-lg btn-primary float-right" href="/discussions/{{$discussion->id}}/edit"
                               role="button">修改帖子</a>
                        @endif
                    </h5>
                    {{$discussion->user->name}}
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9" role="main">
                <div class="blog-post mb-5">
                    {!! $html !!}
                </div>
                <h5>用户评论</h5>
                <hr>
                {!! Form::open(['url'=>'/comment'])!!}
                {!! Form::text('discussion_id',$discussion->id,['class'=>'form-control d-none']) !!}
                <div class="form-group">
                    {!! Form::label('body','评论内容',['class'=>'sr-only']) !!}
                    {!! Form::textarea('body',null,['class'=>'form-control','placeholder'=>'请输入你要扯皮的内容','rows'=>'5']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('发表评论',['class'=>'btn btn-primary float-right']) !!}
                </div>
                <div class="clearfix"></div>
                {!! Form::close() !!}
                @foreach($discussion->comments as $comment)
                    <div class="media discussion-item">
                        <img class="mr-3 img-flag-64" src="{{$comment->user->avatar}}"
                             alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0"><a href="#">{{$comment->user->name}}</a></h5>
                            {{$comment->body}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop