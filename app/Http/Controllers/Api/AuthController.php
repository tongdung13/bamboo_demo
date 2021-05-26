<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('userName', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'status' => 2,
                    'code' => 400,
                    'error' => 'Đăng nhập thất bại'
                ], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['message' => 'could_not_create_token'], 500);
        }

        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $expries_in = $dt->addDays(15);

        return response()->json(
            [
                'status' => 1,
                'code' => 200,
                'message' => 'Đăng nhập thành công',
                'data' => [
                    'token' => $token,
                    'expires_in' => $expries_in,
                    'user' => Auth::user(),
                ]
            ],
            200
        );
    }

    public function register(Request $request)
    {
        $request->validate([
            'userName' => 'required|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);


        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->level = "User";
        $user->save();

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'status' => 1,
            'code' => 200,
            'message' => 'Đăng ký thành công',
            'data' => [
                'token' => $token,
                'user' => $user,
            ]
        ], 201);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 1,
            'code' => 200,
            'message' => 'User logged out',
            'data' => []
        ], 200);
    }

    public function getAuthenticatedUser()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getCode());
        } catch (TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getCode());
        } catch (JWTException $e) {
            return response()->json(['token_absent'], $e->getCode());
        }

        return response()->json(compact('user'));
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
            return response()->json(['error' => 'Mật khẩu hiện tại không khớp!'], 400);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'status' => 1,
            'code' => 200,
            'message' => 'Đổi mật khẩu thành công',
            'data' => $user
        ], 200);
    }
}
