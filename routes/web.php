<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cargo\cargoController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'/cargo'], function (){
    Route::get('/create', [cargoController::class, 'create']);
    Route::post('/save', [cargoController::class, 'upload']);
    Route::get('/get-all-cargos', [cargoController::class, 'getAllCargos']);
});
