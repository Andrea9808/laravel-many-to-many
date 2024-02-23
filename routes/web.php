<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TypeController;
use App\Http\Controllers\ProjectController;

Route::get('/', [ProjectController::class, 'index'])
    ->name('project.index');

Route::get('/types', [TypeController::class, 'index'])
    ->name('type.index');
