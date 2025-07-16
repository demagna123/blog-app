<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentaireController;


Route::get('/', function () {
    return view('welcome');
});

Route::post('/articles/{id}/like', [ArticleController::class, 'like'])->name('articles.like');
Route::resource('articles', ArticleController::class);
Route::get('/articles/{article}/commentaires/create', [CommentaireController::class, 'create'])->name('commentaires.create');
Route::post('/articles/{article}/commentaires/create', [CommentaireController::class, 'store'])->name('commentaires.store');

