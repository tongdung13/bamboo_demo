@extends('layouts.app')

@section('title', 'Lesson Create')

@section('content')

    <div class="container">


        <form action="{{ route('lessons.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
                @if ($errors->any())
                    <p style="color: red"> {{ $errors->first('name') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label>Content</label>
                <textarea name="content" id="ckeditor" class="form-control"></textarea>
                @if ($errors->any())
                    <p style="color: red"> {{ $errors->first('content') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label>Video</label>
                <input type="file" name="video" class="form-control-file">
                @if ($errors->any())
                    <p style="color: red"> {{ $errors->first('video') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="categories[]" multiple size="3" class="form-control"
                    style="overflow-y: auto;">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Age</label>
                <select name="age_id" class="form-control">
                    @foreach ($ages as $value)
                        <option id="option" value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Toy</label>
                <select name="toy_id" class="form-control">
                    @foreach ($toys as $value)
                        <option id="option" value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-sm btn-outline-primary">Add</button>
        </form>
    </div>
@endsection
