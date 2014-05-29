@extends('layout')

@section('title')Application @stop

@section('body')

<ul>
    <li>{{{ $application->letter }}}</li>
</ul>

@stop
