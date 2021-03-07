<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CalenderController;

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

Route::get('/', HomeController::class )->name('home');

Route::get('/login',[AdminController::class,'login'])->name('login');
Route::get('/logout',[AdminController::class,'logout'])->name('logout');
Route::post('/auth',[AdminController::class,'auth'])->name('auth');

Route::get('/about', AboutController::class )->name('about');

Route::get('/products/{slug}',[ProductController::class,'single'])->name('product');
Route::get('/all_products',[ProductController::class,'all_products'])->name('products');
Route::get('/fresh_products',[ProductController::class,'fresh_products'])->name('fresh_products');
Route::get('/frozen_products',[ProductController::class,'frozen_products'])->name('frozen_products');
Route::get('/contact_us',[ContactController::class, 'index'])->name('contact');
Route::post('/contact_us',[ContactController::class, 'send']);
Route::get('/calender', CalenderController::class )->name('calender');

Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('/',[AdminController::class,'index'])->name('admin');
    Route::post('/site_options_save',[AdminController::class,'site_options_save'])->name('site-options-save');
    Route::get('/products',[AdminController::class,'products'])->name('admin.products');
    Route::get('/add/product',[AdminController::class,'add_product'])->name('admin.add.product');
    Route::post('/add/product',[AdminController::class,'save_new_product']);
    Route::get('/delete/product/{id}',[AdminController::class,'delete_product'])->name('admin.delete.product');
    Route::get('/edit/product/{id}',[AdminController::class,'edit_product'])->name('admin.edit.product');
    Route::post('/edit/product/{id}',[AdminController::class,'update_product']);

    Route::get('/update', [AdminController::class,'update'])->name('admin.update');
    Route::post('/update', [AdminController::class,'update_POST']);

    //PAGES
    Route::get('/pages/home',[AdminController::class,'pages_home'])->name('admin.pages.home');
    Route::post('/pages/home',[AdminController::class,'pages_home_save']);
    Route::get('/pages/products',[AdminController::class, 'pages_products'])->name('admin.pages.products');
    Route::post('/pages/products',[AdminController::class, 'pages_products_save']);
});

