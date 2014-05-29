@extends('layout')

@section('title')All seekers @stop

@section('body')

@if(Auth::check())
<ul class="nav navbar-nav navbar-right">
    <li><p class="navbar-text">Hello {{ Auth::user()->username }}!</p></li>
    <li>{{ link_to_route('user.logout', 'Sign out') }}</li>
</ul>

@if(Auth::user()->role == 'seeker')
@foreach ($seekers as $seeker)
<ul>
    <li>{{{ $seeker->name }}}</li>
    <li>{{ link_to_route('seeker.show', 'Detail', array($seeker->id)) }}</li>
</ul>
@endforeach
@endif

@if(Auth::user()->role == 'employer')
    <p class="text-danger">You Need to be an Seeker to access this page!</p>
@endif

@else
{{ Form::open(array('route' => 'user.login', 'method' => 'POST', 'class'=>'navbar-form navbar-right')) }}
<div class="form-group @if ($errors->first('username'))has-error@endif">
    {{ Form::text('username', null, array('class'=>'form-control input-sm', 'placeholder'=>'Username')) }}
    @if ($errors->first('username'))
    <label class="control-label" for="username">{{ $errors->first('username') }}</label>
    @endif
</div>
<div class="form-group @if ($errors->first('password'))has-error@endif">
    {{ Form::password('password', array('class'=>'form-control input-sm', 'placeholder'=>'Password')) }}
    @if ($errors->first('password'))
    <label class="control-label" for="password">{{ $errors->first('password') }}</label>
    @endif
</div>
<div class="form-group">
    {{ Form::submit('Sign In', array('class'=>'btn btn-default')) }}
    {{link_to_route('seeker.create', 'or Register', null, array('class'=>''))}}
</div>
{{ Form::close() }}
@endif

@stop
