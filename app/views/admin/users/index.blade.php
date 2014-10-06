@extends('admin.layouts.default')
 
@section('main')
<h1>
		Users <a href="{{ URL::route('admin.users.create') }}" class="btn btn-success"><i class="icon-plus-sign"></i> Add new user</a>
	</h1>
        <table class="table table-striped">
                <thead>
                        <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>When</th>
                                <th><i class="icon-cog"></i></th>
                        </tr>
                </thead>
                <tbody>
                        @foreach ($users as $user)
                            
                                <tr>
                                        <td>{{ $user->id }}</td>
                                        <td><a href="{{ URL::route('admin.users.show', $user->id) }}">{{$user->first_name.' '.$user->last_name}}</a></td>
                                        <td>created_at</td>
                                        <td>
                                                <a href="{{ URL::route('admin.users.edit', $user->id) }}" class="btn btn-success btn-mini pull-left">Edit</a>
 
                                                {{ Form::open(array('route' => array('admin.users.destroy', $user->id), 'method' => 'delete')) }}
                                                        <button type="submit" href="{{ URL::route('admin.users.destroy', $user->id) }}" class="btn btn-danger btn-mini">Delete</button>
                                                {{ Form::close() }}
                                        </td>
                                </tr>
                        @endforeach
                </tbody>
        </table>
 
@stop