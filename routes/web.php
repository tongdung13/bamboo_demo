<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Backend\AgeController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\Daycontroller;
use App\Http\Controllers\Backend\LessonController;
use App\Http\Controllers\Backend\ToyController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\UserProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// home
Route::get('/', [FrontendController::class, 'home'])->name('frontend.home');
// backend
Route::middleware(
    'AuthUser',
    'Cors'
)->group(function () {
    // crud category
    Route::prefix('categories')->group(function () {
        Route::get('', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('show/{id}', [CategoryController::class, 'show'])->name('categories.show');
        Route::get('create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('create', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::post('edit/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::get('destroy/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    });
    // crud blog
    Route::prefix('blogs')->group(function () {
        Route::get('', [BlogController::class, 'index'])->name('blogs.index');
        Route::get('show/{id}', [BlogController::class, 'show'])->name('blogs.show');
        Route::get('create', [BlogController::class, 'create'])->name('blogs.create');
        Route::post('caeate', [BlogController::class, 'store'])->name('blogs.store');
        Route::get('edit/{id}', [BlogController::class, 'edit'])->name('blogs.edit');
        Route::post('edit/{id}', [BlogController::class, 'update'])->name('blogs.update');
        Route::get('destroy/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');
        Route::post('ckeditor', [BlogController::class, 'upload'])->name('blogs.upload');
    });
    // crud toy
    Route::prefix('toys')->group(function () {
        Route::get('', [ToyController::class, 'index'])->name('toys.index');
        Route::get('show/{id}', [ToyController::class, 'show'])->name('toys.show');
        Route::get('create', [ToyController::class, 'create'])->name('toys.create');
        Route::post('caeate', [ToyController::class, 'store'])->name('toys.store');
        Route::get('edit/{id}', [ToyController::class, 'edit'])->name('toys.edit');
        Route::post('edit/{id}', [ToyController::class, 'update'])->name('toys.update');
        Route::get('destroy/{id}', [ToyController::class, 'destroy'])->name('toys.destroy');
    });
    // crud age
    Route::prefix('ages')->group(function () {
        Route::get('', [AgeController::class, 'index'])->name('ages.index');
        Route::get('show/{id}', [AgeController::class, 'show'])->name('ages.show');
        Route::get('create', [AgeController::class, 'create'])->name('ages.create');
        Route::post('caeate', [AgeController::class, 'store'])->name('ages.store');
        Route::get('edit/{id}', [AgeController::class, 'edit'])->name('ages.edit');
        Route::post('edit/{id}', [AgeController::class, 'update'])->name('ages.update');
        Route::get('destroy/{id}', [AgeController::class, 'destroy'])->name('ages.destroy');
    });
    // crud course
    Route::prefix('courses')->group(function () {
        Route::get('', [CourseController::class, 'index'])->name('courses.index');
        Route::get('show/{id}', [CourseController::class, 'show'])->name('courses.show');
        Route::get('create', [CourseController::class, 'create'])->name('courses.create');
        Route::post('caeate', [CourseController::class, 'store'])->name('courses.store');
        Route::get('edit/{id}', [CourseController::class, 'edit'])->name('courses.edit');
        Route::post('edit/{id}', [CourseController::class, 'update'])->name('courses.update');
        Route::get('destroy/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');
    });
    // crud lesson
    Route::prefix('lessons')->group(function () {
        Route::get('', [LessonController::class, 'index'])->name('lessons.index');
        Route::get('show/{id}', [LessonController::class, 'show'])->name('lessons.show');
        Route::get('create', [LessonController::class, 'create'])->name('lessons.create');
        Route::post('caeate', [LessonController::class, 'store'])->name('lessons.store');
        Route::get('edit/{id}', [LessonController::class, 'edit'])->name('lessons.edit');
        Route::post('edit/{id}', [LessonController::class, 'update'])->name('lessons.update');
        Route::get('destroy/{id}', [LessonController::class, 'destroy'])->name('lessons.destroy');
    });
    // get update user
    Route::prefix('users')->group(function () {
        Route::get('user-profile/{id}', [UserController::class, 'edit'])->name('users.user-profile');
        Route::post('update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::get('index', [UserController::class, 'index'])->name('users.index');
        Route::get('show/{id}', [UserController::class, 'show'])->name('users.detail');
    });
    // day
    Route::prefix('days')->group(function () {
        Route::get('', [Daycontroller::class, 'index'])->name('days.index');
        Route::get('show/{id}', [Daycontroller::class, 'show'])->name('days.show');
        Route::get('create', [Daycontroller::class, 'create'])->name('days.create');
        Route::post('caeate', [Daycontroller::class, 'store'])->name('days.store');
        Route::get('edit/{id}', [Daycontroller::class, 'edit'])->name('days.edit');
        Route::post('edit/{id}', [Daycontroller::class, 'update'])->name('days.update');
        Route::get('destroy/{id}', [Daycontroller::class, 'destroy'])->name('days.destroy');
    });
});

// frontend
// logout
Route::get('logout', [UserController::class, 'logout'])->name('logout');
// login
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('authenticate', [UserController::class, 'authenticate'])->name('authenticate');
// register
Route::get('create', [UserController::class, 'create'])->name('create');
Route::post('register', [UserController::class, 'register'])->name('register');
// change password
Route::get('newPassword/{id}', [UserController::class, 'newPassword'])->name('newPassword');
Route::post('/changePassword/{id}', [UserController::class, 'changePassword'])->name('changePassword');
// blog public
Route::get('blog', [FrontendController::class, 'blog'])->name('blog');
Route::get('showBlog/{id}', [FrontendController::class, 'showBlog'])->name('showBlog');


Route::middleware('AuthUser')->group(function () {
    // user profile
    Route::get('showUserProfile/{id}', [UserProfileController::class, 'showUserProfile'])->name('showUserProfile');
    Route::get('createProfile', [UserProfileController::class, 'create'])->name('createProfile');
    Route::post('storeProfile', [UserProfileController::class, 'store'])->name('storeProfile');
    Route::get('editProfile/{id}', [UserProfileController::class, 'edit'])->name('editProfile');
    Route::post('updateProfile/{id}', [UserProfileController::class, 'updateProfile'])->name('updateProfile');
    Route::get('destroy/{id}', [UserProfileController::class, 'destroy'])->name('destroy');
    // category
    Route::get('category', [FrontendController::class, 'getCategory'])->name('getCategory');
    Route::get('categoryLesson/{id}', [FrontendController::class, 'categoryLesson'])->name('categoryLesson');
    // lesson
    Route::get('showLesson/{id}', [FrontendController::class, 'showLesson'])->name('showLesson');
    Route::get('blogUser/{id}', [FrontendController::class, 'blogUser'])->name('blogUser');
});

Route::get('user', [ApiController::class, 'showReceiptsByBlog'])->name('user');
