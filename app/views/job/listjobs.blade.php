@extends('layout')

@section('title')All Jobs
@if (Auth::check() && Auth::user()->role == 'employer')
of {{{Auth::user()->name}}}
@endif
@stop

@section('body')


@if (!isset($jobs) || count($jobs) === 0)
    <p class="bg-warning text-center" style="color:#fff;">Sorry we could not find any Jobs under your account.</p>
@else

@foreach ($jobs as $job)
<ul>
    <li>{{{ $job->title }}}</li>
    <li>{{ link_to_route('job.show', 'Detail', array($job->id)) }}</li>
    {{ Form::open(array('route' => 'application.index', 'method' => 'get', 'class'=>'form-horizontal')) }}
            <input type="hidden" name="id" value="{{{$job->id}}}">
            <input class="btn btn-primary" type="submit" value="View Applications">
    {{ Form::close() }}
</ul>
@endforeach
@endif

@stop
