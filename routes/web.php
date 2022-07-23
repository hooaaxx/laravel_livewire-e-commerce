<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Postcontroller;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\admin\ProductController as AdminProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ShowProfile;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group( function() {

    Route::get('/profile', ShowProfile::class)->name('profile');

    Route::middleware(['verified'])->group( function() {

        Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
        //Products
        Route::resource('/products', ProductController::class)->only([
            'index', 'show'
        ]);

        // ADMIN PANEL
        Route::middleware(['can:access-admin'])->name('admin.')->prefix('admin')->group(function(){
            Route::get('/', [AdminController::class, 'index'])->name('index');

            // Route::post('/store', [AdminController::class, 'createUser'])->name('createUser');

            Route::resource('/products', AdminProductController::class)->middleware('can:access-settings');
            Route::resource('/posts', Postcontroller::class);
            Route::resource('/settings', SettingController::class)->middleware('can:access-settings');
        });
    });
});

require __DIR__.'/auth.php';
