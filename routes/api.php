<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;

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

//User Routes
Route::post('/user/create', [UserController::class, 'create']);
Route::post('/user/login', [UserController::class, 'login']);
Route::post('/user/logout', [UserController::class, 'logout']);
Route::get('/user/{id}', [UserController::class, 'getUserById']);
Route::patch('/user/update-password/{id}', [UserController::class, 'updatePassword']);
Route::patch('/user/update-email/{id}', [UserController::class, 'updateEmail']);
// Route::patch('/user/reset-password/{id}', [UserController::class, 'resetPassword']);

Route::post('/search', [SearchController::class, 'searchProfile']);

//Profile Routes
Route::post('/profile/create', [ProfileController::class, 'create']);
Route::get('/profile/{id}', [ProfileController::class, 'getProfileById']);
Route::patch('/profile/{id}', [ProfileController::class, 'updateProfileById']);
Route::delete('/profile/{id}', [ProfileController::class, 'deleteProfileById']);


Route::group(['middleware' => ['auth:sanctum']], function(){
});


