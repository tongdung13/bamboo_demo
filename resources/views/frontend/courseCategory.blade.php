@extends('layouts.frontend')

@section('content')

    <div class="container">
        @foreach ($courses->categories as $category)
            <a href="{{ route('categoryLesson', $category->id) }}">
                <p>{{ $category->name }}</p>
            </a>
        @endforeach
    </div>


@endsection
