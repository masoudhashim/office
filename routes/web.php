<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Admin\UserController ;
use Admin\UserController ;
use Client\ClientController ;

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
    return view('index');
});


// Admin routes
Route::prefix('admin')->middleware(['auth','auth.isAdmin'])->name('admin.')->group( function () {
   Route::resource('/users', UserController::class); 
});


// Clinet routes
Route::prefix('client')->middleware('auth')->name('client.')->group( function () {
    Route::resource('/clients', ClientController::class); 
 });
 