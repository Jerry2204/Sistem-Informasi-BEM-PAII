<?php

use App\Http\Controllers\Activities\ActivityController;
use App\Http\Controllers\Activities\AdminActivityController;
use App\Http\Controllers\Admin\ForumAdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\BPHController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForumController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('public.index');
})->name('home');

Route::get('/blog_detail', function () {
    return view('public.blog.blog_detail');
})->name('blog_detail');


Route::get('/blog',  [BlogController::class, 'index'])->name('blog');

// PUBLIC
Route::get('/activity', [ActivityController::class, 'index'])->name('activity');
Route::get('/activity/data', [ActivityController::class, 'getData']);
Route::get('/about', [BlogController::class, 'about'])->name('about_us');


Route::get('/calendar', [AdminActivityController::class, 'index'])->name('calendar');
Route::post('/calendar/add', [AdminActivityController::class, 'store'])->name('add_calendar');
Route::delete('/calendar/delete', [AdminActivityController::class, 'destroy'])->name('delete_calendar');
Route::post('/calendar/update/{id}', [AdminActivityController::class, 'update'])->name('update_calendar');


Route::get('/forums', [ForumAdminController::class, 'index'])->name('forums-admin');


Route::get('/forum', [ForumController::class, 'index'])->name('forum');
Route::get('/forums/{id}', [ForumController::class, 'detail']);

Route::get('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/register', [RegistrationController::class, 'index'])->name('register');
Route::post('/register', [RegistrationController::class, 'store'])->name('register');

Route::get('/bph', [BPHController::class, 'index'])->name('bph');
Route::get('/addBph', [BPHController::class, 'addBph'])->name('addBph');

