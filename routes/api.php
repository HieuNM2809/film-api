<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\CreditCartController;
use  App\Http\Controllers\DonateController;
use App\Http\Controllers\GroupPermissionController;
use App\Http\Controllers\HashtagController;
use App\Http\Controllers\IconRankController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReactController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TitleTypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserFeelController;
use App\Http\Controllers\UserIconRankController;

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
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('test', function(){
    return 'test ok';
});

Route::apiResource('post', PostController::class);
Route::post('post/get-comment-by-id-post',  [CommentsController::class  , 'getComment']);


Route::apiResource('title-type', TitleTypeController::class);
Route::apiResource('icon-rank', IconRankController::class);
Route::apiResource('user-icon-rank', UserIconRankController::class);
Route::apiResource('settings', SettingsController::class);
Route::apiResource('comment', CommentsController::class);
Route::apiResource('user', UserController::class);
Route::apiResource('organization', OrganizationController::class);
Route::apiResource('user-feel', UserFeelController::class);
Route::apiResource('donate', DonateController::class);
Route::apiResource('react', ReactController::class);
Route::apiResource('group-permission', GroupPermissionController::class);
Route::apiResource('hash-tag', HashtagController::class);
Route::apiResource('permission', PermissionController::class);
Route::apiResource('credit-cart', CreditCartController::class);
