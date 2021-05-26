@extends('layouts.app')

@section('title', 'Blog Detail')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-6">
                User Name: <p>{{ $users->name }}</p>
                Email : <p>{{ $users->email }}</p>
                Gioi tinh : <p>{{ $users->male }}</p>
                Ngay sinh : <p>{{ $users->dob }}</p>
            </div>
            <div class="col-6">
                <img src="{{ url('storage/' . $users->image) }}" style="width: 250px; height: 250px" alt="">
            </div>
        </div>

    </div>


@endsection
