<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppInfoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProjectCategoryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/auth-check', [AuthController::class, 'auth_user']);

Route::prefix('app-info')->group(function() {
    Route::get('/', [AppInfoController::class, 'index']);
});

Route::prefix('user')->group(function() {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/{id}', [UserController::class, 'show']);
});

Route::prefix('role')->group(function() {
    Route::get('/', [RoleController::class, 'index']);
    Route::get('/{id}', [RoleController::class, 'show']);
});

Route::prefix('category')->group(function() {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/{id}', [CategoryController::class, 'show']);
});

Route::prefix('type')->group(function() {
    Route::get('/', [TypeController::class, 'index']);
    Route::get('/{id}', [TypeController::class, 'show']);
});

Route::prefix('permission')->group(function() {
    Route::get('/', [PermissionController::class, 'index']);
    Route::get('/{id}', [PermissionController::class, 'show']);
});

Route::prefix('project')->group(function() {
    Route::get('/', [ProjectController::class, 'index']);
    Route::get('/category/{id}', [ProjectController::class, 'indexById']);
    Route::get('/latest', [ProjectController::class, 'indexLatest']);
    Route::get('/{id}', [ProjectController::class, 'show']);
});

Route::prefix('project-category')->group(function() {
    Route::get('/', [ProjectCategoryController::class, 'index']);
    Route::get('/{id}', [ProjectCategoryController::class, 'indexById']);
});


Route::prefix('service')->group(function() {
    Route::get('/', [ServiceController::class, 'index']);
    Route::get('/type/{id}', [ServiceController::class, 'indexById']);
    Route::get('/{id}', [ServiceController::class, 'show']);
});

Route::prefix('user')->group(function() {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/{id}', [UserController::class, 'show']);
});



