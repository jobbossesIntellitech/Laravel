@extends('admin.layouts.default')

@section('main')

	<h2>Edit Sport</h2>

	@include('admin._partials.notifications')

	{{ Form::model($sport, array('method' => 'put', 'route' => array('admin.sports.update', $sport->id), 'files' => true)) }}

		<div class="control-group">
			{{ Form::label('title', 'Title') }}
			<div class="controls">
				{{ Form::text('title') }}
			</div>
		</div>

		<div class="control-group">
			{{ Form::label('body', 'Content') }}
			<div class="controls">
				{{ Form::textarea('body') }}
			</div>
		</div>

		<div class="control-group">
			{{ Form::label('image', 'Image') }}

			<div class="fileupload fileupload-new" data-provides="fileupload">
				<div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;">
					@if ($sport->image)
						<a href="<?php echo $sport->image; ?>"><img src="<?php echo Image::resize($sport->image, 200, 150); ?>" alt=""></a>
					@else
						<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image">
					@endif
				</div>
				<div>
					<span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>{{ Form::file('image') }}</span>
					<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
				</div>
			</div>
		</div>

		<div class="form-actions">
			{{ Form::submit('Save', array('class' => 'btn btn-success btn-save btn-large')) }}
			<a href="{{ URL::route('admin.sports.index') }}" class="btn btn-large">Cancel</a>
		</div>

	{{ Form::close() }}

@stop
