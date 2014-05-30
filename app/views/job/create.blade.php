@extends('layout')

@section('title')Create Job @stop

@section('body')

<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>

{{ Form::open(array('route' => 'job.store', 'method' => 'POST', 'class'=>'form-horizontal')) }}
    <div class="form-group">
        <label class="col-sm-2 control-label">Title</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="title">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Salary</label>
        <div class="col-sm-6">
            <input type="number" class="form-control" name="salary" placeholder="$">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Description</label>
        <div class="col-sm-6">
        <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Duration</label>
        <div class="col-sm-6">
        <input type="date" class="form-control" name="duration">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-6">
            <input class="btn btn-primary" type="submit" value="Add">
        </div>
    </div>
{{ Form::close() }}

@stop
