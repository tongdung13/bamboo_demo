<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserProfile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function userProfile($id)
    {
        $users = UserProfile::findOrFail($id);

        return response()->json($users);
    }

    public function updateUserProfile(Request $request, $id)
    {
        $userProfile = UserProfile::find($id);
        $userProfile->fill($request->all());
        // upload ảnh
        if ($request->hasFile('image')) {
            $currenImg = $request->file('image');

            if ($currenImg) {
                Storage::delete('/public/' . $currenImg);
            }

            $image = $request->file('image');
            $fileExtension = $image->getClientOriginalExtension();
            $fileName = md5(time()) . rand(0, 100000) . '.' . $fileExtension;
            $uploadPath = public_path('storage/images'); // Thư mục upload
            // Bắt đầu chuyển file vào thư mục
            $image->move($uploadPath, $fileName);
            $userProfile->image = $fileName;
        }
        // tính tuổi trẻ
        if ($userProfile->late != null) {
            $week = 40;
            $num = $week - $userProfile->realyAge;
            $sum = $num * 7;
            $dt = Carbon::now('Asia/Ho_Chi_Minh');
            $userProfile->date = $dt->toDateString();
            $first_date = strtotime($userProfile->dob);
            $second_date = strtotime($userProfile->date);
            $datediff = abs($first_date - $second_date);
            $days = ($datediff / (60 * 60 * 24)) - $sum;
            $month = $days / 30;
            $userProfile->realAge = round($month);
        } else {
            $dt = Carbon::now('Asia/Ho_Chi_Minh');
            $userProfile->date = $dt->toDateString();
            $first_date = strtotime($userProfile->dob);
            $second_date = strtotime($userProfile->date);
            $datediff = abs($first_date - $second_date);
            $days = $datediff / (60 * 60 * 24);
            $month = $days / 30;
            $userProfile->realAge = round($month);
        }

        $userProfile->isEarly = '0';

        $userProfile->save();

        return response()->json([
            'status' => 1,
            'code' => 200,
            'message' => 'Cập nhập thành công',
            'data' => $userProfile
        ], 200);
    }

    public function store(Request $request)
    {
        $userProfile = new UserProfile();
        $userProfile->fill($request->all());
        // upload ảnh
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileExtension = $image->getClientOriginalExtension();
            $fileName = md5(time()) . rand(0, 100000) . '.' . $fileExtension;
            $uploadPath = public_path('storage/images'); // Thư mục upload
            // Bắt đầu chuyển file vào thư mục
            $image->move($uploadPath, $fileName);
            $userProfile->image = $fileName;
        }
        // add user
        if ($users = Auth::user()) {
            $userProfile->user_id = $users->id;
        }
        // tính tuổi trẻ
        if ($userProfile->late != null) {
            $week = 40;
            $num = $week - $userProfile->earlyAge;
            $sum = $num * 7;
            $dt = Carbon::now('Asia/Ho_Chi_Minh');
            $userProfile->date = $dt->toDateString();
            $first_date = strtotime($userProfile->dob);
            $second_date = strtotime($userProfile->date);
            $datediff = abs($first_date - $second_date);
            $days = ($datediff / (60 * 60 * 24)) - $sum;
            $month = $days / 30;
            $userProfile->realAge = round($month);
        } else {
            $dt = Carbon::now('Asia/Ho_Chi_Minh');
            $userProfile->date = $dt->toDateString();
            $first_date = strtotime($userProfile->dob);
            $second_date = strtotime($userProfile->date);
            $datediff = abs($first_date - $second_date);
            $days = $datediff / (60 * 60 * 24);
            $month = $days / 30;
            $userProfile->realAge = round($month);
        }

        $userProfile->isEarly = '0';

        $userProfile->save();

        return response()->json([
            'status' => 1,
            'code' => 200,
            'message' => 'Thêm trẻ thành công',
            'data' => $userProfile
        ], 200);
    }

    public function getUserProfile()
    {
        $user = Auth::user();
        $userProfile = JWTAuth::toUser()->user_profiles()->get();

        return response()->json(
            [
                'status' => 1,
                'code' => 200,
                'message' => 'Danh sách trẻ',
                'data' => [
                    'user' => $user,
                    'baby' => $userProfile
                ]
            ],
            200
        );
    }

    public function destroy($id)
    {
        $userProfile = UserProfile::findOrFail($id);
        $userProfile->delete();

        return response()->json([
            'status' => 1,
            'code' => 200,
            'message' => 'Xóa thành công',
            'data' => $userProfile->id
        ], 200);
    }
}
