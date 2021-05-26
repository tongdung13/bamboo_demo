<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('backend.logins.list', compact('users'));
    }

    public function create()
    {
        return view('backend.logins.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'userName' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);


        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->level = "User";
        $user->save();

        return redirect()->route('login')->with('message', 'Đăng ký thành công');
    }

    public function login()
    {
        return view('backend.logins.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = [
            'userName' => $request->userName,
            'password' => $request->password,
        ];
        if (Auth::attempt($credentials)) {
            Session::regenerate();
            Session::push('login', true);
            return redirect()->route('lessons.index')->with('message', 'Bạn đã đăng nhập thành công');
        } else {
            return redirect()->route('login')->with('error', 'Bạn đăng nhập thất bại');
        }
        return back()->withErrors([
            'userName' => 'The provided credentials do not match our records',
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('backend.logins.user-profile', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->all());
        $user->save();

        return redirect()->route('users.index');
    }

    public function show($id)
    {
        $users = User::findOrFail($id);

        return view('backend.logins.detail', compact('users'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('frontend.home')->with('message', 'Bạn đã đăng xuất thành công');
    }

    public function newPassword($id)
    {
        $user = User::findOrfail($id);

        return view('backend.logins.changepassword', compact('user'));
    }

    public function changePassword(Request $request, $id)
    {
        $request->validate([
          'current_password' => 'required',
          'password' => 'required|string|min:6|confirmed',
          'password_confirmation' => 'required',
        ]);

        $user = User::findOrFail($id);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Mật khẩu hiện tại không khớp!');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')->with('message', 'Bạn đã đổi mật khẩu thành công');
    }

}
