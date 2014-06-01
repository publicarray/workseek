@extends('layout')

@section('title')Application @stop

@section('body')

<div class="col-xs-12">
    <h2>{{{ $application->id }}}</h2>
</div>

<img src="{{ asset($user->image->url()) }}">
<div class="col-xs-6 col-sm-4">
    <p>Name of Applicant:</p>
    <p>Applicant Profile</p>
</div>
<div class="col-xs-6 col-sm-8">
    <p>{{{ $user->name }}}</p>
    <li>{{ link_to_route('seeker.show', 'Detail', array($user->id)) }}</li>
</div>

<div class="col-xs-12">
    <p>{{{ $application->letter }}}</p>
</div>

@stop
