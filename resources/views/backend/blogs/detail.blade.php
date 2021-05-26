@extends('layouts.app')

@section('title', 'Blog Detail')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-6">
                <p style="color: royalblue; text-transform:uppercase">{{ $blogs->title }}</p>
                <div>
                    <b>{!! $blogs->content !!}</b>
                </div>
            </div>
            <div class="col-3"></div>

        </div>
        <a href="" onclick="window.history.go(-1); return false;">Back</a>

        <hr>
        <div class="row">
            @foreach ($categorys as $blog)
                <div class="col-md-3">
                    <div class="card mb-4">
                        <a href="{{ route('blogs.show', $blog->id) }}">
                            <img src="{{ $blog->image }}" style="width: 245px; height: 200px"><br />
                        </a>
                        <div>
                            <p style="margin-left: 10px;" value="{{ $blog->category_id }}">{{ $blog->category->name }}
                            </p>
                        </div>
                        <div>
                            <a style="margin-left: 10px;"
                                href="{{ route('blogs.show', $blog->id) }}">{{ Str::limit($blog->title, 20) }}</a>
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
