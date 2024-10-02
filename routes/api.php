<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ScategorieController;

 // Assurez-vous que le contrôleur est bien importé

// Route pour récupérer l'utilisateur connecté, nécessite l'authentification Sanctum
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Routes API pour les catégories, avec le contrôleur CategorieController
Route::middleware('api')->group(function () {
    Route::resource('categories', CategorieController::class);
    });

Route::middleware('api')->group(function () {

        Route::resource('scategories', ScategorieController::class);
        
        });  
Route::get('/scat/{idcat}', [ScategorieController::class,'showSCategorieByCAT']);
Route::get('/listarticles/{idscat}', [ArticleController::class,'showArticlesBySCAT']);

Route::get('/articles/art/articlespaginate', [ArticleController::class,
'articlesPaginate']);
