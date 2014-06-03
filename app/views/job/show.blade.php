@extends('layout')

@section('title')Job Detail @stop

@section('body')
<div class="col-xs-12">
    <h2>{{{ $job->title }}}</h2>
</div>
<div class="col-xs-6 col-sm-4">
    <p><i class="glyphicon glyphicon-usd"></i> Annual Salary:</p>
    <p><i class="glyphicon glyphicon-globe"></i> City:</p>
    <p><i class="glyphicon glyphicon-briefcase"></i> Industry:</p>
    <p><i class="glyphicon glyphicon-calendar"></i> Job Offer Ends in:</p>
</div>
<div class="col-xs-6 col-sm-8">
    <p>${{{ $job->salary }}}</p>
    <p>{{{ $job->city }}}</p>
    <p>{{{ $employer->industry }}}</p>
    <p>{{{ $job_duration }}}</p>
</div>
<div class="col-xs-12">
    <p>{{{ $job->description }}}</p>
</div>

@if(Auth::check() && Auth::user()->role == 'seeker')
    <div class="col-xs-4">
        {{ link_to_route('application.create', 'Apply for Job', array($job->id), array('class'=>'btn btn-primary btn-block')) }}
    </div>
@endif

@if(Auth::check() && Auth::user()->role == 'employer')
    <div class="col-xs-4">
        {{ link_to_route('job.edit', 'Edit Job Offer', array($job->id), array('class'=>'btn btn-primary btn-block')) }}
    </div>
    <div class="col-xs-4">
        {{ Form::open(array('route' => array('application.index'), 'method' => 'get')) }}
            <input type="hidden" name="id" value="{{{$job->id}}}">
            <input class="btn btn-primary btn-block" type="submit" value="View Applications">
        {{ Form::close() }}
    </div>
    <div class="col-xs-4">
        {{ Form::open(array('route' => array('job.destroy', $job->id), 'method' => 'delete')) }}
        <button type="submit" class="btn btn-danger btn-block">Delete Job</button>
        {{ Form::close() }}
    </div>
@endif

@stop
