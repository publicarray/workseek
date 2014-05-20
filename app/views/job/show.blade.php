@extends('layout')

@section('title')
{{{$job->name or 'Job'}}}
@stop

@section('header')

<h1>{{{$job->name or 'Job'}}}</h1>
{{ Form::open(array('route' => 'job.index', 'method' => 'GET', 'class'=>'form-group')) }}
    {{ Form::text('query', null, array('class'=>'form-control input-lg', 'placeholder'=>'Search for an Industry, Description, Location or a minimum Salary.')) }}
    <br>
    {{ Form::submit('Search', array('class'=>'btn btn-primary btn-lg', 'style'=>'width:30%')) }}
 {{ Form::close() }}
@stop

@section('body')

<section>
    @if (isset($error))
        <div class="alert alert-danger">{$error}</div>
    @elseif (count($job)==0)
        <div class="alert alert-danger">Error! invalid Job count.</div>
    @else
        <h2>{{{$job->title}}}</h2>
        <h4>{{{$job->city}}}</h4>
        <h4>${{{$job->salary}}}</h4>
        <p>{{{$job->description}}}</p>
    @endif
</section>

@stop