@extends('layouts.app')

@section('title', 'Blog Detail')

@section('content')

    <div class="container">

        Tên khóa học : <p>{{ $courses->name }}</p>
        Giá khóa học : <p>{{ $courses->price }}</p>
    </div>


@endsection
