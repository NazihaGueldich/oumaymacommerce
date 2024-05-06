<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ArticlesController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->group(function () {
    Route::resource('categories', CategoriesController::class);
    Route::get('categories_archivee', [CategoriesController::class, 'indexarchiv'])->name('categories.archive');
    Route::get('categories_archive', [CategoriesController::class, 'archive'])->name('categorie.archive');
    Route::get('SousCategories', [CategoriesController::class, 'Scatg'])->name('SousCategories');
});

Route::middleware('api')->group(function () {
    Route::resource('articles', ArticlesController::class);
    Route::get('articles_archivee', [ArticlesController::class, 'indexarchiv'])->name('articles.archive');
    Route::get('articles_archive', [ArticlesController::class, 'archive'])->name('article.archive');

});
