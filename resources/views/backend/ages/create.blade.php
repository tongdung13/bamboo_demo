@extends('layouts.app')

@section('title', 'Blog Create')

@section('content')

    <div class="container">


        <form action="{{ route('ages.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
                @if ($errors->any())
                    <p style="color: red"> {{ $errors->first('name') }}</p>
                @endif
            </div>

            <button type="submit" class="btn btn-sm btn-outline-primary">Add</button>
        </form>
    </div>
@endsection
