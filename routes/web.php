<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RepliesController;
use App\Http\Controllers\DiscussionController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('discussions', DiscussionController::class);


Route::resource('discussions/{discussion}/replies', RepliesController::class);

Route::get('users/notifications', [UsersController::class, 'notifications'])->name('users.notifications');

Route::post('discussions/{discussion}/replies/{reply}/mark-as-best_reply', [DiscussionController::class, 'reply'])->name('discussions.best-reply');