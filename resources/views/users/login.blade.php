@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3" role="main">
                {!! Form::open(['url'=>'/user/login','class'=>'mb-4']) !!}
                <div class="form-group">
                    {!! Form::label('email','邮箱') !!}
                    {!! Form::email('email',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password','密码') !!}
                    {!! Form::password('password',['class'=>'form-control']) !!}
                </div>
                {!! Form::submit('马上登录',['class'=>'btn btn-success form-control']) !!}
                {!! Form::close() !!}
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    </div>
                @endif
                @if(Session::has('user_login_failed'))
                    <div class="alert alert-danger" role="alert">
                        <p>{{Session::get('user_login_failed')}}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@stop