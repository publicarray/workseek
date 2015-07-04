@extends('layout')

@section('title')Edit Job @stop

@section('head')
<link rel="stylesheet" type="text/css" href="../../assets/css/datepicker.css">
@stop

@section('body')

<p class="bg-warning" style="color:#fff;">
    @foreach($errors->all() as $error)
        {{ $error }}<br />
    @endforeach
</p>

<form method="POST" action="../{{$job->id}}" accept-charset="UTF-8" class="form-horizontal"><input name="_method" type="hidden" value="PUT">
    <input name="_method" type="hidden" value="PUT">
    {!! csrf_field() !!}
    <div class="form-group">
        <label class="col-sm-3 control-label">Title</label>
        <div class="col-sm-9">
            <input class="form-control" name="title" type="text" value="{{$job->title}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Salary</label>
        <div class="col-sm-9">
            <input class="form-control" placeholder="$" name="salary" type="text" value="{{$job->salary}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">City</label>
        <div class="col-sm-9">
            <input class="form-control" placeholder="City or Location" name="city" type="text" value="{{$job->city}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Description</label>
        <div class="col-sm-9">
            <textarea class="form-control" name="description" cols="50" rows="10">{{$job->description}}</textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Job Offer Period</label>
        <div class="col-sm-9 input-daterange input-group" id="datepicker">
            <span class="input-group-addon">from</span>
            <input class="startdatepicker form-control" placeholder="DD-MM-YYYY" data-date-format="dd-mm-yyyy" name="start_date" type="text" value="{{$job->start_date}}">
            <span class="input-group-addon">to</span>
            <input class="startdatepicker form-control" placeholder="DD-MM-YYYY" data-date-format="dd-mm-yyyy" name="end_date" type="text" value="{{$job->end_date}}">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <input class="btn btn-primary btn-block" type="submit" value="Save">
        </div>
    </div>
</form>

@stop

@section('script')
<script type="text/javascript" src="../../assets/js/jquery.timeago.js"></script>
<script type="text/javascript" src="../../assets/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
$('.input-daterange').datepicker({
    format: "dd-mm-yyyy",
    weekStart: 1,
    // startDate: "today",
    todayBtn: "linked",
    todayHighlight: true
});
</script>
@stop
