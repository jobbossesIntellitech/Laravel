@extends('admin.layouts.default')

@section('main')
	<h2>Display Sport</h2>

	<hr>

	<h3>{{ $sport->title }}</h3>
	<h5>{{ $sport->created_at }}</h5>
	{{ $sport->body }}

	@if ($sport->image)
		<hr>
		<figure><img src="{{ Image::resize($sport->image, 800, 600) }}" alt=""></figure>
	@endif
@stop
