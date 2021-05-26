@extends('layouts.frontend')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                @if (!\Illuminate\Support\Facades\Auth::user())
                    Bạn chưa đăng nhập
                    <a href="{{ route('login') }}">mời bạn đăng nhập</a>
                @elseif($users = \Illuminate\Support\Facades\Auth::user())
                    <h2>{{ $courses->name }}</h2>
                    <p>Nội dung khóa học :</p>
                    <b>{!! $courses->content !!}</b>
                    <h5 style="color: red">Giá khóa học : {{ number_format($courses->price, 2) }} </h5>
                    <p>Dành cho lứa tuổi : {{ $courses->age->name }}</p>
                    @foreach($users->user_profiles as $userProfile)

                    @endforeach
                    <form action="{{ route('updateCourse', $courses->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="checkbox" name="userProfiles[]" value="{{ $userProfile->id }}">
                        <label for="">Bạn đồng ý mua</label><br>
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                        <button class="btn btn-primary" onclick="window.history.go(-1); return false;">Back</button>
                    </form>
                @endif
            </div>
            <div class="col-3"></div>
        </div>
    </div>




@endsection
