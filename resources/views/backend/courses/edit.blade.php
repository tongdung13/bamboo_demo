@extends('layouts.app')

@section('title', 'Course Update')

@section('content')

    <div class="container">


        <form action="{{ route('courses.update', $courses->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $courses->name }}" class="form-control">
                        @if ($errors->any())
                            <p style="color: red"> {{ $errors->first('name') }}</p>
                        @endif
                    </div>

                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" name="price" value="{{ $courses->price }}" class="form-control">
                        @if ($errors->any())
                            <p style="color: red"> {{ $errors->first('price') }}</p>
                        @endif
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-sm btn-outline-primary">Update</button>
        </form>
    </div>


@endsection
