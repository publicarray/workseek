@extends('layout')

@section('title')Apply Application @stop

@section('body')

<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>

{{ Form::open(array('route' => 'application.store', 'method' => 'POST', 'class'=>'form-horizontal')) }}
    <div class="form-group">
        <label class="col-sm-2 control-label">Letter</label>
        <div class="col-sm-6">
            {{ Form::textarea('letter', null, array('class'=>'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-6">
            <input type="hidden" name="id" value="{{{$id}}}">
            <input class="btn btn-primary" type="submit" value="Apply">
        </div>
    </div>
{{ Form::close() }}

@stop
