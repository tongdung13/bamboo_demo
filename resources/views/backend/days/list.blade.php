@extends('layouts.app')

@section('title', 'Lesson')

@section('content')

    <div class="container">

        <a href="{{ route('days.create') }}" class="btn btn-sm btn-outline-success">Add</a>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($days as $key => $day)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                            <a href="{{ route('days.show', $day->id) }}">
                                {{ $day->name }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('days.edit', $day->id) }}" class="btn btn-sm btn-outline-warning">Update</a>
                            <a href="{{ route('days.destroy', $day->id) }}" class="btn btn-sm btn-outline-danger"
                                onclick="return confirm('You may want to delete?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{-- {{ $lessons->links('pagination::bootstrap-4') }} --}}
        </div>
    </div>



@endsection
