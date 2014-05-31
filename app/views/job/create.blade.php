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
        <label class="col-sm-3 control-label">Title</label>
        <div class="col-sm-9">
            {{ Form::text('title', null, array('class'=>'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Salary</label>
        <div class="col-sm-9">
            {{ Form::text('salary', null, array('class'=>'form-control', 'placeholder'=>'$')) }}
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">City</label>
        <div class="col-sm-9">
            {{ Form::text('city', null, array('class'=>'form-control', 'placeholder'=>'City or Location')) }}
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Description</label>
        <div class="col-sm-9">
            {{ Form::textarea('description', null, array('class'=>'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">End Job Offer Date</label>
        <div class="col-sm-9">
        <input type="date" class="form-control" name="enddate">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <input class="btn btn-primary btn-block" type="submit" value="Add">
        </div>
    </div>
{{ Form::close() }}

@stop
