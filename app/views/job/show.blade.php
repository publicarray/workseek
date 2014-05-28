@extends('layout')

@section('title')All Jobs @stop

@section('body')


<ul>
    <li>{{{ $job->title }}}</li>
    <li>{{{ $job->salary }}}</li>
    <li>{{{ $job->description }}}</li>
</ul>

@if(Auth::check() && Auth::user()->role == 'employer')
    <li>{{ link_to_route('job.edit', 'Edit', array($job->id)) }}</li>
    {{ Form::open(array('route' => array('job.destroy', $job->id), 'method' => 'delete')) }}
        <button type="submit" class="btn btn-danger btn-mini">Delete</button>
    {{ Form::close() }}
@endif
@stop
