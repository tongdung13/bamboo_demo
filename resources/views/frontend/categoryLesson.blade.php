@extends('layouts.frontend')

@section('content')

    <div class="container">
        @foreach ($categories->lessons as $lesson)
            <a href="{{ route('showLesson', $lesson->id) }}">
                <p>{{ $lesson->name }}</p>
            </a>
        @endforeach
    </div>


@endsection
