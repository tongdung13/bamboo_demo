@extends('layouts.app')

@section('title', 'Blog Update')

@section('content')

    <div class="container">


        <form action="{{ route('blogs.update', $blogs->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" value="{{ $blogs->title }}" class="form-control">
                @if ($errors->any())
                    <p style="color: red"> {{ $errors->first('title') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label>Content</label>
                <textarea class="ckeditor form-control" name="content">{{ $blogs->content }}</textarea>
                @if ($errors->any())
                    <p style="color: red"> {{ $errors->first('content') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" value="{{ $blogs->image }}"  class="form-control-file"><br>
                <img src="{{ $blogs->image }}" style="width: 100px; height: 100px;" alt="">
            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="category_id" class="form-control">
                    @foreach ($categories as $value)
                        <option id="option" value="{{ $value->id }}">{{ $value->name }}</option>
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
            <button type="submit" class="btn btn-sm btn-outline-primary">Update</button>
        </form>
    </div>


    <script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });

    </script>

    <script type="text/javascript">
        CKEDITOR.replace('wysiwyg-editor', {
            filebrowserUploadUrl: "{{ route('blogs.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });

    </script>
@endsection
