@extends('layout')

@section('title')404 Error - Not Found @stop

@section('body')
    <h3>The requested path <a href="../{{ Request::path() }}">{{ Request::path() }}</a> could not be found.</h3>
@stop
