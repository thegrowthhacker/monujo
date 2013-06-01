@extends('layouts.default')

{{-- Page Title --}}
@section('title')
Reset Password
@stop

{{-- Page content --}}
@section('content')
<div class="page-header">
    <h3>@lang('auth.reset.intro')</h3>
</div>
<div class="row">
    <div class="span12">
        {{ Form::open(array('route' => 'reset.post', 'method' => 'submit')) }}
        <div class="control-group {{ $errors->has('password') ? 'error' : '' }}">
            {{ Form::hidden('user_id', $id)}}
            {{ Form::hidden('user_token', $token)}}
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
             <button type="submit" class="btn">{{ Lang::get('auth.label.button.submit') }}</button>
            </div>
        </div>

        {{ Form::close() }}
    </div>
</div>
@stop
