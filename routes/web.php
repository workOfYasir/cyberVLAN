<?php

use App\Http\Controllers\Auth\SocialiteLoginController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AccessmentController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostDetailController;
use App\Http\Controllers\PostProposalController;
use App\Http\Controllers\Services\CategoryController;
use App\Http\Controllers\Services\ServiceController;
use App\Http\Controllers\Socialite\GoogleController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TwoFactorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Middleware\TwoFactorVerify;
use App\Http\Middleware\ApproveStatus;
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






// Chat
Route::view('chat','chat.messages');

// Front End Routes
Route::get('/', [PostDetailController::class, 'show'])->name('home');
Route::get('/verify', [UsersController::class, 'varify'])->name('verify');
Route::get('/referral', [UsersController::class, 'referral'])->name('referral');

Route::get('/public_profile/{uuid}', [UsersController::class, 'public_profile'])->name('public_profile');


Route::middleware(['auth', 'verified', 'two_factor'])->group(function () {
    Route::get('/profile/{uuid}', [UsersController::class, 'profile'])->name('profile');
}); 

//
Route::middleware(['auth', 'verified', 'two_factor','approveStatus'])->group(function () {
    
 
    Route::prefix('freelancer')->name('freelancer.')->group(function () {
        Route::get('list', [UsersController::class, 'freelancerList'])->name('list');
    });
    Route::prefix('client')->name('client.')->group(function () {
        Route::get('list', [UsersController::class, 'clientList'])->name('list');
    });
    //post
    Route::prefix('post')->name('post.')->group(function () {
        Route::get('create', [PostController::class, 'create'])->name('create');
        Route::post('store', [PostController::class, 'store'])->name('store');
        Route::get('detail/{id}', [PostDetailController::class, 'detail'])->name('detail');
        Route::get('list',[PostDetailController::class,'list'])->name('list');
        Route::post('propsal',[PostProposalController::class,'propsal'])->name('propsal');
    });
});





//google
Route::prefix('google')->name('google.')->group(function () {
    Route::get('login', [GoogleController::class, 'loginWithGoogle'])->name('login');
    Route::get('callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
});

// Two Factor Authentication
Route::get('2fa', [TwoFactorController::class, 'showTwoFactorForm'])->name('2fa');
Route::post('2fa', [TwoFactorController::class, 'verifyTwoFactor'])->name('2fa');;

// Back End Routes
Route::middleware(['auth', 'verified', 'two_factor'])->group(function () {
    Route::get('/dashboard', [UsersController::class, 'home'])->name('dashboard');

    Route::post('profile_update', [UsersController::class, 'profile_update'])->name('profile_update');

    Route::prefix('category')->name('category.')->group(function () {
        Route::get('show', [CategoryController::class, 'index'])->name('index');
        Route::post('store', [CategoryController::class, 'store'])->name('store');
        Route::post('delete/{id}', [CategoryController::class, 'remove'])->name('delete');
        Route::get('edit/{id}', [CategoryController::class, 'change'])->name('edit');
        Route::post('update', [CategoryController::class, 'update'])->name('update');
    });

    Route::prefix('service')->name('service.')->group(function () {
        Route::get('show', [ServiceController::class, 'index'])->name('index');
        Route::post('store', [ServiceController::class, 'store'])->name('store');
        Route::post('delete/{id}', [ServiceController::class, 'remove'])->name('delete');
        Route::get('edit/{id}', [ServiceController::class, 'change'])->name('edit');
        Route::post('update', [ServiceController::class, 'update'])->name('update');
    });

    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);



    Route::prefix('users')->name('users.')->group(function () {
        Route::get('show', [UsersController::class, 'index'])->name('index');
        Route::post('store', [UsersController::class, 'store'])->name('store');
        Route::post('delete/{id}', [UsersController::class, 'destroy'])->name('destroy');
        Route::get('edit/{id}', [UsersController::class, 'change'])->name('edit');
        Route::post('update', [UsersController::class, 'update'])->name('update');
        Route::post('approve',[UsersController::class,'approve'])->name('approve');
    });

    Route::prefix('accessments')->name('accessments.')->group(function () {
        Route::get('show', [AccessmentController::class, 'index'])->name('index');
        Route::get('store', [AccessmentController::class, 'store'])->name('store');
    });
});
// End Back End Routes


// /**
//  * Socialite login using Google service
//  * https://laravel.com/docs/8.x/socialite
//  */

Route::get('/auth/redirect/{provider}', [SocialiteLoginController::class, 'redirect']);
require __DIR__ . '/auth.php';
