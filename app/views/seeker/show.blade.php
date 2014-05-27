@extends('layout')

@section('title')A seeker @stop

@section('body')

@foreach ($records as $record)
<ul>
    <li>{{{ $record->name }}}</li>
    <li>{{{ $record->email }}}</li>
    <li>{{{ $record->phone }}}</li>
    <li>{{{ $record->username }}}</li>
    <li>{{{ $record->password }}}</li>
<img src="asset($record->image->url()) ">
    <li>{{ link_to_route('seeker.edit', 'Edit', array($record->id)) }}</li>
</ul>
@endforeach
