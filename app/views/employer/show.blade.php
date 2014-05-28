@extends('layout')

@section('title')A Employer @stop

@section('body')

<ul>
    <li>{{{ $user->name }}}</li>
    <li>{{{ $user->email }}}</li>
    <li>{{{ $user->phone }}}</li>
    <li>{{{ $user->username }}}</li>
    <li>{{{ $user->password }}}</li>
    <li>{{{ $employer->industry }}}</li>
    <li>{{{ $employer->city }}}</li>
    <li>{{{ $employer->description }}}</li>
    <img src="{{ asset($user->image->url()) }}">
    <li>{{ link_to_route('employer.edit', 'Edit', array($user->id)) }}</li>
    <li>{{ link_to_route('job.create', 'Add Job') }}</li>
</ul>

@stop
