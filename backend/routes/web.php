<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ChatMessageController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('v1')->group(function () {


    Route::middleware([
        // 'auth'
        // TODO: Понять как делать авторизацию и сохранение сессии для REST API
        ])->group(function () {
        Route::apiResource('user', UserController::class)->except(['index', 'store']);
        Route::apiResource('settings', UserController::class)->except(['index', 'store']);
        Route::apiResource('chat', ChatController::class);
        Route::apiResource('chat.message', ChatMessageController::class)->except('show');
        Route::apiResource('message', MessageController::class)->except(['store', 'show', 'update']);

        // Route::apiResource('user.chat.users', UserChatUserController::class)->only('index');
        // Route::apiResource('user.chat.user.message', UserChatUserMessageController::class)->only('index');
    });
});
