@extends('admin.layouts.default')

@section('main')

	<h2>Edit Sport</h2>

	@include('admin._partials.notifications')

	{{ Form::model($agegroup, array('method' => 'put', 'route' => array('admin.agegroups.update', $agegroup->id), 'files' => true)) }}

		<div class="control-group">
			{{ Form::label('title', 'Title') }}
			<div class="controls">
				{{ Form::text('title') }}
			</div>
		</div>

		<div class="control-group">
			{{ Form::label('start_age', 'Start Age') }}
			<div class="controls">
				{{ Form::text('start_age') }}
			</div>
		</div>

		
		<div class="control-group">
			{{ Form::label('end_age', 'End Age') }}
			<div class="controls">
				{{ Form::text('end_age') }}
			</div>
		</div>

		

		<div class="form-actions">
			{{ Form::submit('Save', array('class' => 'btn btn-success btn-save btn-large')) }}
			<a href="{{ URL::route('admin.agegroups.index') }}" class="btn btn-large">Cancel</a>
		</div>

	{{ Form::close() }}

@stop
