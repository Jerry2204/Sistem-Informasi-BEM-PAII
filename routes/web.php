<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Activities\ActivityController;
use App\Http\Controllers\Activities\AdminActivityController;
use App\Http\Controllers\Admin\ForumAdminController;
use App\Http\Controllers\AnggotaDepartemenController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\BPHController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\DepartemenDescriptionController;
use App\Http\Controllers\Forum\AnswerForumsController;
use App\Http\Controllers\Forum\ForumBPHKemahasiswaan;
use App\Http\Controllers\KadepController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\Forum\ForumController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KemahasiswaanController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\ProgramKerjaController;
use App\Http\Controllers\UserController;
use App\Models\AnggotaDepartemen;
use App\Models\Pengeluaran;
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
Route::get('/register/umum', [RegistrationController::class, 'index_umum'])->name('register.umum');
Route::post('/register/umum', [RegistrationController::class, 'store_umum'])->name('register.umum');

// Admin, Kadep, BPH, and Kemahasiswaan, anggota
Route::group(['middleware' => ['auth', 'checkRole:admin,bph,kadep,kemahasiswaan,anggota']], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/account/setting', [UserController::class, 'accountSetting'])->name('account.setting');
    Route::post('/account/setting', [UserController::class, 'accountUpdate'])->name('account.setting');
});

// BPH, Kadep
Route::group(['middleware' => ['auth', 'checkRole:bph,kadep']], function(){
    Route::get('/calendar', [AdminActivityController::class, 'index'])->name('calendar');
    Route::post('/calendar/add', [AdminActivityController::class, 'store'])->name('add_calendar');
    Route::delete('/calendar/delete', [AdminActivityController::class, 'destroy'])->name('delete_calendar');
    Route::post('/calendar/update/{id}', [AdminActivityController::class, 'update'])->name('update_calendar');
});

// Kadep, BPH, anggota, and Kemahasiswaan
Route::group(['middleware' => ['auth', 'checkRole:bph,kadep,kemahasiswaan,anggota']], function(){
    Route::post('/update_foto/{user}', [UserController::class, 'changeImage'])->name('ubah_foto');
});

