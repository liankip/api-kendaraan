<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KendaraanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['prefix' => 'v1'], function ($router) {

    Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
        Route::post('login', [AuthController::class, 'login']);

        Route::post('me', [AuthController::class, 'me']);
    });

    Route::group(['prefix' => 'kendaraan'], function ($router) {
        Route::get('/', [KendaraanController::class, 'collectionStokKendaraan']);

        Route::post('/', [KendaraanController::class, 'addKendaraan']);

        Route::post('/order', [KendaraanController::class, 'orderKendaraan']);

        Route::get('penjualan-kendaraan', [KendaraanController::class, 'collectionPenjualanKendaraan']);

        Route::get('penjualan-perkendaraan', [KendaraanController::class, 'collectionPenjualanPerkendaraan']);
    });
});
