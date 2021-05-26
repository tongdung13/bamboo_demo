@extends('layouts.app')

@section('title', 'Lesson Create')

@section('content')

    <div class="container">
        <form action="{{ route('days.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="{{ $day->name }}" class="form-control">
                @if ($errors->any())
                    <p style="color: red"> {{ $errors->first('name') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="lesson_id[]" multiple size="3" class="form-control" style="overflow-y: auto;">
                    @foreach ($lessons as $lesson)
                        <option value="{{ $lesson->id }}">{{ $lesson->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-sm btn-outline-primary">Update</button>
        </form>
    </div>
@endsection
