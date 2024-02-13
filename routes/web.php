<?php

use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\Home\HomeController;
use App\Models\Website;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('pages.home');
Route::get('/{rubric_slug}', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/{rubric_slug}/{article_slug}', [ArticleController::class, 'show'])->name('article.show');






















