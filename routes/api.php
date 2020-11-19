<?php

use App\Http\Controllers\User\AuthenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/login-error', function () {
    return [
        'code' => 403,
        'message' => 'error',
    ];
})->name('login');

Route::prefix('user')->name('user.')->group(function () {

    /*
     * Authentication User Api
     * */
    Route::prefix('auth')->group(function () {

        Route::post('register', [AuthenticationController::class, 'register'])->name('auth.register');
        Route::post('login', [AuthenticationController::class, 'login'])->name('auth.login');
    });;
});
