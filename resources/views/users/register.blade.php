@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3" role="main">
                {!! Form::open(['url'=>'/user/register','class'=>'mb-4']) !!}
                <div class="form-group">
                    {!! Form::label('name','昵称') !!}
                    {!! Form::text('name',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email','邮箱') !!}
                    {!! Form::email('email',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password','密码') !!}
                    {!! Form::password('password',['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password_confirmation','确认密码') !!}
                    {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
                </div>
                {!! Form::submit('马上注册',['class'=>'btn btn-success form-control']) !!}
                {!! Form::close() !!}
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@stop