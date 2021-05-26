@extends('layouts.app')

@section('title', 'Blog Create')

@section('content')

    <div class="container">


        <form action="{{ route('toys.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
                @if ($errors->any())
                    <p style="color: red"> {{ $errors->first('name') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label>Using</label>
                <textarea name="using" id="" cols="30" rows="10" class="form-control"></textarea>
                @if ($errors->any())
                    <p style="color: red"> {{ $errors->first('using') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control-file">
                @if ($errors->any())
                    <p style="color: red"> {{ $errors->first('image') }}</p>
                @endif
            </div>
            <button type="submit" class="btn btn-sm btn-outline-primary">Add</button>
        </form>
    </div>
@endsection
