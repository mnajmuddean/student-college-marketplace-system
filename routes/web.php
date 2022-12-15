<?php

use App\Models\User;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Brand\BrandController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Wishlist\WishlistController;

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
    Route::get('/edit/{categoryID}', [CategoryController::class, 'EditCategory'])->name('category.edit');
    Route::post('/update/{categoryID}', [CategoryController::class, 'UpdateCategory'])->name('category.update');
    Route::get('/delete/{categoryID}', [CategoryController::class, 'DeleteCategory'])->name('category.delete');

});

// All Product Routes

Route::prefix('product')->group(function(){
    Route::get('/add', [ProductController::class, 'AddProduct'])->name('add.product');
    Route::post('/store', [ProductController::class, 'StoreProduct'])->name('product.store');
    Route::get('/manage', [ProductController::class, 'ManageProduct'])->name('manage.product');
    Route::get('/edit/{productID}', [ProductController::class, 'EditProduct'])->name('product.edit');
    Route::post('/update/{productID}', [ProductController::class, 'UpdateProduct'])->name('product.update');
    Route::get('/delete/{productID}', [ProductController::class, 'DeleteProduct'])->name('product.delete');
    Route::post('/multi-image/update', [ProductController::class, 'UpdateMultiImage'])->name('multiimage.update');
    Route::post('/image-thumbnail/update/{productID}', [ProductController::class, 'UpdateThumbnailImage'])->name('imagethumbnail.update');
    Route::get('/multi-image/delete/{productID}', [ProductController::class, 'DeleteMultiImage'])->name('multiimage.delete');
    Route::get('/inactive/{productID}', [ProductController::class, 'InactiveProduct'])->name('product.inactive');
    Route::get('/active/{productID}', [ProductController::class, 'ActiveProduct'])->name('product.active');
});


//All Product Routes

Route::get('/product/details/{id}', [StudentController::class, 'productDetails']);
Route::get('/category/details/{categoryID}', [StudentController::class, 'CategoryWiseProduct']);


//All Product Modal View

Route::get('/product/view/modal/{id}', [StudentController::class, 'ProductViewAjax']);

//All Add To Cart
Route::post('/cart/data/store/{productID}', [CartController::class, 'AddToCart']);

//All Mini Cart
Route::get('/product/minicart', [CartController::class, 'MiniCart']);
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']);


//Add Wishlist
Route::group(['prefix' => 'user','middleware' => ['user','auth'],'namespace'=>'User'], function(){

    Route::post('/addWishlist/{productID}', [CartController::class, 'addWishlist']);
Route::get('/wishlist', [WishlistController::class, 'wishlist'])->name('wishlist');
Route::get('/getwishlist', [WishlistController::class, 'getwishlist']);
Route::get('/wishlist/remove/{wishlistID}', [WishlistController::class, 'wishlistRemove']);

});
