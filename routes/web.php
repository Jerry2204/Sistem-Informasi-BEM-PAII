<?php

use App\Http\Controllers\Activities\ActivityController;
use App\Http\Controllers\Activities\AdminActivityController;
use App\Http\Controllers\Admin\ForumAdminController;
use App\Http\Controllers\AnggotaDepartemenController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\BPHController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\KadepController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KemahasiswaanController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Models\AnggotaDepartemen;
use Illuminate\Support\Facades\Route;

// All
Route::get('/', [PageController::class, 'index'])->name('home');


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
    Route::post('/posts', [PostController::class, 'store'])->name('post');
    Route::get('/post/{post}/detail', [PostController::class, 'detail'])->name('post.detail');
    Route::post('/post/{post}/update', [PostController::class, 'update'])->name('post.update');
    Route::get('/post/{post}/delete', [PostController::class, 'delete'])->name('post.delete');
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
});

// Admin
Route::group(['middleware' => ['auth', 'checkRole:admin']], function(){
    Route::get('/bph', [BPHController::class, 'index'])->name('bph');
    Route::get('/program_studi', [ProgramStudiController::class, 'index'])->name('program_studi');
    Route::get('/kemahasiswaan', [KemahasiswaanController::class, 'index'])->name('kemahasiswaan');
});

// BPH
Route::group(['middleware' => ['auth', 'checkRole:bph']], function() {
    Route::get('/kadep', [KadepController::class, 'index'])->name('kadep');
    Route::get('/departemen', [DepartemenController::class, 'index'])->name('departemen');
    Route::post('/departemen', [DepartemenController::class, 'store'])->name('departemen');
    Route::get('/departemen/{departemen}/detail', [DepartemenController::class, 'showDepartemen'])->name('departemen.detail');
    Route::post('/departemen/{departemen}/update', [DepartemenController::class, 'updateDepartemen'])->name('departemen.update');
    Route::get('/departemen/{departemen}/delete', [DepartemenController::class, 'deleteDepartemen'])->name('departemen.delete');
    Route::get('/pemasukan', [PemasukanController::class, 'index'])->name('keuangan.pemasukan');
    Route::get('/pemasukan/tambah', [PemasukanController::class, 'add'])->name('pemasukan.tambah');
    Route::post('/pemasukan/tambah', [PemasukanController::class, 'store'])->name('pemasukan.tambah');
    Route::get('/pengeluaran', [PengeluaranController::class, 'index'])->name('keuangan.pengeluaran');
    Route::get('/keuangan/export', [PemasukanController::class, 'export'])->name('keuangan.export');
    Route::get('/pemasukan/{pemasukan}/ubah', [PemasukanController::class, 'detail'])->name('pemasukan.ubah');
    Route::post('/pemasukan/{pemasukan}/ubah', [PemasukanController::class, 'update'])->name('pemasukan.ubah');
    Route::get('/pemasukan/{pemasukan}/delete', [PemasukanController::class, 'deletePemasukan'])->name('pemasukan.delete');
});

// Kadep
Route::group(['middleware' => ['auth', 'checkRole:kadep']], function () {
    Route::get('/anggotaDepartemen', [AnggotaDepartemenController::class, 'index'])->name('anggotaDepartemen');
});

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

Route::get('/bph', [BPHController::class, 'index'])->name('bph');
Route::get('/addBph', [BPHController::class, 'addBph'])->name('addBph');

Route::get('/{slug}', [PostController::class, 'singlePost'])->name('single.post');
