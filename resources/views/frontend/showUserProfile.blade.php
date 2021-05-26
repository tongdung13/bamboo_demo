@extends('layouts.frontend')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <h3 style="color: tomato">Các con của bạn</h3>
                @foreach ($users->user_profiles as $userProfile)
                    <table class="table">
                        <td>
                            <img src="{{ $userProfile->image }}" height="200px" width="200px"
                                style="float: right" alt="">
                            <p>Tên của bé : {{ $userProfile->name }}</p>
                            <p>Ngày sinh của bé : {{ $userProfile->dob }}</p>
                            <p>Con của bạn là : {{ $userProfile->gender }}</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Thay đổi thông tin con của bạn</p>
                            <a href="{{ route('editProfile', $userProfile->id) }}" class="btn btn-primary">Cập nhập</a>
                                </div>
                                <div class="col-md-6">
                                    <p>Xóa thông tin con của bạn</p>
                                    <a href="{{ route('destroy', $userProfile->id) }}" class="btn btn-primary"
                                        onclick="return confirm('Bạn có muốn xóa không?')">Xóa</a>
                                </div>
                            </div>
                        </td>
                    </table>
                @endforeach
            </div>
            <div class="col-3"></div>
        </div>

    </div>


@endsection
