@extends('layouts.app')

@section('title', 'Category')

@section('content')

    <div class="container">

        <a href="{{ route('categories.create') }}" class="btn btn-sm btn-outline-success">Add</a>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $key => $category)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                            <a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a>
                            </td>
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-outline-warning">Update</a>
                            <a href="{{ route('categories.destroy', $category->id) }}" class="btn btn-sm btn-outline-danger" onclick="return confirm('You may want to delete?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $categories->links("pagination::bootstrap-4") }}
        </div>
    </div>



@endsection
