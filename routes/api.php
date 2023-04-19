<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\TracerStudyController;
use App\Http\Controllers\SchoolController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'auth'], function () 
{
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});

Route::group(['middleware' => ['auth:sanctum']], function () 
{
    Route::group(['prefix' => 'auth'], function () {
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    });

    Route::group(['prefix' => 'school'], function () {
        Route::get('/{id}/get/tracerstudy', [SchoolController::class, 'getTracerStudy'])->name('gettracerstudy');
    });

    Route::apiResource('tracerstudy', TracerStudyController::class);
});
