@extends('layouts.frontend')

@section('content')

    <div class="container">
        {{-- course --}}

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
                <h3 style="color: red">Tuyển sinh</h3>
                @foreach ($courses as $course)
                    <table class="table">
                        <td>
                            <div class="row">
                                <div class="col-4">
                                    <img src="{{ url('storage/' . $course->image) }}"
                                        style="width: 300px; height: 200px; float: right" alt="">
                                </div>
                                <div class="col-5">
                                    <h5>{{ $course->name }}</h5>
                                </div>
                            </div>
                        </td>
                    </table>
                @endforeach
                <div>
                    {{ $courses->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>


@endsection
