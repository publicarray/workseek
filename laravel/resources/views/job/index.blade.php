@extends('layout')

@section('title')
@if(isset($query))
Search Results for '{{$query}}'
@else
Recently Added Jobs
@endif
@stop

@section('body')

<form method="GET" action="../job" accept-charset="UTF-8" class="form">
    <div class="input-group input-group-lg">
      <input type="search" name="query" class="form-control" placeholder="Search for Industry, Description, Location or a min Salary." @if(isset($query)) value="{{{$query}}}" @endif>
      <span class="input-group-btn"><input class="btn btn-primary btn-lg" type="submit" value="search"></span>
    </div>
</form>

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
                <td><a href="job/{{$job->id}}">{{$job->title}}</a></td>
                <td>{{{ $job->city }}}</td>
                <td>{{{ $job->salary }}}</td>
                @if(isset($query))
                <td>{{{ $job->industry }}}</td>
                @else
                <td>{{{ $job->employer()->first()->industry }}}</td>
                @endif
            </tr>
        @endforeach
         </tbody>
    </table>
</section>

{!! str_replace('/?', '?', $jobs->render()) !!}

@endif

@stop
