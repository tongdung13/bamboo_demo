@extends('layouts.app')

@section('title', 'Lesson')

@section('content')

    <div class="container">

        <a href="{{ route('lessons.create') }}" class="btn btn-sm btn-outline-success">Add</a>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Content</th>
                    <th>Video</th>
                    <th>Age</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lessons as $key => $lesson)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                            <a href="{{ route('lessons.show', $lesson->id) }}">{{ $lesson->name }}</a>
                        </td>
                        <td>
                            <textarea id="" cols="20" rows="5">
                                {{ $lesson->content }}
                            </textarea>
                        </td>
                        <td>
                            <video width="200" height="110" controls>
                                <source src="{{ $lesson->video }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </td>
                        <td>{{ $lesson->age->name }}</td>
                        <td>
                            <a href="{{ route('lessons.edit', $lesson->id) }}"
                                class="btn btn-sm btn-outline-warning">Update</a>
                            <a href="{{ route('lessons.destroy', $lesson->id) }}" class="btn btn-sm btn-outline-danger"
                                onclick="return confirm('You may want to delete?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $lessons->links('pagination::bootstrap-4') }}
        </div>
    </div>



@endsection
