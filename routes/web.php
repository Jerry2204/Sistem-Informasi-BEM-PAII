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
use App\Http\Controllers\ProgramStudiController;
use Illuminate\Support\Facades\Route;

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


Route::group(['middleware' => ['auth', 'checkRole:admin,bph,kadep']], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::group(['middleware' => ['auth', 'checkRole:admin']], function(){
    Route::get('/bph', [BPHController::class, 'index'])->name('bph');
    Route::get('/program_studi', [ProgramStudiController::class, 'index'])->name('program_studi');
});

Route::group(['middleware' => ['auth', 'checkRole:bph']], function() {
    Route::get('/kadep', [KadepController::class, 'index'])->name('kadep');
    Route::post('/kadep', [KadepController::class, 'store'])->name('kadep');
    Route::get('/departemen', [DepartemenController::class, 'index'])->name('departemen');
    Route::post('/departemen', [DepartemenController::class, 'store'])->name('departemen');
});


