<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserFormController;
use App\Http\Controllers\AdminFormController;

Route::prefix('admin')->group(function () {
    Route::get('/forms', [AdminFormController::class, 'index'])->name('admin.forms.index');
    Route::get('/forms/create', [AdminFormController::class, 'create']);
    Route::post('/forms', [AdminFormController::class, 'store']);

    // EDIT FORM
    // Route::get('/forms/{form}/edit', [AdminFormController::class, 'edit']);
    // Route::put('/forms/{form}', [AdminFormController::class, 'update']);

    Route::get('/forms/{form}/responses', [AdminFormController::class, 'responses'])->name('admin.forms.responses');
    Route::get('/responses/{response}', [AdminFormController::class, 'showResponse']);
});
Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/dashboard', [UserFormController::class, 'list'])->name('forms.list');
Route::get('/form/{id}', [UserFormController::class, 'show']);
Route::post('/form/{id}', [UserFormController::class, 'submit']);
