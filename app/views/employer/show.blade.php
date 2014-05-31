@extends('layout')

@section('title')A Employer @stop

@section('body')
    <div class="col-xs-12">
        <img src="{{ asset($user->image->url()) }}">
        <h2>{{{ $user->name }}}</h2>
    </div>
    <div class="col-xs-6 col-sm-4">
        <p><i class="glyphicon glyphicon-user"></i> User name:</p>
        <p><i class="glyphicon glyphicon-envelope"></i> Email:</p>
        <p><i class="glyphicon glyphicon-earphone"></i> Phone:</p>
        <p><i class="glyphicon glyphicon-briefcase"></i> Industry:</p>
    </div>
    <div class="col-xs-6 col-sm-8">
        <p>{{{ $user->username }}}</p>
        <p>{{{ $user->email }}}</p>
        <p>{{{ $user->phone }}}</p>
        <p>{{{ $employer->industry }}}</p>
    </div>
    <div class="col-xs-12">
        <p>{{{ $employer->description }}}</p>
    </div>
    <div class="col-xs-4">
        {{ link_to_route('employer.edit', 'Edit Profile', array($user->id), array('class'=>'btn btn-primary')) }}
    </div>
    <div class="col-xs-4">
        {{ link_to_route('job.create', 'Add a Job Offer', null, array('class'=>'btn btn-primary')) }}
    </div>
    <div class="col-xs-4">
        {{ Form::open(array('route' => array('employer.destroy', $user->id), 'method' => 'delete')) }}
        <button type="submit" class="btn btn-danger">Close Account</button>
        {{ Form::close() }}
    </div>

@stop
