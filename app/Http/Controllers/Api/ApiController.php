<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Age;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Lesson;
use App\Models\Toy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{


    public function blog(Request $request)
    {
        $blogs = Blog::select('id', 'title', 'image', 'age', 'category_id')
            ->orderBy('id', 'desc')->get();

        $total = DB::table('blogs')->count();

        $current = 1;

        $page = intval($request['page']);

        if ($page != null) {
            $current = $page;
        }
        $collection = collect($blogs);

        $blogs = $collection->forPage($current, 5);

        $blogs->all();

        $chuck = $collection->chunk(5);

        $total_page = $chuck->count();

        return response()->json([
            'status' => 1,
            'code' => 200,
            'message' => 'Lấy bài viết thành công',
            'data' => [
                'current_page' => $current,
                'total' => $total,
                'total_page' => $total_page,
                'blog' => $blogs,
            ]
        ], 200);
    }

    public function showBlog($id)
    {
        $blogs = Blog::findOrFail($id);
        $ages = Age::find($blogs->category_id)->blog()->inRandomOrder()->limit(4)->get();

        return response()->json([
            'status' => 1,
            'code' => 200,
            'message' => 'Lấy chi tiết bài viết thành công',
            'data' => [
                'blog' => $blogs,
                'bài viết theo độ tuổi' => $ages
            ]
        ], 200);
    }

    public function getCategory()
    {
        $categories = Category::all();

        return response()->json([
            'status' => 1,
            'code' => 200,
            'message' => 'Lấy danh mục thành công',
            'data' => $categories,
        ], 200);
    }

    public function categoryLesson($id)
    {
        $categories = Category::findOrFail($id);
        foreach ($categories->lessons as $lesson) {
        }

        return response()->json([
            'status' => 1,
            'code' => 200,
            'message' => 'Lấy bài học thuộc danh mục thành công',
            'data' => $categories
        ], 200);
    }

    public function showLesson($id)
    {
        $lessons = Lesson::findOrFail($id);
        $toys = Toy::find($lessons->toy_id)->lesson()->limit(1)->get();

        return response()->json([
            'status' => 1,
            'code' => 200,
            'message' => 'Chi tiết bài học thành công',
            'data' => [
                'lesson' => $lessons,
                'toy' => $toys,
            ]
        ], 200);
    }

    public function getLesson()
    {
        $lessons = Lesson::all();

        return response()->json([
            'status' => 1,
            'code' => 200,
            'message' => 'Lấy danh sách bài học thành công',
            'data' => $lessons
        ], 200);
    }

    public function showReceiptsByBlog(Request $request)
    {

        $id_arr = explode(',', $request['category_id']);

        if (!empty($request['category_id'])) {

            $list_arr = [];
            $list = [];
            foreach ($id_arr as $key => $value) {

                $data = Category::find($id_arr[$key]);

                if ($data) {
                    if (count(array($data->showReceiptsByBlog)) > 0) {
                        array_push($list_arr, $data->blog()->paginate(20));
                    }
                }
            }

            if (count(array($list_arr)) > 0) {

                for ($i = 0; $i < count($list_arr); $i++) {
                    foreach ($list_arr[$i] as $key => $value) {
                        array_push($list, (object)[
                            'id' => $value->id,
                            'created' => $value->created_at,
                            'title' => $value->title,
                            'image' => $value->image,
                            'content' => $value->content,
                            'publish' => $value->publish,
                            'blog' => $value->category_id,
                            'age' => $value->age,
                        ]);
                    }
                }

                $dataList = (object)array(
                    'data' => $list,
                );
                return response()->json($dataList);
            }
        }
    }
}
