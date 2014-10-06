@extends('admin.layouts.default')

@section('main')

<h1>
    Slides <a href="{{ URL::route('admin.slider.create') }}" class="btn btn-success"><i class="icon-plus-sign"></i> Add new Slide</a>
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
        @foreach ($sldiers as $slider)
        <tr>
            <td>{{ $slider->id }}</td>
            <td><a href="{{ URL::route('admin.slider.show', $slider->id) }}">{{ $slider->title }}</a></td>
            <td>
                @if ($slider->image)
                <a href="<?php echo $slider->image; ?>"><img src="<?php echo Image::resize($slider->image, 200, 150); ?>" alt=""></a>
                @else
                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image">
                @endif
            </td>
            <td>{{ $slider->created_at }}</td>
            <td>
                <a href="{{ URL::route('admin.slider.edit', $slider->id) }}" class="btn btn-success btn-mini pull-left">Edit</a>

                {{ Form::open(array('route' => array('admin.slider.destroy', $slider->id), 'method' => 'delete', 'data-confirm' => 'Are you sure?')) }}
                <button type="submit" href="{{ URL::route('admin.slider.destroy', $slider->id) }}" class="btn btn-danger btn-mini">Delete</button>
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop
