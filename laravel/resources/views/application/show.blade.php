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
    @if(Auth::check() && Auth::user()->role=='employer')
    <p>Applicant Profile</p>
    @endif
</div>
<div class="col-xs-6 col-sm-3">
    <p>{{{ $user->name }}}</p>
    @if(Auth::check() && Auth::user()->role=='employer')
    <p><a href="../seeker/{{$user->id}}">Detail</a></p>
    @endif
</div>

<div class="col-xs-12">
    <h3>Applicant's Letter:</h3>
    <p>{{{ $application->letter }}}</p>
</div>

@stop
