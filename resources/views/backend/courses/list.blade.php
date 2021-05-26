@extends('layouts.app')

@section('title', 'Course')

@section('content')

    <div class="container">

        <a href="{{ route('courses.create') }}" class="btn btn-sm btn-outline-success">Add</a>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $key => $course)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                            <a href="{{ route('courses.show', $course->id) }}">{{ $course->name }}</a>
                        </td>
                        <td>{{ $course->price }}</td>
                        <td>
                            <a href="{{ route('courses.edit', $course->id) }}"
                                class="btn btn-sm btn-outline-warning">Update</a>
                            <a href="{{ route('courses.destroy', $course->id) }}" class="btn btn-sm btn-outline-danger"
                                onclick="return confirm('You may want to delete?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $courses->links('pagination::bootstrap-4') }}
        </div>
    </div>



@endsection
