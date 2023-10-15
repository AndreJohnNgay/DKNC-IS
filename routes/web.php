<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsEmployee;
use App\Http\Middleware\IsOwner;
use App\Http\Middleware\IsLoggedIn;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemBatchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\AccountController;

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

    // Route::get('item', function () {
    //     return view('employee.item');
    // });
Route::group(['middleware' => 'is_logged_in'], function () {
    Route::get('/', function () {
        return view('auth.login');
    });
});



Auth::routes();

Route::resource('item', ItemController::class);
Route::resource('batch', ItemBatchController::class);

// Route::get('/item/search', [ItemController::class, 'search'])->name('item.search');

Route::put('item/{item}/update-stock', [ItemController::class, 'updateStock'])
    ->name('item.updateStock');

Route::put('account/{account}/update-password', [AccountController::class, 'updatePassword'])
    ->name('account.updatePassword');

Route::group(['middleware' => 'is_employee'], function () {
  
});

Route::group(['middleware' => 'is_owner'], function () {
    Route::resource('category', CategoryController::class);
    Route::resource('unit', UnitController::class);
    Route::resource('type', TypeController::class);
    Route::resource('account', AccountController::class);
});