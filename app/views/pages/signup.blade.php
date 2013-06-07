@extends('layouts.default')

{{-- Page Title --}}
@section('title')
Signup
@stop

{{-- Page content --}}
@section('content')


<div class="content">
    <div class="container">
        <div class="row">
            <div class="span6">
                <h3>@lang('auth.signup.intro')</h3>
            </div>
            <div class="span6">
                <a class="pull-right btn btn-primary padded" href="{{ URL::route('login.get') }}">{{Lang::get('auth.label.button.login.AlreadyUser')
                    }}</a>
            </div>
        </div>
        <div class="row">
            <div class="span6">
                <div class="box">
                    {{ Form::open(array('route' => 'signup.post', 'method' => 'submit')) }}
                    <div class="control-group {{ $errors->has('email') ? 'error' : '' }}">
                        {{ Form::label('email', Lang::get('auth.label.email')) }}
                        <div class="controls">
                            {{ Form::text('email', '', array('class' => 'input-block-level')) }}
                            {{ $errors->first('email', '<span class="help-inline">:message</span>') }}
                        </div>
                    </div>

                    <div class="control-group {{ $errors->has('username') ? 'error' : '' }}">
                        {{ Form::label('username', Lang::get('auth.label.username')) }}
                        <div class="controls">
                            {{ Form::text('username', '', array('class' => 'input-block-level')) }}
                            {{ $errors->first('username', '<span class="help-inline">:message</span>') }}
                        </div>
                    </div>

                    <div class="control-group {{ $errors->has('password') ? 'error' : '' }}">
                        {{ Form::label('password', Lang::get('auth.label.password')) }}
                        <div class="controls">
                            {{ Form::password('password', array('class' => 'input-block-level')) }}
                            {{ $errors->first('password', '<span class="help-inline">:message</span>') }}
                        </div>
                    </div>

                    <div class="control-group {{ $errors->has('password_confirmation') ? 'error' : '' }}">
                        {{ Form::label('password_confirmation', Lang::get('auth.label.password.confirm')) }}
                        <div class="controls">
                            {{ Form::password('password_confirmation', array('class' => 'input-block-level')) }}
                            {{ $errors->first('password_confirmation', '<span class="help-inline">:message</span>') }}
                        </div>
                    </div>

                    <div class="alert">
                        {{ Lang::get('auth.tos') }}
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" class="btn btn-success pull-right">{{ Lang::get('auth.label.button.signup') }}</button>
                        </div>
                    </div>


                    {{ Form::close() }}
                </div>
            </div>
            <div class="span6">
                <img ph-img="460x250"/>
            </div>
        </div>
    </div>
</div>


@stop
