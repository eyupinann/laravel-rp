<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\NotificationController;



//Auth
Route::group(['prefix' => 'user'], function () {
    Route::post('register', [AuthController::class, 'create']);
    Route::post('login', [AuthController::class, 'login']);
});


Route::group(['middleware' => ['auth:api', 'role']], function () {
    Route::get('me', [AuthController::class, 'detail']);

    //push
    Route::get('push', [NotificationController::class, 'push']);
    Route::get('push-detail/{id}', [NotificationController::class, 'push_detail']);
    Route::post('push-create', [NotificationController::class, 'push_create']);
    Route::post('push-edit/{id}', [NotificationController::class, 'push_edit']);
    Route::get('push-destroy/{id}', [NotificationController::class, 'push_destroy']);

});
