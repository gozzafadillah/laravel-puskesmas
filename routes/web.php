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
use App\Http\Controllers\TambahObatCategoryController;
use App\Http\Controllers\TambahObatController;
use App\Models\ObatCategory;
use Illuminate\Http\Request;

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

Route::get('/posts', function () {
    return view('posts', [
        'active' => 'posts',
        "title" => "Post"
    ]);
});

Route::get("/search/post", [PostController::class, 'search'])->name('searchPost');

Route::get('/posts', [PostController::class, 'index']);
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
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

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::resource('dashboard/profile', ProfileEditController::class)->middleware('auth');


//admin
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('admin');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('admin');

Route::resource('/dashboard/post/categories', AdminCategoryController::class)->except('show')->middleware('admin');

Route::get('/dashboard/verifikasi', [CekAkunController::class, 'index'])->middleware('admin');

Route::put('/dashboard/verifikasi/{user}', [CekAkunController::class, 'update'])->name('verifikasi.update');

// ===> users feature admin
Route::get('/dashboard/daftarpasien', [DaftarAkunPasienController::class, 'index'])->middleware('admin');
Route::get("/search/user", [DaftarAkunPasienController::class, 'search'])->name('listUser')->middleware('admin');
Route::get("/dashboard/daftarpasien/create", [DaftarAkunPasienController::class, 'create'])->middleware('admin');
Route::post('/dashboard/daftarpasien', [DaftarAkunPasienController::class, 'store'])->middleware('admin');
Route::get('/dashboard/daftarpasien/{user:nik}', [DaftarAkunPasienController::class, 'showUser'])->middleware('admin');

//administrasi


//dokter
Route::get('/dashboard/listobat', [ListObatController::class, 'index'])->middleware('dokter');;


//farmasi
// add obat
Route::resource('/dashboard/tambahobat', TambahObatController::class)->middleware('farmasi');
// add category
Route::get("/dashboard/tambahobatcategory", [TambahObatCategoryController::class, 'index'])->middleware('farmasi');
Route::get('/dashboard/tambahobatcategory/create', [TambahObatCategoryController::class, 'create'])->middleware('farmasi');
Route::post('/dashboard/tambahobatcategory', [TambahObatCategoryController::class, 'store'])->middleware('farmasi');
Route::get('/dashboard/tambahobatcategory/edit/{obatCategory}', [TambahObatCategoryController::class, 'edit'])->middleware('farmasi');
Route::put('/dashboard/tambahobatcategory/edit/{obatCategory}', [TambahObatCategoryController::class, 'update'])->middleware('farmasi');
Route::delete('/dashboard/tambahobatcategory/delete/{obatCategory}', [TambahObatCategoryController::class, 'destroy'])->middleware('farmasi');
Route::get('/search/categoryobat', function (Request $request) {
    $output = "";
    $query = $request->input('query');
    $results = ObatCategory::where('name', 'like', '%' . $query . '%')->latest()->get();
    $output = '';
    foreach ($results as $key => $result) {
        $output .= '
        <tr>
            <td>' . ($key + 1) . '</td>
            <td>' . $result->name . '</td>
            <td>' . $result->slug . '</td>
            <td>
                <img style="width: 12rem" src="' . asset('storage/' . $result->image) . '" alt="...">
            </td>
            <td>
            <div class="d-flex">
            <a class="badge bg-primary border-0" href="/dashboard/tambahacategoryobat/edit/' . $result->id . '"><span data-feather="edit"></span></a> 
            <a href="#" class="btn btn-danger btn-sm" onclick="if(confirm("Are you sure you want to delete this data?")) { deleteData({{ ' . $result->id . ' }}, {{' . ($key + 1) . '}}); }"><span data-feather="trash"></span></a>
        </div>
            </td>
        </tr>';
    }
    return response($output);
})->name('search')->middleware('farmasi');
