@extends('layout')

@section('title')Editing: @if(isset($job)){{{$job->title}}} @endif @stop

@section('header')

<h1>Editing: @if(isset($job)){{{$job->title}}}</h1>

@stop

@section('body')

@if(isset($error))
<div class="alert alert-danger">{{{$error}}}</div>
@endif

@if(isset($job))
<form class="form-horizontal" role="form" method="post" action="job_edit_action.php">
    <input type="hidden" name="id" value="{{{$job.Id}}}">
    <div class="form-group">
        <label class="col-sm-2 control-label">Title</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="title" value="{{{$job->title}}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">City</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="city" value="{{{$job->city}}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Salary</label>
        <div class="col-sm-6">
            <input type="number" class="form-control" placeholder="$" name="salary" value="{{{$job->salary}}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Description</label>
        <div class="col-sm-6">
            <textarea class="form-control" rows="4" name="description">{{{$job->description}}}</textarea>
        </div>
    </div>
        <input type="hidden" name="organisation_id" value="{{{$job->employer_id}}}">
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-6">
            <input class="btn btn-primary" type="submit" value="Finish Editing">
        </div>
    </div>
</form>
@endif
@stop
