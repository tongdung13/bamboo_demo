
@extends('layouts.app')

@section('title', 'User Profile')

@section('content')

    <div class="container">
        UserName : <p>{{ $user->name }}</p>
        Emai : <p>{{  $user->email }}</p>

        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control-file">
            </div>
            <div class="form-group">
                <label>Made</label>
                <input type="radio" value="be trai" name="male" >
                <label>be trai </label>
                <input type="radio" value="be gai" name="male" >
                <label >be gai</label>
            </div>
            <div class="form-group">
                <label>Dob</label>
                <input type="date" name="dob" class="form-control">
            </div>
            <button type="submit" class="btn btn-sm btn-outline-success">Cap nhap</button>
        </form>
    </div>


@endsection
