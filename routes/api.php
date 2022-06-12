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
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RuleRankController;
use App\Http\Controllers\ImageMessyController;

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
    Route::post('me', 'me');
});


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('test', function(){
    return 'test ok';
});


Route::post('upload-image-messy', [ImageMessyController::class,'uploadImageMessy']);  //ok
Route::apiResource('post', PostController::class);  //ok
Route::get('get-post-custom', [PostController::class,'getPostCustom']);  //ok  // phân trang bài viết
Route::get('get-post-custom-new', [PostController::class,'getPostCustomNew']);  //ok  Lấy bài viết mới nhất, cũ nhất
Route::post('post/get-comment-by-id-post',  [CommentsController::class  , 'getComment']);  //ok
Route::apiResource('title-type', TitleTypeController::class);  //ok
Route::apiResource('settings', SettingsController::class);  //ok
Route::apiResource('organization', OrganizationController::class); //ok
Route::apiResource('hash-tag', HashtagController::class); //ok
Route::apiResource('credit-cart', CreditCartController::class); //ok
Route::apiResource('icon-rank', IconRankController::class); //ok
Route::apiResource('donate', DonateController::class); // ok
Route::apiResource('rule-ranks', RuleRankController::class);//ok
Route::apiResource('comment', CommentsController::class);
Route::apiResource('user-icon-rank', UserIconRankController::class);//Ok
Route::apiResource('user', UserController::class);//ok



Route::apiResource('user-feel', UserFeelController::class);
Route::apiResource('react', ReactController::class);
Route::apiResource('group-permission', GroupPermissionController::class);
Route::apiResource('permission', PermissionController::class);



//LINK API DOC
//https://docs.google.com/spreadsheets/d/1sjvm56yQZQzBoNEccidzOWr436-Q3r2pLxRKtTifa1w/edit#gid=1687574333
