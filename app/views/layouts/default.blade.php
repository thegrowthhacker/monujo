<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>
        @section("title")
        Monujo
        @show
    </title>
    <meta name="keywords" content="Monujo"/>
    <meta name="author" content="Monujo"/>
    <meta name="description" content="Monujo"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include("partials/head")
</head>
<body class="body home" ng-app="default">
<header>
    <div class="container">
        <div class="row">
            <div class="logo span3">
                <a href="{{ URL::route('home') }}">
                    <img src="{{ URL::asset('img/logo.png') }}">
                </a>
            </div>
            <div class="span9">
                <div class="row">
                    <div class="span9">
                        <ul class="nav nav-pills pull-right">
                            <li class=""><a href="">About</a></li>
                            <li class=""><a href="">Blog</a></li>
                            <li><a href="{{ URL::route('login.get') }}">{{Lang::get('auth.label.button.login') }}</a>
                            </li>
                            <li><a class="btn success" href="{{ URL::route('signup.get') }}">{{Lang::get('auth.label.button.signup.top')
                                    }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@include("partials/notifications")
@yield("content")
@include("partials/footer")
@include("partials/js")
</body>
</html>
