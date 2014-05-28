@extends('layout')

@section('title')All Jobs @stop

@section('body')

@foreach ($jobs as $job)
<ul>
    <li>{{{ $job->title }}}</li>
    <li>{{ link_to_route('job.show', 'Detail', array($job->id)) }}</li>
</ul>
@endforeach

@stop
