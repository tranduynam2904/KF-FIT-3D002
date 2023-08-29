<?php

use App\Http\Controllers\admin\ProductCategory;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Route::get('admin/product', function (){
//     return view('admin.pages.product.list');
// });

// Route::get('admin/user', function(){
//     return view('admin.pages.user.list');
// });

require __DIR__ . '/auth.php';


Route::prefix('admin')->name('admin.')->group(function () {
    //User
    Route::get('user', [UserController::class, 'index'])->name('user');
    //Product
    Route::get('product', [ProductController::class, 'index'])->name('product');
    //Product Category
    Route::get('product_categories', [ProductCategory::class, 'index'])->name('product_categories.list');
    Route::get('product_categories/add', [ProductCategory::class, 'add'])->name('product_categories.add');
    Route::post('product_categories/store', [ProductCategory::class, 'store'])->name('product_categories.store');
    Route::get('product_categories/{id}', [ProductCategory::class, 'detail'])->name('product_categories.detail');
});
