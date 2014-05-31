@extends('layout')

@section('title')All Applications @stop

@section('body')

@if (!isset($applications) || count($applications) === 0)
    <p class="bg-warning text-center" style="color:#fff;">Sorry we could not find any applications under your account</p>
@else

@foreach ($applications as $application)
<ul>
    <li>{{{ $application->id }}}</li>
    <li>{{ link_to_route('application.show', 'Detail', array($application->id)) }}</li>
</ul>
@endforeach
@endif

@stop
