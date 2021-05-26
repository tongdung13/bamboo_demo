@extends('layouts.app')

@section('title', 'Blog')

@section('content')

    <div class="container">

        <a href="{{ route('ages.create') }}" class="btn btn-sm btn-outline-success">Add</a>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($ages as $key => $age)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                            <a href="{{ route('ages.show', $age->id) }}">{{ $age->name }}</a>
                        </td>
                        <td>
                            <a href="{{ route('ages.edit', $age->id) }}" class="btn btn-sm btn-outline-warning">Update</a>
                            <a href="{{ route('ages.destroy', $age->id) }}" class="btn btn-sm btn-outline-danger" onclick="return confirm('You may want to delete?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $ages->links("pagination::bootstrap-4") }}
        </div>
    </div>
    


@endsection
