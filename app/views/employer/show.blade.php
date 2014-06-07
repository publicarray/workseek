@extends('layout')

@section('title')A Employer @stop

@section('body')
    <div class="col-xs-12">
        <img class="img-responsive" src="{{ asset($user->image->url('medium')) }}">
        <h2>{{{ $user->name }}}</h2>
    </div>
    <div class="col-xs-6 col-sm-4">
        <p><i class="glyphicon glyphicon-user"></i> User name:</p>
        <p><i class="glyphicon glyphicon-envelope"></i> Email:</p>
        <p><i class="glyphicon glyphicon-earphone"></i> Phone:</p>
        <p><i class="glyphicon glyphicon-briefcase"></i> Industry:</p>
    </div>
    <div class="col-xs-6 col-sm-8">
        <p>{{{ $user->username }}}</p>
        <p>{{{ $user->email }}}</p>
        <p>{{{ $user->phone }}}</p>
        <p>{{{ $employer->industry }}}</p>
    </div>
    <div class="col-xs-12">
        <p>{{{ $employer->description }}}</p>
    </div>
    <div class="col-xs-4">
        {{ link_to_route('employer.edit', 'Edit Profile', array($user->id), array('class'=>'btn btn-primary btn-block')) }}
    </div>
    <div class="col-xs-4">
        {{ link_to_route('job.create', 'Add a Job Offer', null, array('class'=>'btn btn-primary btn-block')) }}
    </div>
    <div class="col-xs-4">
        <button type="submit" class="btn btn-danger btn-block" data-toggle="modal" data-target="#{{{$user->id}}}"><span class="glyphicon glyphicon-trash"></span> Close Account</button>
        <!-- Modal -->
        <div class="modal fade" id="{{{$user->id}}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Delete {{{$user->username}}}?</h4>
                    </div>
                    <div class="modal-body">
                        <h2>Are you sure you want to cancel your account '{{{$user->username}}}'?</h2>
                    </div>
                    <div class="modal-footer">
                        <button type="button" style="font-weight: 500;" class="btn btn-primary pull-right" data-dismiss="modal">Cancel</button>
                        {{ Form::open(array('route' => array('employer.destroy', $user->id), 'method' => 'delete', 'style' => 'display: inline-block', 'class' => 'pull-left')) }}
                        <button type="submit" class="btn btn-danger" style="font-weight: 500;"><span class="glyphicon glyphicon-trash"></span> Close Account</button>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop
