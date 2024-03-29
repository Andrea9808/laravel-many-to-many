<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TypeController;
use App\Http\Controllers\ProjectController;

Route::get('/', [ProjectController::class, 'index'])
    ->name('project.index');

Route::get('/types', [TypeController::class, 'index'])
    ->name('type.index');

//create
Route::get('/create',[ProjectController::class, 'create'])
    ->name('project.create');

//store
Route::post('/create',[ProjectController::class, 'store'])
    ->name('project.store');

//edit
Route::get('/edit/{id}',[ProjectController::class, 'edit'])
    ->name('project.edit');

//update
Route::put('/edit/{id}',[ProjectController::class, 'update'])
    ->name('project.update');

//update
Route::get('/project/{id}',[ProjectController::class, 'show'])
    ->name('project.show');

//delete
Route::delete('/project/{id}/delete',[ProjectController::class, 'delete'])
    ->name('project.delete');
