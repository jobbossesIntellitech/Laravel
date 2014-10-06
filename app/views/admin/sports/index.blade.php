@extends('admin.layouts.default')

@section('main')

<h1>
    Sports <a href="{{ URL::route('admin.sports.create') }}" class="btn btn-success"><i class="icon-plus-sign"></i> Add New Sport</a>
</h1>

<hr>

{{ Notification::showAll() }}

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Thumb</th>
            <th>When</th>
            <th><i class="icon-cog"></i></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sports as $sport)
        <tr>
            <td>{{ $sport->id }}</td>
            <td><a href="{{ URL::route('admin.sports.show', $sport->id) }}">{{ $sport->title }}</a></td>
            <td>
                @if ($sport->image)
                    <a href="{{ URL::route('admin.sports.show', $sport->id) }}"><img src="<?php echo Image::resize($sport->image, 200, 150); ?>" alt=""></a>
                @else
                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image">
                @endif
            </td>
            <td>{{ $sport->created_at }}</td>
            <td>
                <a href="{{ URL::route('admin.sports.edit', $sport->id) }}" class="btn btn-success btn-mini pull-left">Edit</a>

                {{ Form::open(array('route' => array('admin.sports.destroy', $sport->id), 'method' => 'delete', 'data-confirm' => 'Are you sure?')) }}
                <button type="submit" href="{{ URL::route('admin.sports.destroy', $sport->id) }}" class="btn btn-danger btn-mini">Delete</button>
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop
