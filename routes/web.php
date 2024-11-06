<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\QRCodeController;


Route::middleware(['verify.shopify'])->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/products', [AdminController::class, 'products'])->name('admin.products');
    Route::get('/questions', [QuestionsController::class, 'showQuestions'])->name('questions');
    Route::get('/add-questions', [QuestionsController::class, 'addQuestions'])->name('add-questions');

    Route::post('/save-questions', [QuestionsController::class, 'saveQuestions'])->name('save-questions');


    Route::get('/qrcodes/{id?}', [QRCodeController::class, 'showForm'])->name('qrcodes.form');
    Route::post('/qrcodes/{id?}', [QRCodeController::class, 'handleAction'])->name('qrcodes.action');
    Route::post('/qrcodes/select-product', [QRCodeController::class, 'selectProduct'])->name('qrcodes.selectProduct');
    
});

