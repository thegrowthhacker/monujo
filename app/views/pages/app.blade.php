@extends('layouts.app')

{{-- Page content --}}
@section('content')
<div class="container" ng-app="app">
    <div class="row">
        <div ng-controller="MenuCtrl" class="span3">
            <ul class="nav nav-list">
                <li ng-class="navClass('summary')"><a ng-href="#/">Sommario</a></li>
                <li ng-class="navClass('transactions')"><a ng-href="#/transactions">Movimenti</a></li>
                <li ng-class="navClass('budget')"><a ng-href="#/budget">Budget</a></li>
                <li ng-class="navClass('graphs')"><a ng-href="#/graphs">Grafici</a></li>
                <li class="nav-header">Account informationr</li>
                <li ng-class="navClass('account')"><a ng-href="#/account">Edit your profile</a></li>
                <li><a href="<?php echo URL::route('logout.get') ?>">Logout</a></li>
                <li class="divider"></li>
            </ul>

        </div>
        <div ng-view class="span9"></div>
    </div>
</div>
@stop
