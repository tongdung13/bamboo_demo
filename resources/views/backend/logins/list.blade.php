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

                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $key => $user)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                            <a href="{{ route('users.detail', $user->id) }}" >{{ $user->userName }}</a>
                        </td>


                        <td>
                            <a href="{{ route('users.user-profile', $user->id) }}" class="btn btn-sm btn-outline-warning">Update</a>
                            <a href="{{ route('toys.destroy', $user->id) }}" class="btn btn-sm btn-outline-danger" onclick="return confirm('You may want to delete?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>



@endsection
