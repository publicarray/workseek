@extends('layout')

@section('title') Employers @stop

@section('header')

<h1>Employers</h1>

@stop

@section('body')

<section>
    @if (count($employers) == 0)
        <h2>Error</h2>
        <p>Invalid employer count.</p>
    @else
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Industry</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employers as $employer)
            <tr onclick="window.document.location='employer_detail.php?id={$employer->id}';" style="cursor: pointer">
                <td>{{{$employer->id}}}</td>
                <td><a href="employer_detail.php?id={$employer.Id}">{{{$employer->name}}}</a></td>
                <td>{{{$employer->industry}}}</td>
                <td>{{{$employer->description}}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a class="btn btn-primary" role="button" href="add_employer.php?id={{{$employer->id}}}"><span class="glyphicon glyphicon-plus"></span> Add Your employer</a>
    @endif
</section>
@stop