// Admin, Kadep and BPH kemahasiswaan
Route::group(['middleware' => ['auth', 'checkRole:admin,bph,kadep,kemahasiswaan']], function(){
    Route::get('/posts', [PostController::class, 'index'])->name('post');
    Route::post('/posts', [PostController::class, 'store'])->name('post');
    Route::get('/post/{post}/detail', [PostController::class, 'detail'])->name('post.detail');
    Route::post('/post/{post}/update', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{post}/delete', [PostController::class, 'delete'])->name('post.delete');
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
});

// Admin, Kemahasiswaan, BPH
Route::group(['middleware' => ['auth', 'checkRole:admin,kemahasiswaan,bph']], function(){
    Route::get('/about_page', [AboutController::class, 'index'])->name('about_page');
    Route::post('/about_page', [AboutController::class, 'store'])->name('about_page');
    Route::get('/about_page/{about}/detail', [AboutController::class, 'detail'])->name('about_page_detail');
    Route::post('/about_page/{about}/update', [AboutController::class, 'update'])->name('about_page_update');
    Route::delete('/about_page/{about}/delete', [AboutController::class, 'destroy'])->name('about_page.delete');
    Route::get('/sejarah', [HistoryController::class, 'index'])->name('history');
});

// Admin
Route::group(['middleware' => ['auth', 'checkRole:admin']], function(){
    Route::get('/bph', [BPHController::class, 'index'])->name('bph');
    Route::get('/program_studi', [ProgramStudiController::class, 'index'])->name('program_studi');
    Route::get('/kemahasiswaan', [KemahasiswaanController::class, 'index'])->name('kemahasiswaan');
    Route::get('/jabatan', [JabatanController::class, 'index'])->name('jabatan');
});

// BPH
Route::group(['middleware' => ['auth', 'checkRole:bph']], function() {
    Route::get('/kadep', [KadepController::class, 'index'])->name('kadep');
    Route::get('/departemen', [DepartemenController::class, 'index'])->name('departemen');
    Route::post('/departemen', [DepartemenController::class, 'store'])->name('departemen');
    Route::get('/departemen/{departemen}/detail', [DepartemenController::class, 'showDepartemen'])->name('departemen.detail');
    Route::post('/departemen/{departemen}/update', [DepartemenController::class, 'updateDepartemen'])->name('departemen.update');
    Route::delete('/departemen/{departemen}/delete', [DepartemenController::class, 'deleteDepartemen'])->name('departemen.delete');
    Route::get('/pemasukan', [PemasukanController::class, 'index'])->name('keuangan.pemasukan');
    Route::get('/pemasukan/tambah', [PemasukanController::class, 'add'])->name('pemasukan.tambah');
    Route::post('/pemasukan/tambah', [PemasukanController::class, 'store'])->name('pemasukan.tambah');
    Route::get('/keuangan/export', [PemasukanController::class, 'export'])->name('keuangan.export');
    Route::get('/pemasukan/{pemasukan}/ubah', [PemasukanController::class, 'detail'])->name('pemasukan.ubah');
    Route::post('/pemasukan/{pemasukan}/ubah', [PemasukanController::class, 'update'])->name('pemasukan.ubah');
    Route::delete('/pemasukan/{pemasukan}/delete', [PemasukanController::class, 'deletePemasukan'])->name('pemasukan.delete');
    Route::get('/pengeluaran', [PengeluaranController::class, 'index'])->name('keuangan.pengeluaran');
    Route::get('/pengeluaran/tambah', [PengeluaranController::class, 'add'])->name('pengeluaran.tambah');
    Route::post('/pengeluaran/tambah', [PengeluaranController::class, 'store'])->name('pengeluaran.tambah');
    Route::get('/pengeluaran/{pengeluaran}/ubah', [PengeluaranController::class, 'detail'])->name('pengeluaran.ubah');
    Route::post('/pengeluaran/{pengeluaran}/ubah', [PengeluaranController::class, 'update'])->name('pengeluaran.ubah');
    Route::delete('/pengeluaran/{pengeluaran}/hapus', [PengeluaranController::class, 'delete'])->name('pengeluaran.hapus');
    Route::get('/daftar_prestasi', [PrestasiController::class, 'index_admin'])->name('admin_prestasi');
    Route::post('/daftar_prestasi', [PrestasiController::class, 'store'])->name('admin_prestasi');
    Route::get('/prestasi/{prestasi}/detail', [PrestasiController::class, 'detail'])->name('prestasi_detail');
    Route::post('/prestasi/{prestasi}/update', [PrestasiController::class, 'update'])->name('prestasi_update');
    Route::delete('/prestasi/{prestasi}/delete', [PrestasiController::class, 'delete'])->name('prestasi_delete');
    Route::get('/departemen_description', [DepartemenDescriptionController::class, 'index'])->name('departemen_description');
    Route::post('/departemen_description', [DepartemenDescriptionController::class, 'store'])->name('departemen_description');
    Route::get('/departemen_description/{description}/detail', [DepartemenDescriptionController::class, 'show'])->name('departemen_description.detail');
    Route::post('/departemen_description/{description}/update', [DepartemenDescriptionController::class, 'update'])->name('departemen_description.update');
    Route::delete('/departemen_description/{description}/delete', [DepartemenDescriptionController::class, 'destroy'])->name('departemen_description.delete');
});

// Kadep
Route::group(['middleware' => ['auth', 'checkRole:kadep']], function () {
    Route::get('/anggotaDepartemen', [AnggotaDepartemenController::class, 'index'])->name('anggotaDepartemen');
    Route::get('/program_kerja/{departemen}', [ProgramKerjaController::class, 'index'])->name('program_kerja');
    Route::post('/program_kerja/{departemen}', [ProgramKerjaController::class, 'store'])->name('program_kerja');
    Route::get('/program_kerja/{program_kerja}/detail', [ProgramKerjaController::class, 'detail'])->name('program_kerja.detail');
    Route::post('/program_kerja/{program_kerja}/update', [ProgramKerjaController::class, 'update'])->name('program_kerja.update');
    Route::delete('/program_kerja/{program_kerja}/delete', [ProgramKerjaController::class, 'destroy'])->name('program_kerja.delete');
});

Route::get('/blog',  [BlogController::class, 'index'])->name('blog');

// PUBLIC
Route::get('/activity', [ActivityController::class, 'index'])->name('activity');
Route::get('/activity/data', [ActivityController::class, 'getData']);
Route::get('/about', [BlogController::class, 'about'])->name('about_us');
Route::get('/keuangan', [PemasukanController::class, 'publicView'])->name('keuangan');

Route::get('/forum', [ForumController::class, 'index'])->name('forum');
Route::get('/forums/{id}', [ForumController::class, 'detail'])->name('forum_detail');
Route::post('/forum/add', [ForumController::class, 'store'])->name('add_forum');
Route::post('/replyforum/add/{forum_id}', [AnswerForumsController::class, 'store'])->name('add_reply_forum');

Route::get('/bph', [BPHController::class, 'index'])->name('bph');
Route::get('/addBph', [BPHController::class, 'addBph'])->name('addBph');

Route::post('/comment/add/{blog_id}', [CommentController::class, 'store'])->name('add_comment_blog');
Route::get('/departemen_about/{departemen}', [DepartemenController::class, 'public'])->name('departemen.about');
Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi');

Route::get('/sejarah-kepengurusan', [HistoryController::class, 'public_index'])->name('sejarah_kepengurusan');
Route::get('/post/kategori/{kategori}', [KategoriController::class, 'blog_kategori'])->name('blog_kategori');

Route::get('/singlePost/{slug}', [PostController::class, 'singlePost'])->name('single.post');

Route::group(['middleware' => ['auth', 'checkRole:kemahasiswaan,bph,kadep,anggota,admin']], function(){
    Route::get('/forum_bph', [ForumBPHKemahasiswaan::class, 'index'])->name('forum_bph');
    Route::get('/detail_forum_bph', [ForumBPHKemahasiswaan::class, 'detail'])->name('detail_forum_bph');

    Route::get('/store/chats', [ForumBPHKemahasiswaan::class, 'detail']);

});

Route::get('/getdatachart', [PemasukanController::class, 'getMonthlyKeuanganData']);