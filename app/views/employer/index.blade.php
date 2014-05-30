@extends('layout')
@section('title')All employers @stop

@section('body')

@foreach ($employers as $employer)
<ul>
    <li>{{{ $employer->name }}}</li>
    <li>{{ link_to_route('employer.show', 'Detail', array($employer->id)) }}</li>
</ul>
@endforeach

@stop
