<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\Lesson;
use Illuminate\Http\Request;

class Daycontroller extends Controller
{
    public function index()
    {
        $days = Day::all();

        return view('backend.days.list', compact('days'));
    }

    public function create()
    {
        $lessons = Lesson::all();
        return view('backend.days.create', compact('lessons'));
    }

    public function store(Request $request)
    {
        $days = new Day();
        $days->fill($request->all());
        $days->save();

        foreach ($request->lessons as $lesson) {
            Lesson::find($lesson)->days()->attach($days->id);
        }


        return redirect()->route('days.index')->with('message', 'Thêm dữ liệu thành công');
    }

    public function edit($id)
    {
        $day = Day::findOrFail($id);

        return view('backend.days.edit', compact('day'));
    }

    public function update(Request $request, $id)
    {
        $day = Day::findOrFail($id);
        $day->fill($request->all());
        $day->save();

        foreach ($request->lessons as $lesson) {
            Lesson::find($lesson)->days()->attach($day->id);
        }

        return redirect()->route('days.index');
    }

    public function destroy($id)
    {
        $day = Day::findOrFail($id);
        $day->delete();

        return redirect()->route('days.index');
    }

    public function show($id)
    {
        $days = Day::findOrFail($id);

        return view('backend.days.detail', compact('days'));
    }
}
