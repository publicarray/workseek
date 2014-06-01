@extends('layout')

@section('title')Edit Job @stop

@section('head')
{{ HTML::style('assets/css/datepicker.css') }}
@stop

@section('body')

<p class="bg-warning" style="color:#fff;">
    @foreach($errors->all() as $error)
        {{ $error }}<br />
    @endforeach
</p>

{{ Form::model($job, array('route' => array('job.update', $job->id), 'method' => 'PUT', 'class'=>'form-horizontal')) }}
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
            {{ Form::text('enddate', null, array('class' => 'datepicker form-control', 'placeholder' => 'DD/MM/YYYY','data-date-format' => 'dd/mm/yyyy')) }}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <input class="btn btn-primary btn-block" type="submit" value="Save">
        </div>
    </div>
{{ Form::close() }}
@stop

@section('script')
{{ HTML::script('assets/js/bootstrap-datepicker.js') }}
<script type="text/javascript">
$('.datepicker').datepicker({
    format: "dd/mm/yyyy",
    weekStart: 1,
    // startDate: "today",
    todayBtn: "linked",
    todayHighlight: true
});
</script>
@stop
