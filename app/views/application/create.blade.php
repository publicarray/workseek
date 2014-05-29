@extends('employerLayout')

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
            <textarea name="letter" rows="10" class="form-control"></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-6">
            <input class="btn btn-primary" type="hidden" name="id" value="{{{$id}}}">
            <input class="btn btn-primary" type="submit" value="Apply">
        </div>
    </div>
{{ Form::close() }}


@stop
