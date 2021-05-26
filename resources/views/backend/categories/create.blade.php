@extends('layouts.app')

@section('title', 'Category')

@section('content')

    <div class="container">

        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Category</label>
                <input type="text" name="name" class="form-control">
                @if($errors->any())
                    <p style="color: red"> {{ $errors->first('name') }}</p>
                @endif
            </div>
            <button type="submit" class="btn btn-sm btn-outline-primary">Add</button>
        </form>
    </div>



@endsection
