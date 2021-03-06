<?php

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


Auth::routes([
    'register' => false,
    'login' => false,
]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');
Route::post('/checkBalance', [App\Http\Controllers\HomeController::class, 'checkBalance'])->name('checkBalance');
Route::post('/update/password', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');
