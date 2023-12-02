<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ModulesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/master', function () {
    return view('Firebase.master');  // Update to the correct view name for the landing page
});

Route::get('modules', [ModulesController::class, 'index']);

Route::get ('add-modules', [ModulesController::class, 'create']);
Route::post ('add-modules', [ModulesController::class, 'store']);
Route::get ('edit-modules/{Module_ID}', [ModulesController::class, 'edit']);
Route::put ('update-modules/{Module_ID}', [ModulesController::class, 'update']);
Route::delete ('delete-modules/{Module_ID}', [ModulesController::class, 'delete']);







Route::get('/logout', [LoginController::class, 'logout'])->name('logout');



Route::get('users', [UsersController::class, 'index']);

Route::get ('add-users', [UsersController::class, 'create']);
Route::post ('add-users', [UsersController::class, 'store']);
Route::get ('edit-users/{id}', [UsersController::class, 'edit']);
Route::put ('update-users/{id}', [UsersController::class, 'update']);
Route::get ('delete-users/{id}', [UsersController::class, 'delete']);






Route::get('/', function () {
    return view('login');
});


