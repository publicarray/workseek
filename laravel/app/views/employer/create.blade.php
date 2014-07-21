@extends('layout')

@section('title')Create Employer Account @stop

@section('body')

<p class="bg-warning" style="color:#fff;">
    @foreach($errors->all() as $error)
        {{ $error }}<br />
    @endforeach
</p>

{{ Form::open(array('route' => 'employer.store', 'method' => 'POST', 'class'=>'form-horizontal', 'files' => true)) }}
    <div class="form-group">
        <label class="col-sm-3 control-label">Name</label>
        <div class="col-sm-9">
            {{ Form::text('name', null, array('class'=>'form-control','placeholder' =>'Your Name')) }}
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Email</label>
        <div class="col-sm-9">
             {{ Form::email('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Phone</label>
        <div class="col-sm-9">
            {{ Form::text('phone', null, array('class'=>'form-control', 'placeholder'=>'Phone Number')) }}
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Username</label>
        <div class="col-sm-9">
            {{ Form::text('username', null, array('class'=>'form-control', 'placeholder'=>'User Name')) }}
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Password</label>
        <div class="col-sm-9">
            {{ Form::password('password', array('class'=>'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Profile Picture</label>
        <div class="col-sm-9">
            {{ Form::file('image', null, array('class'=>'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Industry</label>
        <div class="col-sm-9">
            {{ Form::text('industry', null, array('class'=>'form-control', 'placeholder'=>'Company Industry')) }}
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Description</label>
        <div class="col-sm-9">
            {{ Form::textarea('description', null, array('class'=>'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <input class="btn btn-primary btn-block" type="submit" value="Register">
        </div>
    </div>
{{ Form::close() }}

@stop
