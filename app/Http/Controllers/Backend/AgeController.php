<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AgeRequest;
use App\Models\Age;
use Illuminate\Http\Request;

class AgeController extends Controller
{
    public function index()
    {
        $ages = Age::paginate(5);

        return view('backend.ages.list', compact('ages'));
    }

    public function create()
    {
        return view('backend.ages.create');
    }

    public function store(AgeRequest $request)
    {
        $ages = new Age();
        $ages->fill($request->all());
        $ages->save();

        return redirect()->route('ages.index')->with('message', 'Thêm tên khóa học thành công');
    }

    public function show($id)
    {
        $ages = Age::find($id);
        return view('backend.ages.detail', compact('ages'));
    }

    public function edit($id)
    {
        $ages = Age::find($id);

        return view('backend.ages.edit', compact('ages'));
    }

    public function update(AgeRequest $request, $id)
    {
        $ages = Age::find($id);
        $ages->fill($request->all());
        $ages->save();
        return redirect()->route('ages.index')->with('message', 'Cập nhập tên khóa học thành công');
    }

    public function destroy($id)
    {
        $ages = Age::find($id);
        $ages->delete();

        return redirect()->route('ages.index');
    }
}
