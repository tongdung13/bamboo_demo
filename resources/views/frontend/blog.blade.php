@extends('layouts.frontend')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-3">
                <h3 style="color: rgba(182, 225, 65, 0.863)">Danh mục bài học</h3>
                <hr>
                <table class="table">
                    @foreach ($lessons as $lesson)
                        <a href="{{ route('showLesson', $lesson->id) }}">
                            <h4 style="color: blue; text-transform: uppercase;">{{ $lesson->name }}</h4>
                        </a>
                        <hr>
                    @endforeach
                </table>
            </div>
            <div class="col-9">
                <h3 style="color: rgb(145, 69, 79)">Blog </h3>
                @foreach ($blogs as $blog)
                    <table class="table">
                        <td>
                            <div class="row">
                                <div class="col-4">
                                    <a href="{{ route('showBlog', $blog->id) }}">
                                        <img src="{{ $blog->image }}"
                                            style="width: 250px; height: 200px; float: left;" alt="">
                                    </a>
                                </div>
                                <div class="col-8">
                                    <a href="{{ route('showBlog', $blog->id) }}">
                                        <h3 style="color: salmon; text-transform:uppercase">{{ $blog->title }}</h3>
                                    </a>
                                    <b>{!! Str::limit($blog->content, 200) !!}</b>
                                </div>
                            </div>
                        </td>
                    </table>
                @endforeach
                <div>
                    {{ $blogs->links('pagination::bootstrap-4') }}
                </div>
            </div>

        </div>


    </div>






@endsection
