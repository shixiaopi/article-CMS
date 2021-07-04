<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminControllers\AuthController;
use App\Http\Controllers\AdminControllers\HomeController;
use App\Http\Controllers\AdminControllers\AdminController;
use App\Http\Controllers\AdminControllers\CateController;
use App\Http\Controllers\AdminControllers\TagController;
use App\Http\Controllers\AdminControllers\ArticleController;
use App\Http\Controllers\AdminControllers\SystemController;

Route::prefix('manage')->group(function(){
    Route::get('login',[AuthController::class,'login'])->name('login');
    Route::post('login',[AuthController::class,'store'])->name('login.post');

    Route::group(['middleware'=>'auth:admin'],function (){
        Route::post('logout', [AuthController::class,'logout'])->name('logout');

        Route::get('home', [HomeController::class,'index'])->name('home');
        Route::get('welcome', [HomeController::class,'welcome'])->name('home.welcome');

        Route::get('admin', [AdminController::class, 'index'])->name('admin');
        Route::get('admin/list', [AdminController::class, 'getList'])->name('admin.list');
        Route::get('admin/create', [AdminController::class, 'create'])->name('admin.create');
        Route::post('admin/create', [AdminController::class, 'store'])->name('admin.store');
        Route::get('admin/{admin}/show', [AdminController::class, 'show'])->name('admin.show');
        Route::post('admin/update', [AdminController::class, 'update'])->name('admin.update');
        Route::delete('admin/{admin}/delete', [AdminController::class, 'destroy'])->name('admin.delete');

        Route::get('cate', [CateController::class, 'index'])->name('cate');
        Route::get('cate/list', [CateController::class, 'getList'])->name('cate.list');
        Route::get('cate/{parentId}/create', [CateController::class, 'create'])->name('cate.create');
        Route::post('cate/create', [CateController::class, 'store'])->name('cate.store');
        Route::get('cate/{cate}/show', [CateController::class, 'show'])->name('cate.show');
        Route::post('cate/update', [CateController::class, 'update'])->name('cate.update');
        Route::delete('cate/{cate}/delete', [CateController::class, 'destroy'])->name('cate.destroy');

        Route::get('tag', [TagController::class, 'index'])->name('tag');
        Route::get('tag/list', [TagController::class, 'getList'])->name('tag.list');
        Route::get('tag/create', [TagController::class, 'create'])->name('tag.create');
        Route::post('tag/create', [TagController::class, 'store'])->name('tag.store');
        Route::get('tag/{tag}/show', [TagController::class, 'show'])->name('tag.show');
        Route::post('tag/update', [TagController::class, 'update'])->name('tag.update');
        Route::delete('tag/{tag}/delete', [TagController::class, 'destroy'])->name('tag.delete');

        Route::post('upload',[\App\Http\Tools\UploadFile::class,'upload'])->name('upload');

        Route::get('article', [ArticleController::class, 'index'])->name('article');
        Route::get('article/list', [ArticleController::class, 'getList'])->name('article.list');
        Route::get('article/create', [ArticleController::class, 'create'])->name('article.create');
        Route::post('article/create', [ArticleController::class, 'store'])->name('article.store');
        Route::get('article/{article}/show', [ArticleController::class, 'show'])->name('article.show');
        Route::post('article/update', [ArticleController::class, 'update'])->name('article.update');
        Route::delete('article/{article}/delete', [ArticleController::class, 'destroy'])->name('article.destroy');

        Route::get('system', [SystemController::class, 'index'])->name('system');
        Route::post('system', [SystemController::class, 'update'])->name('system.update');
    });


});
