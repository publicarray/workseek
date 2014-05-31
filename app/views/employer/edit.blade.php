@extends('layout')

@section('title')Employer Account @stop

@section('body')

<p class="bg-warning" style="color:#fff;">
    @foreach($errors->all() as $error)
        {{ $error }}<br />
    @endforeach
</p>

{{ Form::model ($user, array('route' => array('employer.update', $user->id), 'method' => 'PUT', 'class'=>'form-horizontal', 'files' => true)) }}
    <div class="form-group">
        <label class="col-sm-2 control-label">Name</label>
        <div class="col-sm-6">
            {{ Form::text('name', null, array('class'=>'form-control','placeholder' =>'Your Name')) }}
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Email</label>
        <div class="col-sm-6">
           {{ Form::email('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Phone</label>
        <div class="col-sm-6">
            {{ Form::text('phone', null, array('class'=>'form-control', 'placeholder'=>'Phone Number')) }}
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Username</label>
        <div class="col-sm-6">
            {{ Form::text('username', null, array('class'=>'form-control', 'placeholder'=>'User Name')) }}
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Change Password</label>
        <div class="col-sm-6">
            {{ Form::password('password', array('class'=>'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Profile Picture</label>
        <div class="col-sm-6">
            {{ Form::file('image', null, array('class'=>'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Industry</label>
        <div class="col-sm-6">
            {{ Form::text('industry', null, array('class'=>'form-control', 'placeholder'=>'Company Industry')) }}
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Description</label>
        <div class="col-sm-6">
            {{ Form::textarea('description', null, array('class'=>'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-6">
            <input class="btn btn-primary" type="submit" value="Save">
        </div>
    </div>
{{ Form::close() }}

@stop
