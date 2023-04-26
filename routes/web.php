<?php


use App\Models\Category;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\CekAkunController;
use App\Http\Controllers\DaftarAkunPasienController;
use App\Http\Controllers\ListObatController;
use App\Http\Controllers\ProfileEditController;
use App\Http\Controllers\TambahObatController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/ 

Route::redirect('/', '/posts');

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        'active' => 'about',
        "name" => "Roro Jonggrang",
        "About" => "Dongeng Rakyat Indonesia",
        "image" => "roro.jpg"
    ]);
});

Route::get('/posts', function(){
    return view('posts', [
        'active' => 'posts',
        "title" => "Post"
    ]);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function() {
    return view('categories', [
        'title' => 'Kategori',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest'); //user yang belum login dapat akses
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

Route::resource('dashboard/profile', ProfileEditController::class)->middleware('auth');


//admin
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('admin');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('admin');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

Route::get('/dashboard/verifikasi', [CekAkunController::class, 'index'])->middleware('admin');

Route::put('/dashboard/verifikasi/{user}', [CekAkunController::class, 'update'])->name('verifikasi.update');

Route::get('/dashboard/daftarpasien', [DaftarAkunPasienController::class, 'index'])->middleware('admin');

Route::post('/dashboard/daftarpasien', [DaftarAkunPasienController::class, 'store']);

//administrasi


//dokter
Route::get('/dashboard/listobat', [ListObatController::class, 'index'])->middleware('dokter');;


//farmasi
Route::resource('/dashboard/tambahobat', TambahObatController::class)->middleware('farmasi');




