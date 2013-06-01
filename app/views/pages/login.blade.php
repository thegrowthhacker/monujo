@extends('layouts.default')

{{-- Page Title --}}
@section('title')
Login
@stop

{{-- Page content --}}
@section('content')
<div class="page-header">
    <h3>@lang('auth.login.intro')</h3>
</div>
<div class="row">


    <div class="span12">
        {{ Form::open(array('route' => 'login.post', 'method' => 'submit')) }}
        <div class="control-group {{ $errors->has('email') ? 'error' : '' }}">
            {{ Form::label('email', Lang::get('auth.label.email')) }}
            <div class="controls">
                {{ Form::text('email') }}
                {{ $errors->first('email', '<span class="help-inline">:message</span>') }}
            </div>
        </div>

        <div class="control-group {{ $errors->has('password') ? 'error' : '' }}">
            {{ Form::label('password', Lang::get('auth.label.password')) }}
            <div class="controls">
                {{ Form::password('password') }}
                {{ $errors->first('password', '<span class="help-inline">:message</span>') }}
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
                <label class="checkbox">
                    {{ Form::checkbox('remember', '1') }}
                    {{ Lang::get('auth.label.remember') }}
                </label>
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
             <button type="submit" class="btn">{{ Lang::get('auth.label.button.login') }}</button>
            </div>
        </div>
        <a href="{{ URL::route('forgot.get') }}">{{Lang::get('auth.forgot.password') }}</a>

        {{ Form::close() }}
    </div>
</div>
@stop
