<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>
        @section("title")
        Monujo app
        @show
    </title>
    <meta name="keywords" content="Monujo"/>
    <meta name="author" content="Monujo"/>
    <meta name="description" content="Monujo"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include("partials/headApp")
</head>

<body ng-app="app">
<div class="loading" ng-class="{show:isLoading}">
    <div class="loading-wrapper">
        <div class="loadingAnimation" ng-show="isLoading" style="">
            <div class="bowl_ringG">
                <div class="ball_holderG">
                    <div class="ballG">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container -->
<div class="container">

    <header class="row">
        <div id="logo" class="span3">
            <a href="{{ URL::route('home') }}">
                <img src="{{ URL::asset('img/logo.png') }}">
            </a>
        </div>
        <div class="span9">
            <ul class="nav nav-pills pull-right">
                <li class=""><a href="">About</a></li>
                <li class=""><a href="">Blog</a></li>
            </ul>
        </div>
    </header>

    @include("partials/notifications")
    @yield("content")
    <footer>
        <p>© Monujo 2013</p>
    </footer>
</div>
<!-- ./ container -->

@include("partials/jsApp")
</body>
</html>
