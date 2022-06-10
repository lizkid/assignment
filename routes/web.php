<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cargo\cargoController;
use App\Http\Controllers\Auth\AuthController;

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

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'save']);

Route::group(['middleware'=>'auth'], function (){

    Route::get('/logout', [AuthController::class, 'logout']);

    Route::group(['prefix'=>'/cargo'], function (){
        Route::get('/', [cargoController::class, 'create']);
        Route::post('/save', [cargoController::class, 'upload']);
        Route::get('/get-all-cargos', [cargoController::class, 'getAllCargos']);
    });
});


//web service API
Route::get('/api/v1/get-saved-cargos', [cargoController::class, 'getAllCargos']);
