<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppInfoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProjectCategoryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectImageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceImageController;
use App\Http\Controllers\ServiceTypeController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;

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

/* Route::middleware('auth:sanctum')->get('/user/me', function (Request $request) {
    return $request->user();
}); */


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);


Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/password', [AuthController::class, 'password']);

    Route::prefix('user')->group(function() {
        Route::get('/', [UserController::class, 'index']);
        Route::post('/', [UserController::class, 'store']);
        Route::get('/{id}', [UserController::class, 'show']);
        Route::post('/{id}', [UserController::class, 'update']);
        Route::delete('/{id}', [UserController::class, 'delete']);
    });


    Route::prefix('app-info')->group(function() {
        Route::get('/', [AppInfoController::class, 'index']);
        Route::post('/', [AppInfoController::class, 'store']);
        Route::post('/{id}', [AppInfoController::class, 'update']);
    });
    
    Route::prefix('role')->group(function() {
        Route::get('/', [RoleController::class, 'index']);
        Route::post('/', [RoleController::class, 'store']);
        Route::get('/{id}', [RoleController::class, 'show']);
        Route::put('/{id}', [RoleController::class, 'update']);
        Route::delete('/{id}', [RoleController::class, 'delete']);
    });

    Route::prefix('category')->group(function() {
        Route::get('/', [CategoryController::class, 'index']);
        Route::post('/', [CategoryController::class, 'store']);
        Route::get('/{id}', [CategoryController::class, 'show']);
        Route::put('/{id}', [CategoryController::class, 'update']);
        Route::delete('/{id}', [CategoryController::class, 'delete']);
    });

    Route::prefix('type')->group(function() {
        Route::get('/', [TypeController::class, 'index']);
        Route::post('/', [TypeController::class, 'store']);
        Route::get('/{id}', [TypeController::class, 'show']);
        Route::put('/{id}', [TypeController::class, 'update']);
        Route::delete('/{id}', [TypeController::class, 'delete']);
    });

    Route::prefix('permission')->group(function() {
        Route::get('/', [PermissionController::class, 'index']);
        Route::post('/', [PermissionController::class, 'store']);
        Route::get('/{id}', [PermissionController::class, 'show']);
        Route::put('/{id}', [PermissionController::class, 'update']);
        Route::delete('/{id}', [PermissionController::class, 'delete']);
    });


    Route::prefix('project')->group(function() {
        Route::get('/', [ProjectController::class, 'index']);
        Route::post('/', [ProjectController::class, 'store']);
        Route::get('/{id}', [ProjectController::class, 'show']);
        Route::post('/{id}', [ProjectController::class, 'update']);
        Route::delete('/{id}', [ProjectController::class, 'delete']);
    });

    Route::prefix('project-category')->group(function() {
        Route::get('/project/{id}', [ProjectCategoryController::class, 'indexById']);
        Route::post('/', [ProjectCategoryController::class, 'store']);
        Route::get('/{id}', [ProjectCategoryController::class, 'show']);
        Route::post('/{id}', [ProjectCategoryController::class, 'update']);
        Route::delete('/{id}', [ProjectCategoryController::class, 'delete']);
    });

    Route::prefix('project-images')->group(function() {
        Route::get('/', [ProjectImageController::class, 'index']);
        Route::get('/project-id/{id}', [ProjectImageController::class, 'indexById']);
        Route::post('/', [ProjectImageController::class, 'store']);
        Route::get('/{id}', [ProjectImageController::class, 'show']);
        Route::post('/{id}', [ProjectImageController::class, 'update']);
        Route::delete('/{id}', [ProjectImageController::class, 'delete']);
    });

    Route::prefix('service')->group(function() {
        Route::get('/', [ServiceController::class, 'index']);
        Route::post('/', [ServiceController::class, 'store']);
        Route::get('/{id}', [ServiceController::class, 'show']);
        Route::post('/{id}', [ServiceController::class, 'update']);
        Route::delete('/{id}', [ServiceController::class, 'delete']);
    });

    Route::prefix('service-type')->group(function() {
        Route::get('/service-type/{id}', [ServiceTypeController::class, 'indexById']);
        Route::post('/', [ServiceTypeController::class, 'store']);
        Route::get('/{id}', [ServiceTypeController::class, 'show']);
        Route::post('/{id}', [ServiceTypeController::class, 'update']);
        Route::delete('/{id}', [ServiceTypeController::class, 'delete']);
    });

    Route::prefix('service-images')->group(function() {
        Route::get('/', [ServiceImageController::class, 'index']);
        Route::get('/service-id/{id}', [ServiceImageController::class, 'indexById']);
        Route::post('/', [ServiceImageController::class, 'store']);
        Route::get('/{id}', [ServiceImageController::class, 'show']);
        Route::post('/{id}', [ServiceImageController::class, 'update']);
        Route::delete('/{id}', [ServiceImageController::class, 'delete']);
    });


});



