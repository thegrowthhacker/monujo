@extends('layouts.default')

{{-- Page Title --}}
@section('title')
Login
@stop

{{-- Page content --}}
@section('content')


<div class="content">
    <div class="container">
        <div class="row">
            <div class="span6">
                <h3>@lang('auth.login.intro')</h3>
            </div>
            <div class="span6">
                <a class="pull-right btn btn-primary padded" href="{{ URL::route('signup.get') }}">{{Lang::get('auth.label.button.signup.notUser')
                    }}</a>
            </div>
        </div>
        <div class="row">
            <div class="span6">
                <div class="box">
                    {{ Form::open(array('route' => 'login.post', 'method' => 'submit')) }}
                    <div class="control-group {{ $errors->has('email') ? 'error' : '' }}">
                        {{ Form::label('email', Lang::get('auth.label.email')) }}
                        <div class="controls">
                            {{ Form::text('email','', array('class' => 'input-block-level')) }}
                            {{ $errors->first('email', '<span class="help-inline">:message</span>') }}
                        </div>
                    </div>

                    <div class="control-group {{ $errors->has('password') ? 'error' : '' }}">
                        {{ Form::label('password', Lang::get('auth.label.password')) }}
                        <div class="controls">
                            {{ Form::password('password',array('class' => 'input-block-level')) }}
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

                    <div class="control-group pull-right">
                        <div class="controls">
                            <button type="submit" class="btn btn-success">{{ Lang::get('auth.label.button.login') }}
                            </button>
                        </div>
                    </div>
                    <div>
                        <a href="{{ URL::route('forgot.get') }}">{{Lang::get('auth.forgot.password') }}</a>
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
