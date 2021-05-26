@extends('layouts.app')

@section('title', 'Blog')

@section('content')

    <div class="container">

        <a href="{{ route('blogs.create') }}" class="btn btn-sm btn-outline-success">Add</a>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Age</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($blogs as $key => $blog)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                            <a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a>
                        </td>
                        <td>{{ $blog->category->name }}</td>
                        <td>{{ $blog->age }}</td>
                        <td>
                            <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-sm btn-outline-warning">Update</a>
                            <a href="{{ route('blogs.destroy', $blog->id) }}" class="btn btn-sm btn-outline-danger" onclick="return confirm('You may want to delete?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $blogs->links("pagination::bootstrap-4") }}
        </div>
    </div>



@endsection
