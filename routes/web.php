<?php

use App\Models\User;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Brand\BrandController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Product\ProductController;

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

Route::middleware('admin:admin')->group(function(){
   Route::get('admin/login', [AdminController::class, 'loginForm']);
   Route::post('admin/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware([
    'auth:sanctum,admin',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard')->middleware('auth:admin');
});

// All Admin Routes
Route::get('admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
Route::get('admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('admin/profile/edit', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');
Route::get('admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
Route::post('update/change/password', [AdminProfileController::class, 'AdminUpdateChangePassword'])->name('update.change.password');


// All User Routes

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function(){
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard',compact('user'));
})->name('dashboard');

Route::get('/', [StudentController::class, 'index']);
Route::get('/student/logout', [StudentController::class, 'StudentLogout'])->name('student.logout');
Route::get('/student/profile', [StudentController::class, 'StudentProfile'])->name('student.profile');
Route::post('/student/profile/edit', [StudentController::class, 'StudentEditProfile'])->name('student.profile.edit');
Route::get('/student/changePassword', [StudentController::class, 'StudentChangePassword'])->name('student.changePassword');
Route::post('/student/updatePassword', [StudentController::class, 'StudentUpdatePassword'])->name('student.updatePassword');

// All Brand Routes

Route::prefix('brand')->group(function(){
    Route::get('/view', [BrandController::class, 'BrandView'])->name('all.brand');
    Route::post('/add', [BrandController::class, 'AddBrand'])->name('brand.store');
    Route::get('/edit/{id}', [BrandController::class, 'EditBrand'])->name('brand.edit');
    Route::post('/update', [BrandController::class, 'UpdateBrand'])->name('brand.update');
});

// All Category Routes

Route::prefix('category')->group(function(){
    Route::get('/category', [CategoryController::class, 'CategoryView'])->name('all.category');
    Route::post('/add', [CategoryController::class, 'AddCategory'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'EditCategory'])->name('category.edit');
    Route::post('/update', [CategoryController::class, 'UpdateCategory'])->name('category.update');

});

// All Product Routes

Route::prefix('product')->group(function(){
    Route::get('/add', [ProductController::class, 'AddProduct'])->name('add.product');
    Route::post('/store', [ProductController::class, 'StoreProduct'])->name('product.store');
    Route::get('/manage', [ProductController::class, 'ManageProduct'])->name('manage.product');
});






