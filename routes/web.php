<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QuestionsController;

Route::middleware(['verify.shopify'])->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/home', [AdminController::class, 'dashboard'])->name('home');
    Route::get('/questions', [QuestionsController::class, 'showQuestions'])->name('questions');
    Route::get('/add-questions', [QuestionsController::class, 'addQuestions'])->name('add-questions');
    Route::post('/save-questions', [QuestionsController::class, 'saveQuestions'])->name('save-questions');
    Route::get('/products', [AdminController::class, 'products'])->name('admin.products');
});

