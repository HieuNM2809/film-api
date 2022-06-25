<?php

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
use App\Http\Controllers\ImageMessyController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\IndexController;

use App\http\Controllers\Admin;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('send-mail-forget-password',  [MailController::class  , 'sendMailForgetPassword']);  //ok sen mail forget password
Route::post('comfirm-token-forget-password',  [MailController::class  , 'confirmTokenForgetPassword']);  //ok confirm token forget password

Route::prefix('admin')->group(function () {
    Route::get('/', [IndexController::class,'index']);
    Route::resource('comment', Admin\CommentController::class);




//====================  Chưa làm  ===============================

    Route::get('get-token', function () {
        return view('pages.login');
    });
    Route::get('login', function () {
        return view('pages.login');
    });
    Route::post('login', function () {
        return view('pages.login');
    });
    Route::get('register', function () {
        return view('pages.register');
    });
    Route::post('register', function () {
        return view('pages.register');
    });

    Route::resource('title-type', TitleTypeController::class);
    Route::resource('icon-rank', IconRankController::class);
    Route::resource('user-icon-rank', UserIconRankController::class);
    Route::resource('settings', SettingsController::class);
    // Route::resource('comment', CommentsController::class);
    Route::resource('post', PostController::class);
    Route::resource('user', UserController::class);
    Route::resource('organization', OrganizationController::class);
    Route::resource('user-feel', UserFeelController::class);
    Route::resource('donate', DonateController::class);
    Route::resource('react', ReactController::class);
    Route::resource('group-permission', GroupPermissionController::class);
    Route::resource('hash-tag', HashtagController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('credit-cart', CreditCartController::class);

});
Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
