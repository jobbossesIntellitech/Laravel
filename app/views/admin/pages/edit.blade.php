@extends('admin.layouts.default')
 
@section('main')
 
        <h2>Edit page</h2>
		{{ Notification::showAll() }}
 
		@if ($errors->any())
				<div class="alert alert-error">
						{{ implode('<br>', $errors->all()) }}
				</div>
		@endif
        {{ Form::model($page, array('method' => 'put', 'route' => array('admin.pages.update', $page->id))) }}
 
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
 
                <div class="form-actions">
                        {{ Form::submit('Save', array('class' => 'btn btn-success btn-save btn-large')) }}
                        <a href="{{ URL::route('admin.pages.index') }}" class="btn btn-large">Cancel</a>
                </div>
 
        {{ Form::close() }}
 
@stop