<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\SuperAdmin\AdminController;
use App\Http\Controllers\SuperAdmin\DriverController;
use App\Http\Controllers\SuperAdmin\DriverKendaraanController;
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

        Route::get('login', 'formLogin')->name('login');
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
            Route::get('/superadmin/user', 'index')->name('user.data')->middleware('roles:superadmin,admin'); //middleware('roles:superadmin,admin') penggunaan untuk menambahkan akses yang di setujui
            // Route::get('/superadmin/user/{id}', 'show');
            Route::get('/superadmin/user/create', 'create')->name('user.create');
            Route::post('/superadmin/user/create', 'store');
            Route::get('/superadmin/user/update/{id}', 'edit');
            Route::post('/superadmin/user/update/{id}', 'update');
            Route::post('/superadmin/user/restore/{id}', 'restore');
            Route::post('/superadmin/user/delete/{id}', 'updateStatus');
        });
        // KENDARAAN
        Route::controller(KendaraanController::class)->group(function () {
            Route::get('/superadmin/kendaraan', 'index')->name('kendaraan.data');
            Route::get('/superadmin/kendaraan/create', 'create')->name('kendaraan.create');
            Route::post('/superadmin/kendaraan/create', 'store'); //untuk mengarakan ke penyimpanan data
        });

        //JENIS KENDARAAN
        Route::controller(JenisKendraanController::class)->group(function () {
            Route::get('/superadmin/jeniskendaraan', 'index')->name('jeniskendaraan.data');
            Route::get('/superadmin/jeniskendaraan/create', 'create')->name('jeniskendaraan.create');
            Route::post('/superadmin/jeniskendaraan/create', 'store');
            Route::get('/superadmin/jeniskendaraan/update/{id}', 'edit');
            Route::post('/superadmin/jeniskendaraan/update/{id}', 'update');

            Route::post('/superadmin/jeniskendaraan/restore/{id}', 'restore');
            // Route::post('/superadmin/jeniskendaraan/delete/{id}', 'updateStatus');
            Route::post('/superadmin/jeniskendaraan/delete/{id}', 'delete');
        });

        //DRIVER
        Route::controller(DriverController::class)->group(function () {
            Route::get('/superadmin/driver', 'index')->name('driver.data');
            Route::get('/superadmin/driver/create', 'create')->name('driver.create');
        });

        //DRIVER KENDARAAN
        Route::controller(DriverKendaraanController::class)->group(function () {
            Route::get('/superadmin/driverkendaraan', 'index')->name('driverkendaraan.data');
            Route::post('/superadmin/driverkendaraan/delete/{id}', 'delete');
        });
    });

    // Route::middleware('auth:admin', 'role:superadmin')->co
});
