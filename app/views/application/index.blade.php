@extends('layout')

@section('title')All Applications @stop

@section('body')

@foreach ($applications as $application)
<ul>
    <li>{{{ $application->id }}}</li>
    <li>{{ link_to_route('application.show', 'Detail', array($application->id)) }}</li>
</ul>
@endforeach

@stop
