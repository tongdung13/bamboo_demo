@extends('layouts.frontend')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <video id="myvideo" width="600" height="300" controls loop>
                    <source src="{{ $lessons->video }}">
                </video>
                <h3>{{ $lessons->name }}</h3>
                <p>{{ $lessons->content }}</p>
                <h3>Đồ chơi cho bé theo tháng</h3>
                @foreach($toys as $lesson)
                    <h5>{{ $lesson->toy->name }}</h5>
                    <b>{{ $lesson->toy->using }}</b>
                @endforeach
            </div>
            <div class="col-3"></div>
        </div>
    </div>


@endsection
