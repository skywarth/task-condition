<?php

use App\Http\Controllers\LocaleController;

/*
 * Global Routes
 *
 * Routes that are used between both frontend and backend.
 */

// Switch between the included languages
Route::get('lang/{lang}', [LocaleController::class, 'change'])->name('locale.change');

/*
 * Frontend Routes
 */
Route::group(['as' => 'frontend.'], function () {
    includeRouteFiles(__DIR__.'/frontend/');
});

/*
 * Backend Routes
 *
 * These routes can only be accessed by users with type `admin`
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    includeRouteFiles(__DIR__.'/backend/');
});



Route::prefix('tasks')->group(function () {
    Route::get('/test', [\App\Http\Controllers\TaskController::class,'test']);
    Route::get('/listAll', [\App\Http\Controllers\TaskController::class,'listAll']);
    Route::get('/addCondition/{id}', [\App\Http\Controllers\TaskController::class,'addConditionView']);
    Route::post('/addCondition', [\App\Http\Controllers\TaskController::class,'addCondition']);
});

Route::resource('tasks', \App\Http\Controllers\TaskController::class);


