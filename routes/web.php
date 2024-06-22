<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/',[LandingPageController::class,'index'])->name('home');
Route::get('/category/{slug}', [LandingPageController::class, 'filterByCategory'])->name('category.show');
Route::get('/detail-article/{slug}',[LandingPageController::class,'detail'])->name('detail-article');


Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/category',[CategoryController::class,'index'])->name('category.index');
Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

Route::get('/dashboard/article',[ArticleController::class,'index'])->name('article.index');
Route::post('/article/create', [ArticleController::class, 'becomeAuthor'])->name('article.becomeAuthor');
Route::get('/article/create',[ArticleController::class,'create'])->name('article.create');
Route::post('/article/store',[ArticleController::class,'store'])->name('article.store');
Route::get('/article/{id}/edit', [ArticleController::class, 'edit'])->name('article.edit');
Route::put('/article/{id}', [ArticleController::class, 'update'])->name('article.update');
Route::delete('/article/{id}', [ArticleController::class, 'destroy'])->name('article.destroy');



Route::get('/layout', function(){
    return view('landingpage.layouts.landingpage');
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile-edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile-edit', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile-edit', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
