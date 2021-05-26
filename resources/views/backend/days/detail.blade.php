@extends('layouts.app')

@section('title', 'Blog Detail')

@section('content')

    <div class="container">
        @foreach($days->lessons as $lesson)
            <p>{{ $lesson->name }}</p>
        @endforeach
    </div>


@endsection
