<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LessonRequest;
use App\Models\Age;
use App\Models\Category;
use App\Models\Lesson;
use App\Models\Toy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::paginate(5);

        return view('backend.lessons.list', compact('lessons'));
    }

    public function create()
    {
        $categories = Category::all();
        $ages = Age::all();
        $toys = Toy::all();

        return view('backend.lessons.create', compact('categories', 'ages', 'toys'));
    }

    public function store(LessonRequest $request)
    {
        $lessons = new Lesson();
        $lessons->fill($request->all());

        if($request->hasFile('video')) {
            $video = $request->video;
            $filename = $video->getClientOriginalName();
            $video->storeAs('public/videos/' , $filename);
            $lessons->video = $filename;
        }

        $lessons->save();

        foreach ($request->categories as $category) {
            Category::find($category)->lessons()->attach($lessons->id);
        }

        return redirect()->route('lessons.index')->with('message', 'Add lesson successfully');
    }

    public function show(Request $request, $id)
    {
        $lessons = Lesson::findOrFail($id);
        $toys = Toy::find($lessons->toy_id)->lesson()->limit(1)->get();
        $ages = Age::find($lessons->age_id)->lesson()->get();

        return view('backend.lessons.detail', compact('lessons', 'ages', 'toys'));
    }

    public function edit($id)
    {
        $categories = Category::all();
        $lessons = Lesson::find($id);
        $ages = Age::all();
        $toys = Toy::all();

        return view('backend.lessons.edit', compact('categories', 'lessons', 'ages', 'toys'));
    }

    public function update(LessonRequest $request, $id)
    {
        $lessons = Lesson::find($id);
        $lessons->fill($request->all());

        if ($request->hasFile('video')) {
            $currentVideo = $request->video;

            if ($currentVideo) {
                Storage::delete('/public/' . $currentVideo);
            }

            $video = $request->video;
            $filename = $video->getClientOriginalName();
            $video->storeAs('public/videos/', $filename);
            $lessons->video = $filename;
        }

        $lessons->save();

        foreach ($request->categories as $category) {
            Category::find($category)->lessons()->attach($lessons->id);
        }

        return redirect()->route('lessons.index')->with('message', 'Update blog successfully');
    }

    public function destroy($id)
    {
        $lessons = Lesson::find($id);
        $lessons->delete();

        return redirect()->route('lessons.index')->with('message', 'Delete blog successfully');
    }
}

