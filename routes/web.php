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

    // Show form for creating a new QR code or editing an existing one
    Route::get('/qrcodes/{id?}', [QRCodeController::class, 'showForm'])->name('qrcodes.form');

    // Handle creation and update actions for QR codes
    Route::post('/qrcodes', [QRCodeController::class, 'handleAction'])->name('qrcodes.store'); // Route for creating
    Route::post('/qrcodes/{id}', [QRCodeController::class, 'handleAction'])->name('qrcodes.update'); // Route for updating

    // Route for selecting a product
    Route::post('/qrcodes/select-product', [QRCodeController::class, 'selectProduct'])->name('qrcodes.selectProduct');

    // Route for deleting a QR code
    Route::delete('/qrcodes/{id}', [QRCodeController::class, 'handleAction'])->name('qrcodes.destroy');
});

