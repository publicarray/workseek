@extends('layout')

@section('title')Search Jobs @stop

@section('header')
<h1>Work Seek</h1>

{{ Form::open(array('route' => 'job.result', 'method' => 'GET', 'class'=>'form-group')) }}
    {{ Form::text('query', null, array('class'=>'form-control input-lg', 'placeholder'=>'Search for an Industry, Description, Location or a minimum Salary.')) }}
    <br>
    {{ Form::submit('Search', array('class'=>'btn btn-primary btn-lg', 'style'=>'width:30%')) }}
 {{ Form::close() }}
@stop