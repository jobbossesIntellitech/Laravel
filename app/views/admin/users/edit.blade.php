@extends('admin.layouts.default')
 
@section('main')
 
        <h2>Edit User</h2>
		{{ Notification::showAll() }}
 
		@if ($errors->any())
				<div class="alert alert-error">
						{{ implode('<br>', $errors->all()) }}
				</div>
		@endif
        {{ Form::model($user, array('method' => 'put', 'route' => array('admin.users.update', $user->id))) }}
 
                <div class="control-group">
                        {{ Form::label('first_name', 'First Name') }}
                        <div class="controls">
                                {{ Form::text('first_name') }}
                        </div>
                </div>
 
                <div class="control-group">
                        {{ Form::label('last_name', 'Last Name') }}
                        <div class="controls">
                                {{ Form::text('last_name') }}
                        </div>
                </div>
 
                <div class="form-actions">
                        {{ Form::submit('Save', array('class' => 'btn btn-success btn-save btn-large')) }}
                        <a href="{{ URL::route('admin.users.index') }}" class="btn btn-large">Cancel</a>
                </div>
 
        {{ Form::close() }}
 
@stop