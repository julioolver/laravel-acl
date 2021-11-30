<?php

use App\Http\Controllers\Manager\ResourceController;
use App\Http\Controllers\Manager\RoleController;
use App\Http\Controllers\Manager\UserController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\ThreadController;
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

Route::get('/', function () {
    return redirect()->route('threads.index');
});

Route::group(['middleware' => 'access.control.list'], function () {
    Route::resource('threads', ThreadController::class);
});

Route::group(['middleware' => 'auth', 'prefix' => 'manager'], function(){
	Route::get('/', function(){
		return redirect()->route('users.index');
	});

	Route::resource('roles', RoleController::class);
	Route::get('roles/{role}/resources', [RoleController::class,'syncResources'])->name('roles.resources');
	Route::put('roles/{role}/resources', [RoleController::class,'updateSyncResources'])->name('roles.resources.update');

	Route::resource('users', UserController::class);
	Route::resource('resources', ResourceController::class);
});

Route::resource('replies', ReplyController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
