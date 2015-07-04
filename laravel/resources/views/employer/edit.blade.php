@extends('layout')

@section('title')Employer Account @stop

@section('body')

<p class="bg-warning" style="color:#fff;">
    @foreach($errors->all() as $error)
        {{ $error }}<br />
    @endforeach
</p>

<form method="POST" action="../{{$user->id}}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
    <input name="_method" type="hidden" value="PUT">
    {!! csrf_field() !!}
    <div class="form-group">
        <label class="col-sm-3 control-label">Name</label>
        <div class="col-sm-9">
            <input class="form-control" placeholder="Your Name" name="name" type="text" value="{{$user->name}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Email</label>
        <div class="col-sm-9">
           <input class="form-control" placeholder="Email Address" name="email" type="email" value="{{$user->email}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Phone</label>
        <div class="col-sm-9">
            <input class="form-control" placeholder="Phone Number" name="phone" type="text" value="{{$user->phone}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Username</label>
        <div class="col-sm-9">
            <input class="form-control" placeholder="User Name" name="username" type="text" value="{{$user->username}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Change Password</label>
        <div class="col-sm-9">
            <input class="form-control" name="password" type="password" value="">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Profile Picture</label>
        <div class="col-sm-9">
            <input name="image" type="file">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Industry</label>
        <div class="col-sm-9">
            <input class="form-control" placeholder="Company Industry" name="industry" type="text" value="{{$user->industry}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Description</label>
        <div class="col-sm-9">
            <textarea class="form-control" name="description" cols="50" rows="10">{{$user->description}}</textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <input class="btn btn-primary btn-block" type="submit" value="Save">
        </div>
    </div>
</form>

@stop
