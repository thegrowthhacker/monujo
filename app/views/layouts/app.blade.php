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

<body ng-app="app" class="body">
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
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="span9" ng-controller="MenuCtrl">

                        <div class="btn-group pull-right">
                            <a class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-cog icon-large"></i>
                                Account
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a ng-href="#/account"><i class="icon-user"></i> Edit profile</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo URL::route('logout.get') ?>"><i class="icon-signout"></i> Sign out</a></li>
                            </ul>
                        </div>
                        <ul class="nav nav-pills pull-right">
                            <li ng-class="navClass('summary')"><a ng-href="#/"><i class="icon-home icon-large"></i>
                                    Sommario</a>
                            </li>
                            <li ng-class="navClass('transactions')"><a ng-href="#/transactions"><i
                                        class="icon-list icon-large"></i>
                                    Movimenti</a></li>
                            <li ng-class="navClass('budget')"><a ng-href="#/budget"><i class="icon-road icon-large"></i>
                                        Budget</a>
                            </li>
                            <li ng-class="navClass('graphs')"><a ng-href="#/graphs"><i class="icon-pencil icon-large"></i>
                                        Grafici</a>
                            </li>
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
@include("partials/jsApp")
</body>
</html>
