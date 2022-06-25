<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\CreditCartController;
use App\Http\Controllers\DonateController;
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
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\UserOrganizationsController;
use App\Http\Controllers\MailController;

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
// đăng nhập google android
Route::post('register-google-mobile',  [UserController::class,'registerGoogleMobile']);


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
Route::post('get-post-with-user', [PostController::class,'getPostWithUser']);  //ok  Lấy bài viết theo user
Route::post('get-post-with-title', [PostController::class,'getPostWithTitle']);  //ok  Lấy bài viết theo title
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
Route::get('search-user-post-titletype',  [PostController::class  , 'searchUserPostTitletype']);  //ok multi search theo user + tiêu đề bài viết + chủ đề
// post custom v2
Route::prefix('post')->group(function () {
    Route::post('save-post-by-user',  [UserPostController::class  , 'savePostByUser']);  //ok lưu bài viết
    Route::post('report-post',  [PostController::class  , 'reportPost']);  //ok report post
    Route::post('un-save-post-by-user',  [UserPostController::class  , 'unSavePostByUser']);  //ok bỏ lưu bài viết
    Route::post('list-post-by-user',  [UserPostController::class  , 'listPostByUser']);  //ok danh sách bài viết đã lưu theo user id
    Route::post('search-like-all',  [PostController::class  , 'searchLikeAll']);  //ok tìm kiếm
});
// comment custom v2
Route::prefix('comment')->group(function () {
    Route::post('comment-by-id-post',  [CommentsController::class  , 'commentByIdPost']);  //ok get comment by id post
    Route::post('comment-by-id-user',  [CommentsController::class  , 'commentByIdUser']);  //ok get comment by id user
});
//thêm thành viên vào tổ chức - xoá thành viên khỏi tổ chức -
Route::apiResource('user-organizations', UserOrganizationsController::class);//ok
// Danh sách tổ chức by user
Route::post('list-organizations-by-id-user',  [UserOrganizationsController::class  , 'listOrganizationsByIdUser']);  //ok
// danh sách user trong tổ chức
Route::post('list-user-by-id-organizations',  [UserOrganizationsController::class  , 'listUserByIdOrganizations']);  //ok

Route::post('send-mail-forget-password',  [MailController::class  , 'sendMailForgetPassword']);  //ok send mail forget password
Route::post('comfirm-token-forget-password',  [MailController::class  , 'confirmTokenForgetPassword']);  //ok confirm token forget password

Route::post('search-user',  [UserController::class  , 'searchUser']);  //ok search theo user
Route::post('search-title-type',  [TitleTypeController::class  , 'searchTitleType']);  //ok search title type










Route::apiResource('user-feel', UserFeelController::class);
Route::apiResource('react', ReactController::class);
Route::apiResource('group-permission', GroupPermissionController::class);
Route::apiResource('permission', PermissionController::class);



//LINK API DOC
//https://docs.google.com/spreadsheets/d/1sjvm56yQZQzBoNEccidzOWr436-Q3r2pLxRKtTifa1w/edit#gid=1687574333
