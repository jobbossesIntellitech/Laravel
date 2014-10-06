@extends('admin.layouts.default')

@section('main')

	<h2>Edit Slide</h2>

	@include('admin._partials.notifications')

	{{ Form::model($slider, array('method' => 'put', 'route' => array('admin.slider.update', $slider->id), 'files' => true)) }}

		<div class="control-group">
			{{ Form::label('title', 'Title') }}
			<div class="controls">
				{{ Form::text('title') }}
			</div>
		</div>

		<div class="control-group">
			{{ Form::label('image', 'Image') }}

			<div class="fileupload fileupload-new" data-provides="fileupload">
				<div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;">
					@if ($slider->image)
						<a href="<?php echo $slider->image; ?>"><img src="<?php echo Image::resize($slider->image, 200, 150); ?>" alt=""></a>
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
			<a href="{{ URL::route('admin.slider.index') }}" class="btn btn-large">Cancel</a>
		</div>

	{{ Form::close() }}

@stop
