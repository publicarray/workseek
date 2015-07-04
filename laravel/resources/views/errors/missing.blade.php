@extends('layout')

@section('title')404 Error - Not Found @stop

@section('body')
    <h3>The requested file <a href="{{{ $url }}}">{{{ $url }}}</a> could not be found.</h3>
@stop
