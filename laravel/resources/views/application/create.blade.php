@extends('layout')

@section('title')Apply Application @stop

@section('body')

<p class="bg-warning" style="color:#fff;">
    @foreach($errors->all() as $error)
        {{ $error }}<br />
    @endforeach
</p>

<form method="POST" action="../../application" accept-charset="UTF-8" class="form-horizontal">
    {!! csrf_field() !!}
    <div class="form-group">
        <label class="col-sm-2 control-label">Letter</label>
        <div class="col-sm-6">
            <textarea class="form-control" name="letter" cols="50" rows="10"></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-6">
            <input type="hidden" name="id" value="{{$id}}">
            <input class="btn btn-primary btn-block" type="submit" value="Apply">
        </div>
    </div>
</form>

@stop
