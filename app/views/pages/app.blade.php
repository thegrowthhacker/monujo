@extends('layouts.app')

{{-- Page content --}}
@section('content')
<div class="content">
    <div class="container">
        <div class="row">
            <div class="span3">
                left
            </div>
            <div ng-view class="span9" class="well"></div>
        </div>
    </div>
</div>
@stop
