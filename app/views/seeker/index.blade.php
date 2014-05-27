@extends('layout')

@section('title')All seekers @stop

@section('body')

@foreach ($seekers as $seeker)
<ul>
    <li>{{{ $seeker->name }}}</li>
    <li>{{ link_to_route('seeker.show', 'Detail', array($seeker->id)) }}</li>
</ul>
@endforeach
