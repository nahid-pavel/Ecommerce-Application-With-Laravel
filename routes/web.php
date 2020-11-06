<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminPagesController;

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

Route::get('/', [PagesController::class,'index']);
Route::get('/products', [PagesController::class,'products']);
Route::group(['prefix'=>'admin'],function(){
    Route::get('/',[AdminPagesController::class,'index']);
    Route::get('/create',[AdminPagesController::class,'create']);
    Route::post('/create',[AdminPagesController::class,'store']);
});
