<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Age;
use App\Models\Category;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(5);

        return view('backend.courses.list', compact('courses'));
        return response()->json($courses);
    }

    public function create()
    {
        $ages    = Age::all();
        $categories = Category::all();

        return view('backend.courses.create', compact('ages', 'categories'));
    }

    public function store(CourseRequest $request)
    {
        $courses = new Course();
        $courses->fill($request->all());

        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $path  = $image->store('images', 'public');
            $courses->image = $path;
        }
        $courses->save();

        foreach ($request->categories as $category) {
            Category::find($category)->courses()->attach($courses->id);
        }

        return redirect()->route('courses.index');
        // return response()->json($courses);
    }

    public function show($id)
    {
        $courses = Course::findOrFail($id);
        $ages    = Age::all();
        $categories = Course::find($courses->id)->categories()->get();
        $lessons = Lesson::find($id);

        return view('backend.courses.detail', compact('courses', 'ages', 'categories', 'lessons'));
    }

    public function edit($id)
    {
        $courses = Course::find($id);
        $ages    = Age::all();
        $categories = Category::all();


        return view('backend.courses.edit', compact('ages', 'courses', 'categories'));
    }

    public function update(CourseRequest $request, $id)
    {
        $courses = Course::find($id);
        $courses->fill($request->all());

        if ($request->hasFile('image'))
        {
            $currentImage = $request->file('image');

            if($currentImage)
            {
                Storage::delete('/public/' . $currentImage);
            }
            $image = $request->file('image');
            $path  = $image->store('images', 'public');
            $courses->image = $path;

        }
        $courses->save();

        foreach ($request->categories as $category) {
            Category::find($category)->courses()->attach($courses->id);
        }



        return redirect()->route('courses.index');
    }

    public function destroy($id)
    {
        $courses = Course::find($id);
        $courses->delete();

        return redirect()->route('courses.index');
        // return response()->json($courses);
    }
}
