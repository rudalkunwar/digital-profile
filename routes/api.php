<?php

use App\Http\Controllers\AcademicLevelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//for Academic Level
Route::get('/AcademicLevel', [AcademicLevelController::class, 'index']);
Route::get('/AcademicLevel/{id}', [AcademicLevelController::class, 'show']);
Route::post('/AcademicLevel/add', [AcademicLevelController::class, 'store']);
Route::post('/AcademicLevel/{id}/update',[AcademicLevelController::class, 'update']); 
Route::delete('/AcademicLevel/{id}/delete', [AcademicLevelController::class, 'destroy']);
