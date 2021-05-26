<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Age;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Toy;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function home()
    {
        $courses = Course::inRandomOrder()->limit(6)->get();
        $blogs   = Blog::inRandomOrder()->paginate(5);
        $lessons = Lesson::inRandomOrder()->limit(5)->get();
        $toys    = Toy::inRandomOrder()->limit(5)->get();
        $categories = Category::inRandomOrder()->limit(5)->get();

        return view('frontend.home', compact('courses', 'blogs', 'lessons', 'toys', 'categories'));
    }

    public function blog()
    {
        $blogs = Blog::inRandomOrder()->paginate(5);
        $lessons = Lesson::inRandomOrder()->get();

        return view('frontend.blog', compact('blogs', 'lessons'));
    }

    public function showBlog($id)
    {
        $blogs = Blog::findOrFail($id);
        $users = User::all();
        $categories = Category::find($blogs->category_id)->blog()->inRandomOrder()->limit(4)->get();
        $courses = Course::all();

        return view('frontend.showBlog', compact('blogs', 'categories', 'users', 'courses'));
    }

    public function getCategory()
    {
        $categories = Category::all();

        return view('frontend.getCategory', compact('categories'));
    }

    public function categoryLesson($id)
    {
        $categories = Category::findOrFail($id);

        return view('frontend.categoryLesson', compact('categories'));
    }

    public function showLesson($id)
    {
        $lessons = Lesson::findOrFail($id);
        $toys = Toy::find($lessons->toy_id)->lesson()->limit(1)->get();

        return view('frontend.showLesson', compact('lessons', 'toys'));
    }
}
