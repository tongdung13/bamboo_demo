@extends('layouts.app')

@section('title', 'Blog Detail')

@section('content')

    <div class="container">

        <p>{{ $blogs->title }}</p>
        <div>
            <img src="{{ url('storage/' . $blogs->image) }}" style="width: 300px; height:300px; float: right;" alt="">
            <p>{!! $blogs->content !!}</p>
        </div>
        <div>
            @foreach ($blogs as $key => $blog)
                <div class="col-md-3">
                    <div class="card mb-3">
                        <a href="{{ route('blogs.show', $blogs->id) }}">
                            <img src="{{ url('storage/' . $blogs->image) }}" style="width: 222px; height: 200px"><br />
                        </a>
                        <div>
                            <p style="margin-left: 10px;" value="{{ $blogs->category_id }}">{{ $blogs->category->name }}
                            </p>
                        </div>
                        <div>
                            <a style="margin-left: 10px;" href="{{ route('blogs.show', $blogs->id) }}">{{ $blogs->title }}</a>
                        </div>
                        <div>
                            <p style="margin-left: 10px;">Đăng vào: {{ $blogs->created_at }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </div>



@endsection
