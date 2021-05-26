@extends('layouts.app')

@section('title', 'Blog')

@section('content')

    <div class="container">

        <a href="{{ route('toys.create') }}" class="btn btn-sm btn-outline-success">Add</a>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Using</th>
                    <th>Image</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($toys as $key => $toy)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                            <a href="{{ route('toys.show', $toy->id) }}">{{ $toy->name }}</a>
                        </td>
                        <td>
                            <textarea id="" cols="20" rows="5">
                                {{ $toy->using }}
                            </textarea>
                            {{-- <p>{!! $blog->content !!}</p> --}}
                        </td>
                        <td>
                            <img src="{{ url('storage/' . $toy->image)}}" style="width: 100px; height: 100px;" alt="">
                        </td>
                        <td>
                            <a href="{{ route('toys.edit', $toy->id) }}" class="btn btn-sm btn-outline-warning">Update</a>
                            <a href="{{ route('toys.destroy', $toy->id) }}" class="btn btn-sm btn-outline-danger" onclick="return confirm('You may want to delete?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $toys->links("pagination::bootstrap-4") }}
        </div>
    </div>
    


@endsection
