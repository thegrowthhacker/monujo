@extends('layouts.default')

{{-- Page Title --}}
@section('title')
Signup
@stop

{{-- Page content --}}
@section('content')
<div class="page-header">
    <h3>@lang('auth.signup.intro')</h3>
</div>
<div class="row">
    <div class="span12">
        {{ Form::open(array('route' => 'signup.post', 'method' => 'submit')) }}
        <div class="control-group {{ $errors->has('email') ? 'error' : '' }}">
            {{ Form::label('email', Lang::get('auth.label.email')) }}
            <div class="controls">
                {{ Form::text('email') }}
                {{ $errors->first('email', '<span class="help-inline">:message</span>') }}
            </div>
        </div>

        <div class="control-group {{ $errors->has('username') ? 'error' : '' }}">
            {{ Form::label('username', Lang::get('auth.label.username')) }}
            <div class="controls">
                {{ Form::text('username') }}
                {{ $errors->first('username', '<span class="help-inline">:message</span>') }}
            </div>
        </div>

        <div class="control-group {{ $errors->has('password') ? 'error' : '' }}">
            {{ Form::label('password', Lang::get('auth.label.password')) }}
            <div class="controls">
                {{ Form::password('password') }}
                {{ $errors->first('password', '<span class="help-inline">:message</span>') }}
            </div>
        </div>

        <div class="control-group {{ $errors->has('password_confirmation') ? 'error' : '' }}">
            {{ Form::label('password_confirmation', Lang::get('auth.label.password.confirm')) }}
            <div class="controls">
                {{ Form::password('password_confirmation') }}
                {{ $errors->first('password_confirmation', '<span class="help-inline">:message</span>') }}
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
             <button type="submit" class="btn">{{ Lang::get('auth.label.button.signup') }}</button>
            </div>
        </div>

        {{ Form::close() }}
    </div>
</div>
@stop
