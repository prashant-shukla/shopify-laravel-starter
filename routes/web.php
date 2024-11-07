<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\ShopifyAuthController;


Route::get('/auth', [ShopifyAuthController::class, 'redirectToShopify']);
Route::get('/auth/callback', [ShopifyAuthController::class, 'handleCallback']);
Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/products', [AdminController::class, 'products'])->name('admin.products');

Route::middleware(['verify.shopify'])->group(function () {
    Route::get('/questions', [QuestionsController::class, 'showQuestions'])->name('questions');
    Route::get('/add-questions', [QuestionsController::class, 'addQuestions'])->name('add-questions');
    Route::post('/save-questions', [QuestionsController::class, 'saveQuestions'])->name('save-questions');
});

