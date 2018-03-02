<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel App</title>
    @yield('styles')
    <link rel="stylesheet" href="{{URL::asset('css/app.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/others.css')}}">
</head>
<body>
<div class="container mb-3">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Laravel App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">首页 <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0 mr-2">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            @if(Auth::check())
                <div class="avatar-wrapper">
                    <a href="/logout"><img src="{{Auth::user()->avatar}}" class="avatar"></a>
                </div>
            @else
                <a class="btn btn-outline-success mr-2" href="/user/login">登录</a>
                <a class="btn btn-outline-success mr-0" href="/user/register">注册</a>
            @endif
        </div>
    </nav>
</div>
@yield('content')
</body>
</html>