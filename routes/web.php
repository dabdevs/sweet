<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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

Route::get('/', [UsersController::class, 'index'])->name('index');






Auth::routes(['verify' => true]);

Route::group(['prefix'=>'users','as'=>'users.'], function(){
    Route::get('/{id}/edit', [UsersController::class, 'edit'])->name('edit');
    Route::post('/{id}/update', [UsersController::class, 'update'])->name('update');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/get-cities/{country_id}', [App\Http\Controllers\UtilsController::class, 'getCities'])->name('get-cities');
Route::get('/get-locations/{city_id}', [App\Http\Controllers\UtilsController::class, 'getLocations'])->name('get-locations');