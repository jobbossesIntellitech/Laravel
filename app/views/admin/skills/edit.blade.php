@extends('admin.layouts.default')

@section('main')

	<h2>Edit Sport</h2>

	@include('admin._partials.notifications')

	{{ Form::model($skill, array('method' => 'put', 'route' => array('admin.skills.update', $skill->id), 'files' => true)) }}

		<div class="control-group">
			{{ Form::label('title', 'Title') }}
			<div class="controls">
				{{ Form::text('title') }}
			</div>
		</div>

		<div class="control-group">
			{{ Form::label('level', 'Level') }}
			<div class="controls">
				{{ Form::text('level') }}
			</div>
		</div>		

		<div class="form-actions">
			{{ Form::submit('Save', array('class' => 'btn btn-success btn-save btn-large')) }}
			<a href="{{ URL::route('admin.skills.index') }}" class="btn btn-large">Cancel</a>
		</div>

	{{ Form::close() }}

@stop
