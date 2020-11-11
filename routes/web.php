<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Backend;
use App\Http\Controllers\Frontend;

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

Route::get('/', [Frontend\PagesController::class,'index'])->name('index');



Route::group(['prefix'=>'products'],function(){
  Route::get('/', [Frontend\ProductsController::class,'index'])->name('products');
  Route::get('/{slug}', [Frontend\ProductsController::class,'show'])->name('products.show');
  Route::get('/new/search', [Frontend\PagesController::class,'search'])->name('search');

  Route::get('/categories', [Frontend\CategoriesController::class,'index'])->name('categories.index');
  Route::get('/categories/{id}', [Frontend\CategoriesController::class,'show'])->name('categories.show');
});




Route::group(['prefix'=>'admin'],function(){
  Route::get('/',[Backend\PagesController::class,'index']);
  Route::group(['prefix'=>'products'],function(){
      Route::get('/create',[Backend\ProductsController::class,'create'])->name('admin.products.create');
      Route::post('/create',[Backend\ProductsController::class,'store'])->name('admin.products.create');
      Route::get('/',[Backend\ProductsController::class,'index'])->name('admin.products.index');
       Route::get('/{product}',[Backend\ProductsController::class,'edit'])->name('admin.products.edit');
      Route::put('/{product}',[Backend\ProductsController::class,'update'])->name('admin.products.update');
      Route::delete('/{product}',[Backend\ProductsController::class,'destroy'])->name('admin.products.destroy');
    });
  Route::group(['prefix'=>'categories'],function(){
    Route::get('/',[Backend\CategoriesController::class,'index'])->name('admin.category.index');
      Route::get('/create',[Backend\CategoriesController::class,'create'])->name('admin.category.create');
      Route::post('/create',[Backend\CategoriesController::class,'store'])->name('admin.category.create');
      Route::get('/{category}',[Backend\CategoriesController::class,'edit'])->name('admin.category.edit');
      Route::put('/{category}',[Backend\CategoriesController::class,'update'])->name('admin.category.update');
      Route::delete('/{category}',[Backend\CategoriesController::class,'destroy'])->name('admin.category.destroy');
      
  });
  Route::group(['prefix'=>'brands'],function(){
    Route::get('/',[Backend\BrandsController::class,'index'])->name('admin.brand.index');
      Route::get('/create',[Backend\BrandsController::class,'create'])->name('admin.brand.create');
      Route::post('/create',[Backend\BrandsController::class,'store'])->name('admin.brand.create');
      Route::get('/{brand}',[Backend\BrandsController::class,'edit'])->name('admin.brand.edit');
      Route::put('/{brand}',[Backend\BrandsController::class,'update'])->name('admin.brand.update');
      Route::delete('/{brand}',[Backend\BrandsController::class,'destroy'])->name('admin.brand.destroy');
      
  });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
