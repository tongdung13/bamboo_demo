@extends('layouts.app')

@section('title', 'Blog Update')

@section('content')

    <div class="container">


        <form action="{{ route('toys.update', $toys->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Nmae</label>
                <input type="text" name="name" value="{{ $toys->name }}" class="form-control">
                @if ($errors->any())
                    <p style="color: red"> {{ $errors->first('name') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label>Using</label>
                <textarea name="using" class="form-control">{{ $toys->using }}</textarea>
                @if ($errors->any())
                    <p style="color: red"> {{ $errors->first('using') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" value="{{ $toys->image }}"  class="form-control-file"><br>
                <img src="{{ url('storage/' . $toys->image) }}" style="width: 100px; height: 100px;" alt="">
                @if ($errors->any())
                    <p style="color: red"> {{ $errors->first('image') }}</p>
                @endif
            </div>
            <button type="submit" class="btn btn-sm btn-outline-primary">Update</button>
        </form>
    </div>
@endsection
