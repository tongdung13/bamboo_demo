@extends('layouts.app')

@section('title', 'Blog Create')

@section('content')

    <div class="container">


        <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control">
                @if ($errors->any())
                    <p style="color: red"> {{ $errors->first('title') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label>Content</label>
                <textarea class="ckeditor form-control" name="content"></textarea>
                @if ($errors->any())
                    <p style="color: red"> {{ $errors->first('content') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control-file">
                @if ($errors->any())
                    <p style="color: red"> {{ $errors->first('image') }}</p>
                @endif
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
                <input type="number" name="age" id="">
            </div>
            <button type="submit" class="btn btn-sm btn-outline-primary">Add</button>
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
