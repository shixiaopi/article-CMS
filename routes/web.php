<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
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

Route::get('/', [IndexController::class, 'index'])->name('/');
Route::get('cate/{cate}', [IndexController::class, 'getList'])->name('cate');
Route::get('article/{article}.html', [IndexController::class, 'show'])->name('show');
Route::get('/demo', [IndexController::class, 'demo'])->name('demo');
