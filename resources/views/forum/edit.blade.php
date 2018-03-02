@extends('app')
@section('styles')
    <link rel="stylesheet" href="{{URL::asset('css/index.css')}}">
    <script src="{{URL::asset('js/jquery-3.1.1.min.js')}}"></script>
    @include('editor::head')
@stop
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12" role="main">
                {!! Form::model($discussion,['method'=>'PATCH','url'=>'/discussions/'.$discussion->id])!!}
                @include('forum.form')
                <div class="form-group">
                    {!! Form::submit('更新帖子',['class'=>'btn btn-primary float-right']) !!}
                </div>
                {!! Form::close() !!}
                <div class="clearfix mb-3"></div>
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->all() as $error)
                            <p class="mb-0">{{$error}}</p>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@stop