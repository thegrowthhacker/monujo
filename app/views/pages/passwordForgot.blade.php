@extends('layouts.default')

{{-- Page Title --}}
@section('title')
Forgot password
@stop

{{-- Page content --}}
@section('content')
<div class="page-header">
    <h3>@lang('auth.forgot.intro')</h3>
</div>
<div class="row">


    <div class="span12">
        {{ Form::open(array('route' => 'forgot.post', 'method' => 'submit')) }}
        <div class="control-group {{ $errors->has('email') ? 'error' : '' }}">
            {{ Form::label('email', Lang::get('auth.label.email')) }}
            <div class="controls">
                {{ Form::text('email') }}
                {{ $errors->first('email', '<span class="help-inline">:message</span>') }}
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
             <button type="submit" class="btn">{{ Lang::get('auth.label.button.submit') }}</button>
            </div>
        </div>

        {{ Form::close() }}
    </div>
</div>
@stop
