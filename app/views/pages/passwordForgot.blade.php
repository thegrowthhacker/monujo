@extends('layouts.default')

{{-- Page Title --}}
@section('title')
Forgotten password
@stop

{{-- Page content --}}
@section('content')


<div class="content">
    <div class="container">

        <div class="row">
            <div class="span12">
                <h3>@lang('auth.password.forgotten')</h3>
            </div>
        </div>

        <div class="row">
            <div class="span12">
                <div class="box centered">
                    {{ Form::open(array('route' => 'forgot.post', 'method' => 'submit')) }}
                    <div class="control-group {{ $errors->has('email') ? 'error' : '' }}">
                        {{ Form::label('email', Lang::get('auth.label.email')) }}
                        <div class="controls">
                            {{ Form::text('email','', array('class' => 'input-block-level')) }}
                            {{ $errors->first('email', '<span class="help-inline">:message</span>') }}
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" class="btn btn-success">{{ Lang::get('auth.label.button.submit') }}
                            </button>
                        </div>
                    </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>


@stop

