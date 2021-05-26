@extends('layouts.app')

@section('title', 'Lesson Create')

@section('content')

    <div class="container">
        <form action="{{ route('days.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
                @if ($errors->any())
                    <p style="color: red"> {{ $errors->first('name') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label>Lesson</label>
                <select name="lessons[]" multiple size="3" class="form-control" style="overflow-y: auto;">
                    @foreach ($lessons as $lesson)
                        <option value="{{ $lesson->id }}">{{ $lesson->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-sm btn-outline-primary">Add</button>
        </form>
    </div>
@endsection
