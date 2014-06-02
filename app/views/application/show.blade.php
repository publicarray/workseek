@extends('layout')

@section('title')
{{{ $user->name }}}'s Application
@stop

@section('body')

<div class="col-xs-12 col-sm-4">
    <img class="img-responsive"src="{{ asset($user->image->url('medium')) }}">
</div>

<div class="col-xs-6 col-sm-3">
    <p>Name of Applicant:</p>
    <p>Applicant Profile</p>
</div>
<div class="col-xs-6 col-sm-3">
    <p>{{{ $user->name }}}</p>
    <p>{{ link_to_route('seeker.show', 'Detail', array($user->id)) }}</p>
</div>

<div class="col-xs-12">
    <h3>Applicant's Letter:</h3>
    <p>{{{ $application->letter }}}</p>
</div>

@stop
