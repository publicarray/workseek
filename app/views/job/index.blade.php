@extends('layout')

@section('title')
@if(isset($query))
Search Results for '{{$query}}'
@else
Recently Added Jobs
@endif
@stop

@section('body')

{{ Form::open(array('route' => 'job.index', 'method' => 'get', 'class'=>'form')) }}
<div class="input-group input-group-lg">
  <input type="search" name="query" class="form-control" placeholder="Search for Industry, Description, Location or a min Salary." @if(isset($query)) value="{{{$query}}}" @endif>
  <span class="input-group-btn"><input class="btn btn-primary btn-lg" type="submit" value="search"></span>
</div>
{{ Form::close()}}

@if (!isset($jobs) || count($jobs) === 0)
    <p class="bg-warning text-center" style="color:#fff;">Sorry we could not find any Jobs with your query '@if(isset($query)){{{$query}}}' @endif.</p>
@else

<section>
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
                <tr onclick="window.document.location='job/{{$job->id}}';" style="cursor: pointer">
                <td>{{ link_to_route('job.show', $job->title, array($job->id)) }}</td>
                <td>{{{ $job->city }}}</td>
                <td>{{{ $job->salary }}}</td>
                <td>{{{ $job->employer()->first()->industry }}}</td>
            </tr>
        @endforeach
         </tbody>
    </table>
</section>

@if(isset($query))
{{$jobs->links()}}
@endif

@endif

@stop
