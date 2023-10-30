<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashHomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\EngineTypeController;
use App\Http\Controllers\FueltypeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageSettingController;
use App\Http\Controllers\ProductController2;
use App\Http\Controllers\YearMakeModelController;
use App\Http\Controllers\TestCategoryController;
use App\Http\Controllers\MakeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductViewController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\VehicleMakeController;
use App\Http\Controllers\VehicleModelController;
use App\Http\Controllers\VehicleYearController;
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

// Route::get('/', function () {

//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index'])->name('/');



Route::group(["prefix" => "customer",], function () {
    Route::resource('customer', CustomerController::class);
    Route::get('registration', [CustomerController::class, 'registration'])->name('registration');
    Route::post('loginCheck', [CustomerController::class, 'loginCheck'])->name('loginCheck');
});
Route::get('customer/products/{id}', [CustomerController::class, 'customerProducts'])->name('customer.products');

Route::get('customer/orders', [CustomerController::class, 'orders'])->name('customer/orders');
Route::get('customer/login', [CustomerController::class, 'login'])->name('customer/login');
Route::get('customer/logout', [CustomerController::class, 'logout'])->name('customer/logout');

Route::group(["prefix" => "categories",], function () {
    Route::resource('product-category', CategoryProductController::class);
});

Route::group(["prefix" => "product",], function () {
    Route::resource('discount', DiscountController::class);
    Route::resource('product-details', ProductViewController::class);
});

Route::get('discount/validate', [DiscountController::class, 'discountValidate'])->name('discount.validate');
Route::get('product/recentlyViewed', [ProductViewController::class, 'recentlyViewed'])->name('product.recentlyViewed');
Route::get('product/store-compare', [ProductViewController::class, 'storeCompare'])->name('product.store-compare');
Route::get('product/compare-products', [ProductViewController::class, 'compareProducts'])->name('product.compare-products');
Route::get('product/delete-compare/{compare}', [ProductViewController::class, 'deleteCompare'])->name('product.delete-compare');
Route::get('product/cart/{product}', [ProductViewController::class, 'cart'])->name('product.cart');
Route::post('product/checkout', [ProductViewController::class, 'checkout'])->name('product.checkout');

Route::post('/get-year-data', [ProductController::class, 'getYear'])->name('get-year-data');
Route::post('/get-model-data', [ProductController::class, 'getModel'])->name('get-model-data');
Route::post('/get-make-data', [ProductController::class, 'getMake'])->name('get-make-data');
Route::post('/get-image-settings', [ImageSettingController::class, 'getImageSetting'])->name('get-image-settings');
Route::post('/regenerate-thumbnails', [ImageSettingController::class, 'regenerateThumbnails'])->name('regenerate-thumbnails');
Route::get('/products/sort', [ProductController::class, 'sort'])->name('products.sort');


Route::get('/search', [ShopController::class, 'search'])->name('search.year');
Route::get('/shop/make/{make}', [ShopController::class, 'showMakeProduct'])->name('shop.make');
Route::get('/shop/model/{model}', [ShopController::class, 'showModelProduct'])->name('shop.model');
Route::get('/product/search', [ProductController::class, 'search']);
Route::get('/product/reviews/{sku}', [ProductController::class, 'productReviews'])->name('product.reviews');;

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

    Route::group(["prefix" => "admin", "as" => "e-commerce."], function () {
        Route::get('add-product', [ProductController2::class, 'addProduct'])->name('add-product');
        Route::get('product-list', [ProductController2::class, 'productList'])->name('product-list');
        Route::get('edit-product', [ProductController2::class, 'editProduct'])->name('edit-product');

        Route::get('add-category', [CategoryController::class, 'addCategory'])->name('add-category');
        Route::post('save-category', [CategoryController::class, 'saveCategory'])->name('save-category');
        Route::get('category-list', [CategoryController::class, 'categoryList'])->name('category-list');
        Route::get('/edit-category/{id}', [CategoryController::class, 'editCategory'])->name('edit-category');

        // Route::post('edit-category',[CategoryController::class,'editCategory'])->name('edit-category');
        Route::post('update-category', [CategoryController::class, 'updateCategory'])->name('update-category');
        Route::post('delete-category', [CategoryController::class, 'deleteCategory'])->name('delete-category');

        // Route::get('add-make',[YearMakeModelController::class,'addMake'])->name('add-make');
        Route::get('add-model', [YearMakeModelController::class, 'addModel'])->name('add-model');
        Route::get('add-brand', [ProductController2::class, 'addBrand'])->name('add-brand');
    });
    Route::resource('product-tag', TagsController::class);
    Route::resource('review', ReviewController::class);

    Route::group(["prefix" => "admin",], function () {
        Route::resource('make', MakeController::class);
        Route::resource('fuel-type', FueltypeController::class);
        Route::resource('engine-type', EngineTypeController::class);
        Route::resource('vehicle-model', VehicleModelController::class);
        Route::resource('vehicle-make', VehicleMakeController::class);
        Route::resource('vehicle-year', VehicleYearController::class);
        Route::resource('product', ProductController::class);
        Route::resource('order', OrderController::class);
        Route::post('save-dropzone-image', [ProductController::class, 'dropzoneImage'])->name('save-dropzone-image');
        Route::resource('image-setting', ImageSettingController::class);
    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [DashHomeController::class, 'index'])->name('/dashboard');
});


require __DIR__ . '/auth.php';
