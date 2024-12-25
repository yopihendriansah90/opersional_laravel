<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\SuperAdmin\AdminController;
use App\Http\Controllers\SuperAdmin\DriverController;
use App\Http\Controllers\SuperAdmin\JenisKendraanController;
use App\Http\Controllers\SuperAdmin\KendaraanController;
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

Route::group([
    'prefix' => config('admin.prefix'),
    'namespace' => 'App\\Http\\Controllers',
], function () {
    Route::controller(AuthController::class)->group(function () {

        Route::get('login', 'formLogin')->name('admin.login');
        Route::post('login', 'login');
    });

    Route::post('logout', 'Auth\AuthController@logout')->name('admin.logout');

    Route::middleware(['auth:admin'])->group(function () {
        Route::view('/', 'dashboard')->name('dashboard');
        // Route::view('/post', 'data-post')->name('post')->middleware('can:role,"admin","editor"');
        Route::view('/admin', 'data-admin')->name('admin')->middleware('can:role,"admin"');

        // ADMIN
        Route::controller(AdminController::class)->group(function () {
            // Route::post('logout', 'Auth\AuthController@logout')->name('superadmin.logout');
            Route::get('/superadmin/user', 'index')->name('user.data');
            Route::get('/superadmin/user/create', 'create')->name('user.create');
            Route::post('/superadmin/user/create', 'store');
        });
        // KENDARAAN
        Route::controller(KendaraanController::class)->group(function () {
            Route::get('/superadmin/kendaraan', 'index')->name('kendaraan.data');
        });

        //JENIS KENDARAAN
        Route::controller(JenisKendraanController::class)->group(function () {
            Route::get('/superadmin/jeniskendaraan', 'index')->name('jeniskendaraan.data');
            Route::get('/superadmin/jeniskendaraan/create', 'create')->name('jeniskendaraan.create');
            Route::post('/superadmin/jeniskendaraan/create', 'store');
        });

        //DRIVER
        Route::controller(DriverController::class)->group(function () {
            Route::get('/superadmin/driver', 'index')->name('driver.data');
        });
    });
});
