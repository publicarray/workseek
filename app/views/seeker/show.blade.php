@extends('layout')

@section('title')A seeker @stop

@section('body')

<ul>
    <li>{{{ $seeker->name }}}</li>
    <li>{{{ $seeker->email }}}</li>
    <li>{{{ $seeker->phone }}}</li>
    <li>{{{ $seeker->username }}}</li>
    <li>{{{ $seeker->password }}}</li>
    <img src="{{ asset($seeker->image->url()) }}">
    <li>{{ link_to_route('seeker.edit', 'Edit', array($seeker->id)) }}</li>
</ul>

@stop
