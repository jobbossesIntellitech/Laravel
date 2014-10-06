@extends('admin.layouts.default')

@section('main')
	<h2>Display article</h2>

	<hr>

	<h3>{{ $slider->title }}</h3>
	<h5>{{ $slider->created_at }}</h5>

	@if ($slider->image)
		<hr>
		<figure><img src="{{ Image::resize($slider->image, 1960, 700) }}" alt=""></figure>
	@endif
@stop
