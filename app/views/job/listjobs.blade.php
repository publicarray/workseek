@extends('layout')

@section('title')All Jobs
@if (Auth::check() && Auth::user()->role == 'employer')
by {{{Auth::user()->name}}}
@endif
@stop

@section('body')

@if (!isset($jobs) || count($jobs) === 0)
    <p class="bg-warning text-center" style="color:#fff;">Sorry we could not find any Jobs under your account.</p>
@else

<section>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Title</th>
                <th>City</th>
                <th>Salary</th>
                <th>Industry</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($jobs as $job)
                <tr onclick="window.document.location='{{$job->id}}';" style="cursor: pointer">
                <td>{{ link_to_route('job.show', $job->title, array($job->id)) }}</td>
                <td>{{{ $job->city }}}</td>
                <td>{{{ $job->salary }}}</td>
                <td>{{{ $job->employer()->first()->industry }}}</td>
                <td>
                {{ Form::open(array('route' => 'application.index', 'method' => 'get', 'class'=>'form-horizontal')) }}
                    <input type="hidden" name="id" value="{{{$job->id}}}">
                    <input class="btn btn-primary btn-block" type="submit" value="View Applications">
                {{ Form::close() }}
                </td>
            </tr>
        @endforeach
         </tbody>
    </table>
</section>

{{ $jobs->links() }}

@endif

@stop
