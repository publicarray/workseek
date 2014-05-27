@extends('layout')

@section('title')Create Job Seeker Account @stop

@section('body')

{{ Form::open(array('route' => 'seeker.store', 'method' => 'POST', 'class'=>'form-horizontal', 'files' => true)) }}
    <div class="form-group">
        <label class="col-sm-2 control-label">Name</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="name" placeholder="name">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Email</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="email">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Phone</label>
        <div class="col-sm-6">
            <input type="number" class="form-control" name="phone">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Username</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="username">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Password</label>
        <div class="col-sm-6">
            <input type="password" class="form-control" name="password">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Profile Picture</label>
        <div class="col-sm-6">
            <input type="file" name="image" id="image">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-6">
            <input class="btn btn-primary" type="submit" value="Submit">
        </div>
    </div>
{{ Form::close() }}


@stop
