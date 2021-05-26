@extends('layouts.app')

@section('title', 'Blog Detail')

@section('content')

    <div class="container">
        @foreach($categories->lessons as $lesson)
            <p>{{ $lesson->name }}</p>
        @endforeach
    </div>


@endsection
