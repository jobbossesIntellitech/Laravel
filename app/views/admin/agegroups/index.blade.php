@extends('admin.layouts.default')

@section('main')

<h1>
    Sports <a href="{{ URL::route('admin.agegroups.create') }}" class="btn btn-success"><i class="icon-plus-sign"></i> Add New Sport</a>
</h1>

<hr>

{{ Notification::showAll() }}

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            
            <th>When</th>
            <th><i class="icon-cog"></i></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($agegroups as $agegroup)
        <tr>
            <td>{{ $agegroup->id }}</td>
            <td><a href="{{ URL::route('admin.agegroups.show', $agegroup->id) }}">{{ $agegroup->title }}</a></td>
       
            <td>{{ $agegroup->created_at }}</td>
            <td>
                <a href="{{ URL::route('admin.agegroups.edit', $agegroup->id) }}" class="btn btn-success btn-mini pull-left">Edit</a>

                {{ Form::open(array('route' => array('admin.agegroups.destroy', $agegroup->id), 'method' => 'delete', 'data-confirm' => 'Are you sure?')) }}
                <button type="submit" href="{{ URL::route('admin.agegroups.destroy', $agegroup->id) }}" class="btn btn-danger btn-mini">Delete</button>
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop
