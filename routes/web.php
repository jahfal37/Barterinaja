<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\ABOUTUSController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ReportController;


// Route untuk Login    
Route::get('/', [ItemController::class, 'index'])->name('index');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('login.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk Sign Up
Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'handleSignup'])->name('signup.submit');

Route::middleware(['auth'])->group(function () {
    Route::get('/edit-akun', [UserController::class, 'edit'])->name('editAkun');
    Route::post('/update-akun', [UserController::class, 'update'])->name('updateAkun');
});

Route::get('/faq', [FAQController::class, 'index'])->name('faq');
Route::get('/aboutus', [ABOUTUSController::class, 'index'])->name('aboutus');
Route::get('/maps', [ItemController::class, 'GetItems'])->name('maps');
Route::get('/maps/view', [ItemController::class, 'maps'])->name('maps.view');
Route::get('/item-page', [PageController::class, 'showItemPage']);
//route item search
Route::get('/search', [ItemController::class, 'search'])->name('item.search');

// Menampilkan halaman tambah/edit barang
Route::get('/akun', [AkunController::class, 'account'])->name('account');

Route::get('/item/create', function () {
    return view('/item/create'); // Ganti dengan nama view form Anda
})->name('itemcreate');


// Route untuk menyimpan data barang
Route::post('/save-item', [ItemController::class, 'store'])->name('save.item');
Route::get('/item/{product_name}', [ItemController::class, 'show'])->name('item.show');
Route::get('/items/{product_name}/edit', [ItemController::class, 'edit'])->name('item.edit');
Route::get('/index', [ItemController::class, 'index'])->name('index');
Route::get('/user/dashboard', [ItemController::class, 'user'])->name('user.dashboard');
Route::prefix('admin')->group(function () {
    // Tampilkan halaman dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'admin'])->name('admin.dashboard');
    // Tampilkan daftar postingan
    Route::get('/postingan', [PostController::class, 'index'])->name('admin.postingan');
    // Tampilkan daftar pengguna
    Route::get('/pengguna', [UserDataController::class, 'index'])->name('admin.pengguna');
    // Tampilkan detail pengguna berdasarkan username
    Route::get('/{username}', [UserDataController::class, 'show'])->name('admin.show');
    // Tampilkan form edit pengguna
    Route::get('/{username}/edit', [UserDataController::class, 'edit'])->name('admin.user_edit');
    // Proses update pengguna
    Route::put('/{username}/update', [UserDataController::class, 'update'])->name('admin.user_update');
    // Tampilkan daftar barang
    Route::get('/item/{product_name}', [PostController::class, 'show'])->name('admin.item_detail');
    Route::get('/item/{product_name}/edit', [PostController::class, 'edit'])->name('admin.item_edit');
    Route::put('/item/{product_name}/update', [PostController::class, 'update'])->name('admin.item_update');
    Route::delete('/laporan/{product_name}/delete', [PostController::class, 'destroy'])->name('admin.item_delete');
    
});
Route::post('/report', [AuthController::class, 'store'])->name('report_store');
Route::get('/report', [AuthController::class, 'showForm'])->name('report');
Route::get('/reports', [AuthController::class, 'Formindex'])->name('report_index'); // Daftar laporan


Route::get('/index', function () {
    return view('index');
})->name('index');


// Middleware pengecekan role
Route::middleware(\App\Http\Middleware\RedirectBasedOnRole::class)->group(function () {
    Route::get('/check-role', function () {
        return 'Redirecting based on role...';
    });
});
Route::middleware(['auth'])->group(function () {
    Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('messages/chat/{receiver_id}', [MessageController::class, 'chat'])->name('messages.chat');
    Route::post('messages/store', [MessageController::class, 'store'])->name('messages.store');
});

Route::delete('/laporan/{product_name}/delete', [PostController::class, 'destroy'])->name('admin.item_delete');
//Category
Route::get('/category/{category}', [ItemController::class, 'showByCategory'])->name('item.category');