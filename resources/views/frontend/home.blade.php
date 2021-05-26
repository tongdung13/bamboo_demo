@extends('layouts.home')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-6">
                <h3 style="color: royalblue">Blog</h3>
                @foreach ($blogs as $blog)
                    <table class="table">
                        <td>
                            <div class="row">
                                <div class="c0l-4">
                                    <a href="{{ route('showBlog', $blog->id) }}">
                                        <img src="{{ $blog->image }}"
                                            style="width: 200px; height: 200px" alt="">
                                    </a>
                                </div>
                                <div class="col-7">
                                    <a href="{{ route('showBlog', $blog->id) }}">
                                        <h3 style="color: blue; text-transform: uppercase;">{{ $blog->title }}</h3>
                                    </a>
                                    <p>Đăng vào : {{ Str::limit($blog->created_at, 10) }}</p>
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
            <div class="col-6"></div>
        </div>
    </div>


@endsection
