@extends('admin.layouts.default')

@section('main')
	<h2>Display page</h2>

	<hr>

	<h3>{{ $user->first_name.' '.$user->last_name }}</h3>
	<h5>{{ $user->email }}</h5>
	
@stop