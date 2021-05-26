<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Frontend\UserProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [AuthController::class, 'authenticate']);
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('changePassword/{id}', [AuthController::class, 'changePassword']);

Route::group(['middleware' => ['guest']], function () {

    // blog
    Route::prefix('blogs')->group(function () {
        Route::get('', [ApiController::class, 'blog']);
        Route::get('blog/{id}', [ApiController::class, 'showBlog']);
    });

    // lessons
    Route::prefix('lessons')->group(function () {
        Route::get('', [ApiController::class, 'getLesson']);
        Route::get('showLesson/{id}', [ApiController::class, 'showLesson']);
    });

    // user
    Route::prefix('userProfile')->group(function () {
        Route::get('', [UserController::class, 'getUserProfile']);
        Route::post('create', [UserController::class, 'store']);
        Route::put('update/{id}', [UserController::class, 'updateUserProfile']);
        Route::delete('delete/{id}', [UserController::class, 'destroy']);
    });

    // danh mục
    Route::prefix('category')->group(function () {
        Route::get('', [ApiController::class, 'getCategory']);
        Route::get('categoryLesson/{id}', [ApiController::class, 'categoryLesson']);
    });
});

Route::get('user', [ApiController::class, 'showReceiptsByBlog']);

$url = action([ApiController::class, 'showReceiptsByBlog'], ['age' => 2]);

