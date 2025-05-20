<?php

use App\Modules\Note\Controllers\CreateNoteController;
use App\Modules\Note\Controllers\DeleteNoteController;
use App\Modules\Note\Controllers\RestoreNoteController;
use App\Modules\Note\Controllers\UpdateNoteController;
use Illuminate\Support\Facades\Route;
use App\Modules\Note\Controllers\ListNotesController;
use App\Modules\Note\Controllers\GetNoteController;

# Auth routes
Route::middleware('auth:sanctum', 'api')->group(function () {
    Route::get('notes', ListNotesController::class)->name('notes.list');
    Route::post('/notes', CreateNoteController::class)->name('notes.create');
    Route::get('notes/{note}', GetNoteController::class)->name('notes.show');
    Route::put('notes/{note}', UpdateNoteController::class)->name('notes.update');
    Route::delete('notes/{note}', DeleteNoteController::class)->name('notes.destroy');
    Route::post('/notes/{note}/restore', RestoreNoteController::class)->name('notes.restore');
});
