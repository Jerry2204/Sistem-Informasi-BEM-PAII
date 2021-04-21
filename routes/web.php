<?php

use App\Http\Controllers\Activities\ActivityController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\BPHController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\KadepController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProgramStudiController;
use Illuminate\Support\Facades\Route;

// All
Route::get('/', function () {
    return view('public.index');
})->name('home');


Route::get('/blog_detail', function () {
    return view('public.blog.blog_detail');
})->name('blog_detail');

Route::get('/blog',  [BlogController::class, 'index'])->name('blog');
Route::get('/activity', [ActivityController::class, 'index'])->name('activity');
Route::get('/logout', [LogoutController::class, 'store'])->name('logout');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login');

Route::get('/register', [RegistrationController::class, 'index'])->name('register');
Route::post('/register', [RegistrationController::class, 'store'])->name('register');

// Admin, Kadep and BPH
Route::group(['middleware' => ['auth', 'checkRole:admin,bph,kadep']], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/posts', [PostController::class, 'index'])->name('post');
});

// Admin
Route::group(['middleware' => ['auth', 'checkRole:admin']], function(){
    Route::get('/bph', [BPHController::class, 'index'])->name('bph');
    Route::get('/program_studi', [ProgramStudiController::class, 'index'])->name('program_studi');
});

// BPH
Route::group(['middleware' => ['auth', 'checkRole:bph']], function() {
    Route::get('/kadep', [KadepController::class, 'index'])->name('kadep');
    Route::get('/departemen', [DepartemenController::class, 'index'])->name('departemen');
    Route::post('/departemen', [DepartemenController::class, 'store'])->name('departemen');
    Route::get('/departemen/{departemen}/detail', [DepartemenController::class, 'showDepartemen'])->name('departemen.detail');
    Route::post('/departemen/{departemen}/update', [DepartemenController::class, 'updateDepartemen'])->name('departemen.update');
    Route::get('/departemen/{departemen}/delete', [DepartemenController::class, 'deleteDepartemen'])->name('departemen.delete');
});

Route::get('/{slug}', [PostController::class, 'singlePost'])->name('single.post');

