<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\User\UserController;

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

Route::middleware([ 'auth:sanctum',   config('jetstream.auth_session'), 'verified'])->group(function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    Route::get('/dashboard', function () {return view('dashboard',compact('user'));
    })->name('dashboard');
});

Route::get('/', [UserController::class, 'index']);

Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
Route::get('/user/profile', [UserController::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/edit', [UserController::class, 'UserProfileStore'])->name('user.profile.store');