<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(5);

        return view('backend.categories.list', compact('categories'));
    }

    public function create()
    {
        return view('backend.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $categories = new Category();
        $categories->fill($request->all());
        $categories->save();

        return redirect()->route('categories.index')->with('message', 'Add category successfully');
    }

    public function show($id)
    {
        $categories = Category::findOrFail($id);

        return view('backend.categories.detail', compact('categories'));
    }

    public function edit($id)
    {
        $categories = Category::find($id);

        return view('backend.categories.edit', compact('categories'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $categories = Category::find($id);
        $categories->fill($request->all());
        $categories->save();

        return redirect()->route('categories.index')->with('message', 'Update category successfully');
    }

    public function destroy($id)
    {
        $categories = Category::find($id);
        $categories->delete();

        return redirect()->route('categories.index')->with('message', 'Delete category successfully');
    }
}
