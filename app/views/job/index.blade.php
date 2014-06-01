@extends('layout')

@section('title')All Jobs @stop

@section('body')

{{ Form::open(array('route' => 'job.index', 'method' => 'get', 'class'=>'form')) }}
<div class="input-group input-group-lg">
  <input type="search" name="query" class="form-control" placeholder="Search for Industry, Description, Location or a min Salary." @if(isset($query)) value="{{{$query}}}" @endif>
  <span class="input-group-btn"><input class="btn btn-primary btn-lg" type="submit" value="search"></span>
</div>
{{ Form::close()}}

@if (!isset($jobs) || count($jobs) === 0)
    <p class="bg-warning text-center" style="color:#fff;">Sorry we could not find any Jobs with your query '@if(isset($query)){{{$query}}}' @endif.</p>
@else

@foreach ($jobs as $job)
<ul>
    <li>{{{ $job->title }}}</li>
    <li>{{ link_to_route('job.show', 'Detail', array($job->id)) }}</li>
</ul>
@endforeach

@if(!isset($p))
{{$jobs->links()}}
@endif

@endif

@stop
