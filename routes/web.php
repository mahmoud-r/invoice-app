<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    Route::get('/dashboard', [dashboardController::class ,'index'])->middleware('auth')->name('dashboard');
    Route::get('/', [dashboardController::class ,'index'])->middleware('auth')->name('dashboard');

//    categories

    Route::resource('categories', CategorieController::class)->middleware('auth');
    Route::resource('products', ProductController::class)->middleware('auth');
    Route::get('/product/{id}',[InvoiceController::class,'Getproduct']);
    Route::get('/productprice/{id}',[InvoiceController::class,'Getprice']);
    Route::post('change_payment',[InvoiceController::class,'change_payment'])->name('change_payment');
    Route::post('add_item', [InvoiceController::class,'add_item'])->middleware('auth')->name('add_item');
    Route::delete('invoice.delete_item', [InvoiceController::class,'delete_item'])->middleware('auth')->name('delete_item');

    Route::resource('invoice', InvoiceController::class)->middleware('auth');

    Route::resource('roles', RoleController::class)->middleware('auth');
    Route::resource('users', UserController::class)->middleware('auth');



    require __DIR__.'/auth.php';

});






