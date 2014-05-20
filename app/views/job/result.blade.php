@extends('layout')

@section('title')
Search Results for: '{{{$query or ''}}}' 
@stop

@section('header')
<h1>Work Seek</h1>

{{ Form::open(array('route' => 'job.result', 'method' => 'GET', 'class'=>'form-group')) }}
    {{ Form::text('query', $query, array('class'=>'form-control input-lg', 'placeholder'=>'Search for an Industry, Description, Location or a minimum Salary.')) }}
    <br>
    {{ Form::submit('Search', array('class'=>'btn btn-primary btn-lg', 'style'=>'width:30%')) }}
 {{ Form::close() }}
@stop

@section('body')
<section>
    @if (count($jobs) == 0)
        <h2>Nothing Found</h2>
        <p>Sorry, but nothing matched your search criteria. Please try again with a different keyword.</p>
    @else
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Title</th>
                <th>City</th>
                <th>Salary</th>
                <th>Industry</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobs as $job)
            <tr onclick="window.document.location='{{{$job->id}}}';" style="cursor: pointer">
                <td>{{ link_to_route('job.show', $job->title, array($job->id)) }}</td>
                <td>{{{$job->city}}}</td>
                <td>${{{$job->salary}}}</td>
                <td>{{{$job->industry}}}</td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</section>
@stop