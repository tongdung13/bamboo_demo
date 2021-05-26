@extends('layouts.frontend')

@section('content')

    <div class="container">
        <p>{{ $users->name }}</p>
        
        @foreach ($users->courses as $course)
            <a href="{{ route('courseCategory', $course->id) }}">
                <p>{{ $course->name }}</p>
            </a>
        @endforeach
    </div>

@endsection
