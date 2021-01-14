<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () { return redirect()->route('posts.index'); })->name('/');

Route::match(['GET', 'POST'], 'login', [AuthenticationController::class, 'login'])->name('login');
Route::match(['GET', 'POST'], 'register', [AuthenticationController::class, 'register'])->name('register');

Route::resource('posts', PostController::class);

Route::middleware('auth')->group(function () {
    Route::get('users/{user}/posts', [UserController::class, 'posts'])->name('users.posts');
    Route::patch('posts/{post}/approve', [PostController::class, 'approve'])->name('posts.approve');

    Route::get('/mail', [MailController::class, 'create'])->name('mail.create');
    Route::post('/mail', [MailController::class, 'send'])->name('mail.send');

    Route::post('logout', [AuthenticationController::class, 'logout'])->name('logout');
});
