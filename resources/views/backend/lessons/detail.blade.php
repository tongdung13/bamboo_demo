@extends('layouts.app')

@section('title', 'Blog Detail')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <video width="400" height="300" controls>
                    <source src="{{ $lessons->video }}" type="video/mp4">
                </video>
                <p>{{ $lessons->name }}</p>
                <p>{{ $lessons->age->name }}</p>
                <p>{{ $lessons->content }}</p>


                Đồ chơi theo tháng:
                @foreach ($toys as $lesson)
                    <p>
                        <img src="{{ $lesson->toy->image }}" style="width: 150; height: 150; float: right" alt="">
                    </p>
                    <p>{{ $lesson->toy->name }}</p>
                    <p>{{ $lesson->toy->using }}</p>
                @endforeach

            </div>
            <div class="col-3"></div>
        </div>
        <hr>
        Bài học cùng độ tuổi :
        <div class="row">
            @foreach ($ages as $blog)
                <div class="col-md-3">
                    <div class="card mb-4">
                        <a href="{{ route('lessons.show', $blog->id) }}">
                            <video width="245" height="100" controls>
                                <source src="{{ $lessons->video }}" type="video/mp4">
                            </video>
                        </a>
                        <div>
                            <p style="margin-left: 10px;" value="{{ $blog->age_id }}">{{ $blog->age->name }}
                            </p>
                        </div>
                        <div>
                            <a style="margin-left: 10px;"
                                href="{{ route('lessons.show', $blog->id) }}">{{ $blog->name }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection
