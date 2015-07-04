@extends('layout')

@section('title')All Applications
@if(isset($job))
for {{{ $job->title }}}
@endif
@stop

@section('body')

@if (!isset($applications) || count($applications) === 0)
    <p class="bg-warning text-center" style="color:#fff;">Sorry we could not find any applications under your account</p>
@else

<section>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Application No</th>
                <th>Time user Applied</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($applications as $application)
                <tr onclick="window.document.location='application/{{$application->id}}';" style="cursor: pointer">
                <td><a href="application/{{$application->id}}">{{$application->id}}</a></td>
                <td>{{{$application->created_at->format('d/m/Y H:i:s')}}}</td>
                <td><a href="application/{{$application->id}}" class="btn btn-primary btn-block">Detail</a></td>
            </tr>
        @endforeach
         </tbody>
    </table>
</section>

{!! $applications->render() !!}

@endif

@stop
