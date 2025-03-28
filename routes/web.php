<?php

use App\Http\Controllers\Backend\Admin\AdminDashboardController;
use App\Http\Controllers\Backend\Auth\AuthController;
use App\Http\Controllers\Backend\Product\ProductBandController;
use App\Http\Controllers\Backend\Product\ProductCategoryController;
use App\Http\Controllers\Backend\Product\ProductController;
use App\Http\Controllers\Backend\Product\ProductCouponController;
use App\Http\Controllers\Backend\Product\ProductSubCategoryController;
use App\Http\Controllers\Backend\SiteSetting\NewsletterController;
use App\Http\Controllers\Frontend\Account\UserDashboardController;
use App\Http\Controllers\Frontend\Auth\AuthController as FrontAuthController;
use App\Http\Controllers\Frontend\Home\HomeController;
use App\Http\Controllers\Frontend\Newsletter\NewsletterController as FrontNewsletterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::middleware('guest.admin')->group(function () {
        Route::get('register', [AuthController::class, 'register'])->name('register');
        Route::post('register', [AuthController::class, 'registerStore'])->name('register.store');
        Route::get('login', [AuthController::class, 'login'])->name('login');
        Route::post('login', [AuthController::class, 'loginStore'])->name('login.store');
    });

    Route::middleware('admin')->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');

        Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
            Route::resource('category', ProductCategoryController::class);
            Route::resource('sub-category', ProductSubCategoryController::class);
            Route::resource('brand', ProductBandController::class);
            Route::resource('coupon', ProductCouponController::class);

            Route::get('get/subcategory/{category_id}', [ProductController::class, 'getSubCategory'])->name('get.subcategoty');
            Route::post('list/product/{product_id}', [ProductController::class, 'changeStatus'])->name('product.status');
            Route::resource('list', ProductController::class);
        });


        Route::group(['prefix' => 'site-setting', 'as' => 'site_setting.'], function () {
            Route::get('newsletter', [NewsletterController::class, 'newsletter'])->name('newsletter.index');
            Route::post('/newsletter/delete-multiple', [NewsletterController::class, 'deleteMultiple'])->name('newsletter.delete-multiple');

            Route::post('/newsletter/delete', [NewsletterController::class, 'delete'])->name('newsletter.delete');
        });
    });
});


Route::group(['as' => 'user.'], function () {

    Route::get('', [HomeController::class , 'home'])->name('home');

    Route::get('contact', function () {
        return view('front.pages.contact.index');
    })->name('contact');

    Route::post('newsletter/store', [FrontNewsletterController::class, 'newsletter'])->name('newsletter.store');

    Route::middleware('guest.authentic')->group(function () {
        Route::get('register', [FrontAuthController::class, 'register'])->name('register');
        Route::post('register', [FrontAuthController::class, 'registerStore'])->name('register.store');
        Route::get('login', [FrontAuthController::class, 'login'])->name('login');
        Route::post('login', [FrontAuthController::class, 'loginStore'])->name('login.store');
        Route::get('forget-password', [FrontAuthController::class, 'forgetPassword'])->name('forget.password');
        Route::post('forget-password', [FrontAuthController::class, 'forgetPasswordStore'])->name('forget.password.store');
    });

    Route::middleware('authentic')->group(function () {
        Route::post('logout', [FrontAuthController::class, 'logout'])->name('logout');
        Route::get('dashboard', [UserDashboardController::class, 'dashboard'])->name('dashboard');
    });
});
