@extends('layouts.frontend')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-3">
                <h3 style="color: red">Danh sách khóa học</h3>
                <hr>
                <table class="table">
                    @foreach ($courses as $course)
                        <a href="{{ route('showCourse', $course->id) }}">
                            <h4 style="color: blue; text-transform: uppercase;">{{ $course->name }}</h4>
                        </a>
                        <hr>
                    @endforeach
                </table>
            </div>
            <div class="col-9">
                <h2 style="color: darkgoldenrod; text-transform: uppercase;">{{ $blogs->title }}</h2>
                <p>Đăng vào : {{ Str::limit($blogs->created_at, 10) }}</p>
                <div>
                    <b>{!! $blogs->content !!}</b>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            @foreach ($categories as $blog)
                <div class="col-md-3">
                    <div class="card mb-4">
                        <a href="{{ route('showBlog' , $blog->id) }}">
                            <img src="{{ $blog->image }}" style="width: 245px; height: 200px"><br />
                        </a>
                        <div>
                            <p style="margin-left: 10px;" value="{{ $blog->category_id }}">{{ $blog->category->name }}
                            </p>
                        </div>
                        <div>
                            <a style="margin-left: 10px;" href="{{ route('showBlog', $blog->id) }}">{{ Str::limit($blog->title, 20) }}</a>
                        </div>
                        <div>
                            <p style="margin-left: 10px;">Đăng vào: {{ Str::limit($blog->created_at, 10) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection
