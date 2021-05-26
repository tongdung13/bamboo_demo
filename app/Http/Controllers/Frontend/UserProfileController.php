<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserProfileRequest;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class UserProfileController extends Controller
{
    public function showUserProfile($id)
    {
        $users = User::findOrFail($id);

        return view('frontend.showUserProfile', compact('users'));
    }

    public function create()
    {
        return view('frontend.createProfile');
    }

    public function store(UserProfileRequest $request)
    {
        $userProfile = new UserProfile();
        $userProfile->fill($request->all());

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileExtension = $image->getClientOriginalExtension();
            $fileName = md5(time()) . rand(0,100000) . '.' . $fileExtension;
            $uploadPath = public_path('storage/images'); // Thư mục upload
            // Bắt đầu chuyển file vào thư mục
            $image->move($uploadPath, $fileName);
            $userProfile->image = $fileName;
        }

        if ($users = Auth::user()){
            $userProfile->user_id = $users->id;
        }

        if ($userProfile->late != null) {
            $week = 40;
            $num = $week - $userProfile->realAge;
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

        return redirect()->route('showUserProfile', $users->id);
    }

    public function edit($id)
    {
        $userProfile = UserProfile::findOrFail($id);

        return view('frontend.editProfile', compact('userProfile'));
    }

    public function updateProfile(UserProfileRequest $request, $id)
    {
        $userProfile = UserProfile::findOrFail($id);
        $userProfile->fill($request->all());

        if ($request->hasFile('image')) {
            $currenImg = $request->file('image');

            if ($currenImg) {
                Storage::delete('/public/' . $currenImg);
            }

            $image = $request->file('image');
            $fileExtension = $image->getClientOriginalExtension();
            $fileName = md5(time()) . rand(0,100000) . '.' . $fileExtension;
            $uploadPath = public_path('storage/images'); // Thư mục upload
            // Bắt đầu chuyển file vào thư mục
            $image->move($uploadPath, $fileName);
            $userProfile->image = $fileName;
        }

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
        $user =  Auth::user();
        return redirect()->route('showUserProfile', $user->id);
    }

    public function destroy($id)
    {
        $userProfile = UserProfile::findOrFail($id);
        $userProfile->delete();

        $user =  Auth::user();
        return redirect()->route('showUserProfile', $user->id);

    }
}
