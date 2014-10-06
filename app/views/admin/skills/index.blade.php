@extends('admin.layouts.default')

@section('main')

<h1>
    Sports <a href="{{ URL::route('admin.skills.create') }}" class="btn btn-success"><i class="icon-plus-sign"></i> Add New Skill Level</a>
</h1>

<hr>

{{ Notification::showAll() }}

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Level</th>
            <th>When</th>
            <th><i class="icon-cog"></i></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($skills as $skill)
        <tr>
            <td>{{ $skill->id }}</td>
            <td><a href="{{ URL::route('admin.skills.show', $skill->id) }}">{{ $skill->title }}</a></td>
       
            <td>{{ $skill->level }}</td>
            <td>{{ $skill->created_at }}</td>
            <td>
                <a href="{{ URL::route('admin.skills.edit', $skill->id) }}" class="btn btn-success btn-mini pull-left">Edit</a>

                {{ Form::open(array('route' => array('admin.skills.destroy', $skill->id), 'method' => 'delete', 'data-confirm' => 'Are you sure?')) }}
                <button type="submit" href="{{ URL::route('admin.skills.destroy', $skill->id) }}" class="btn btn-danger btn-mini">Delete</button>
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop
