@extends('layout')

@section('title')A seeker @stop

@section('body')

<div class="col-xs-12">
    <img class="img-responsive" src="{{ asset($user->image->url('medium')) }}">
    <h2>{{{ $user->name }}}</h2>
</div>
<div class="col-xs-6 col-sm-4">
    <p><i class="glyphicon glyphicon-user"></i> User name:</p>
    <p><i class="glyphicon glyphicon-envelope"></i> Email:</p>
    <p><i class="glyphicon glyphicon-earphone"></i> Phone:</p>
</div>
<div class="col-xs-6 col-sm-8">
    <p>{{{ $user->username }}}</p>
    <p>{{{ $user->email }}}</p>
    <p>{{{ $user->phone }}}</p>
</div>
<div class="row"></div>

@if(Auth::check() && Auth::user()->role == 'seeker')
<div class="col-xs-6">
    {{ link_to_route('seeker.edit', 'Edit Profile', array($user->id), array('class'=>'btn btn-primary')) }}
</div>
<div class="col-xs-6">
    {{ Form::open(array('route' => array('seeker.destroy', $user->id), 'method' => 'delete')) }}
    <button type="submit" class="btn btn-danger">Close Account</button>
    {{ Form::close() }}
</div>
@endif

@stop
