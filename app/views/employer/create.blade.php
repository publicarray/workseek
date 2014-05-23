@extends('layout')

@section('title')Add New Organisation@stop

@section('header')

<h1>Add New Organisationoyers</h1>

@stop

@section('body')
@if (isset($error))
<div class="alert alert-danger">{{{$error}}}</div>
@endif
<form class="form-horizontal" role="form" method="post" action="add_employer_action.php">
    <div class="form-group">
        <label class="col-sm-2 control-label">Name</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="name">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Industry</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="industry">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Description</label>
        <div class="col-sm-6">
            <textarea class="form-control" rows="4" name="description"></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-6">
            <input class="btn btn-primary" type="submit" value="Add Organisation">
        </div>
    </div>
</form>
@stop
