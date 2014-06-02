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
                <td>{{ link_to_route('application.show', $application->id, array($job->id)) }}</td>
                <td>{{{$application->created_at->format('d/m/Y H:i:s')}}}</td>
                <td>{{ link_to_route('application.show', 'Detail', array($application->id), array('class'=>'btn btn-primary btn-block')) }}</td>
            </tr>
        @endforeach
         </tbody>
    </table>
</section>

@endif

@stop
