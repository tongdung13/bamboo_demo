<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ToyRequest;
use App\Models\Toy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ToyController extends Controller
{
    public function index()
    {
        $toys = Toy::paginate(5);

        return view('backend.toys.list', compact('toys'));
    }

    public function create()
    {
        return view('backend.toys.create');
    }

    public function store(ToyRequest $request)
    {
        $toys = new Toy();
        $toys->fill($request->all());

        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $path  = $image->store('images', 'public');
            $toys->image = $path;
        }

        $toys->save();

        return redirect()->route('toys.index');
    }

    public function show($id)
    {
        $toys = Toy::find($id);
        return view('backend.toys.detail', compact('toys'));
    }

    public function edit($id)
    {
        $toys = Toy::find($id);

        return view('backend.toys.edit', compact('toys'));
    }

    public function update(ToyRequest $request, $id)
    {
        $toys = Toy::find($id);
        $toys->fill($request->all);

        if ($request->hasFile('image'))
        {
            $currentImg = $request->file('image');

            if ($currentImg)
            {
                Storage::delete('/public/' . $currentImg);
            }

            $image = $request->file('image');
            $path  = $image->store('images', 'public');
            $toys->image = $path;

        }

        $toys->save();
        return redirect()->route('toys.index');
    }

    public function destroy($id)
    {
        $toys = Toy::find($id);
        $toys->delete();

        return redirect()->route('toys.index');
    }
}
