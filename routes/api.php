<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\YourControllerName;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(UserController::class)->group(function(){
    Route::post('login', 'loginUser');
});

Route::controller(UserController::class)->group(function(){
    Route::get('user', 'getUserDetail');
    Route::get('logout', 'userLogout');
})->middleware('auth:api');

// Route::get('/user', [UserController::class, 'index']);
// Route::get('/user/{id}', [UserController::class, 'show']);
// Route::post('/user', [UserController::class, 'store']);
// Route::put('/user/{id}', [UserController::class, 'update']);
// Route::delete('/user/{id}', [UserController::class, 'destroy']);


Route::post('/uploadfile', [FileController::class, 'uploadFile']);
Route::get('/downloadfile', [FileController::class, 'downloadFile']);

Route::get('/yourname', [YourControllerName::class, 'index']);
Route::post('/yourname', [YourControllerName::class, 'store']);
