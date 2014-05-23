@extends('layout')

@section('title')Login or Create an Account @stop

@section('header')
<h1>Work Seek</h1>

{{ Form::open(array('route' => 'job.result', 'method' => 'GET', 'class'=>'form-group')) }}
{{ Form::text('query', null, array('class'=>'form-control input-lg', 'placeholder'=>'Search for an Industry, Description, Location or a minimum Salary.')) }}
<br>
{{ Form::submit('Search', array('class'=>'btn btn-primary btn-lg', 'style'=>'width:30%')) }}
{{ Form::close() }}
@stop

@section('body')

{{--
{{ Form::open(array('route' => 'user.store', 'method' => 'POST', 'class'=>'form')) }}
<div class="form-group">
   {{ Form::text('username', null, array('class'=>'form-control input-sm', 'Username')) }}
</div>
<div class="form-group">
   {{ Form::password('password', array('class'=>'form-control input-sm', 'Password')) }}
</div>
<div class="form-group">
   {{ Form::submit('Register', array('class'=>'btn btn-default')) }}
   {{link_to_route('user.index', 'or Login', null, array('class'=>''))}}
</div>
{{ Form::close() }}

--}}

{{ Form::open(array('route' => 'user.store', 'method' => 'POST', 'class'=>'form-horizontal')) }}

<div class="form-group @if ($errors->first('username'))has-error@endif">
  {{ Form::label('username', 'Username: ', array('class'=>'col-sm-2')) }}

  <div class="col-sm-10">
    {{ Form::text('username', null, array('class'=>'form-control')) }}

    @if ($errors->first('username'))
    <label class="control-label" for="username">{{ $errors->first('username') }}</label>
    @endif
  </div>
</div>
<div class="form-group @if ($errors->first('password'))has-error@endif">
  {{ Form::label('password', 'Password: ', array('class'=>'col-sm-2')) }}

  <div class="col-sm-10">
    {{ Form::password('password', array('class'=>'form-control')) }}

    @if ($errors->first('password'))
    <label class="control-label" for="password">{{ $errors->first('password') }}</label>
    @endif
  </div>
</div>



<!-- <div class="radio">
  <label>
    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
    Option one is this and that&mdash;be sure to include why it's great
  </label>
</div>
<div class="radio">
  <label>
    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
    Option two can be something else and selecting it will deselect option one
  </label>
</div> -->
<div class="form-group @if ($errors->first('type'))has-error@endif">
    {{ Form::label('type', 'Account Type: ', array('class'=>'col-sm-2')) }}
    <div class="radio col-sm-10">
        <label>{{ Form::radio('type', 'user', true)}}User</label>
    </div>
    <div class="radio col-sm-10 col-sm-offset-2">
        <label>{{ Form::radio('type', 'employer')}}Employer</label>
    </div>
    @if ($errors->first('type'))
    <label class="control-label" for="type">{{ $errors->first('type') }}</label>
    @endif
</div>

<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    {{ Form::submit('Sign Up', array('class'=>'btn btn-default')) }}

  </div>
</div>
{{ Form::close() }}

@stop
