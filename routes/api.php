<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\OptionController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/update', [AuthController::class, 'update']);
    Route::group(['middleware' => CheckRole::class], function () {
        Route::get('/user', [AuthController::class, 'get']);
        Route::post('/changerole', [AuthController::class, 'changerole']);
        Route::post('/category', [CategoryController::class, 'insert']);
        Route::post('/category/{id}/update', [CategoryController::class, 'update']);
        Route::post('/category/{id}/delete', [CategoryController::class, 'delete']);
        Route::post('/lesson', [LessonController::class, 'insert']);
        Route::post('/lesson/{id}/update', [LessonController::class, 'update']);
        Route::post('/lesson/{id}/delete', [LessonController::class, 'delete']);
        Route::post('/chapter', [ChapterController::class, 'insert']);
        Route::post('/chapter/{id}/update', [ChapterController::class, 'update']);
        Route::post('/chapter/{id}/delete', [ChapterController::class, 'delete']);
        Route::post('/question', [QuestionController::class, 'insert']);
        Route::post('/question/{id}/update', [QuestionController::class, 'update']);
        Route::post('/question/{id}/delete', [QuestionController::class, 'delete']);
        Route::post('/option', [OptionController::class, 'insert']);
        Route::post('/option/{id}/update', [OptionController::class, 'update']);
        Route::post('/option/{id}/delete', [OptionController::class, 'delete']);
    });
});

Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});

Route::get('/category', [CategoryController::class, 'get']);
Route::get('/lesson', [LessonController::class, 'get']);
Route::get('/chapter', [ChapterController::class, 'get']);
Route::get('/question', [QuestionController::class, 'get']);
Route::get('/category/{id}', [CategoryController::class, 'getLessonByCategoryId']);
Route::get('/lesson/{id}', [LessonController::class, 'getChapterByLessonId']);
Route::get('/chapter/{id}', [ChapterController::class, 'getAllQuestionByChapterId']);
Route::get('/question/{id}', [QuestionController::class, 'getOptionByQuestionId']);
Route::get('/option', [OptionController::class, 'get']);
Route::get('/option/{id}', [OptionController::class, 'getById']);
Route::post('/question/{id}/answer', [OptionController::class, 'answer']);
