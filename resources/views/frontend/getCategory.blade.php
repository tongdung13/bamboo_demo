@extends('layouts.frontend')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-3">
                <h3 style="color: rgba(182, 225, 65, 0.863)">Danh mục bài học</h3>
                <hr>
                <table class="table">
                    @foreach ($categories as $category)
                        <a href="{{ route('categoryLesson', $category->id) }}">
                            <h4 style="color: blue; text-transform: uppercase;">{{ $category->name }}</h4>
                        </a>
                        <hr>
                    @endforeach
                </table>
            </div>
            <div class="col-9">
                
            </div>

        </div>


    </div>






@endsection
