<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Age;
use App\Models\Blog;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(5);

        return view('backend.blogs.list', compact('blogs'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('backend.blogs.create', compact('categories'));
    }

    public function store(BlogRequest $request)
    {
        $blogs = new Blog();
        $blogs->fill($request->all());

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileExtension = $image->getClientOriginalExtension();
            $fileName = md5(time()) . rand(0,100000) . '.' . $fileExtension;
            $uploadPath = public_path('storage/images'); // Thư mục upload
            // Bắt đầu chuyển file vào thư mục
            $image->move($uploadPath, $fileName);

            $blogs->image = $fileName;
        }

        $blogs->save();

        return redirect()->route('blogs.index')->with('message', 'Add blog successfully');
    }

    public function show(Request $request, $id)
    {
        $blogs = Blog::findOrFail($id);
        $categorys  = Category::find($blogs->category_id)->blog()->inRandomOrder()->limit(4)->get();

        return view('backend.blogs.detail', compact('blogs', 'categorys'));
    }

    public function edit($id)
    {
        $categories = Category::all();
        $blogs = Blog::find($id);
        $ages = Age::all();

        return view('backend.blogs.edit', compact('categories', 'blogs', 'ages'));
    }

    public function update(BlogRequest $request, $id)
    {
        $blogs = Blog::find($id);
        $blogs->fill($request->all());

        if ($request->hasFile('image')) {
            $currentImg = $request->file('image');

            if ($currentImg) {
                Storage::delete('/public/' . $currentImg);
            }

            $image = $request->file('image');
            $fileExtension = $image->getClientOriginalExtension();
            $fileName = md5(time()) . rand(0,100000) . '.' . $fileExtension;
            $uploadPath = public_path('storage/images'); // Thư mục upload
            // Bắt đầu chuyển file vào thư mục
            $image->move($uploadPath, $fileName);
            $blogs->image = $fileName;
        }

        $blogs->save();

        return redirect()->route('blogs.index')->with('message', 'Update blog successfully');
    }

    public function destroy($id)
    {
        $blogs = Blog::find($id);
        $blogs->delete();

        return redirect()->route('blogs.index')->with('message', 'Delete blog successfully');
    }

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload')->move(public_path('images'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName);
            $msg = 'Image successfully uploaded';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
