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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::resource('item', ItemController::class);
Route::resource('batch', ItemBatchController::class);
Route::resource('account', AccountController::class);

Route::put('account/{account}/update-password', [AccountController::class, 'updatePassword'])
    ->name('account.updatePassword');

Route::put('account/{account}/reset-password', [AccountController::class, 'resetPassword'])
    ->name('account.resetPassword');

Route::put('account/{account}/archive-account', [AccountController::class, 'archiveAccount'])
    ->name('account.archiveAccount');

Route::put('account/{account}/restore-account', [AccountController::class, 'restoreAccount'])
    ->name('account.restoreAccount');

Route::resource('category', CategoryController::class);
Route::resource('unit', UnitController::class);
Route::resource('type', TypeController::class);



