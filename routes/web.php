<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;

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

Route::get('/', [RestaurantController::class, 'index']);
Route::get('/layouts.booktable', [RestaurantController::class, 'book']);
Route::post('save-table', [RestaurantController::class, 'save'])->name('save');
Route::post('save-contact', [RestaurantController::class, 'saved'])->name('saved');
