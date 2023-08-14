<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\MainController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CompletedRecipeController;
use App\Http\Controllers\UserRegisterController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [AuthController::class, 'index'])->name('front.index');
Route::post('/login', [AuthController::class, 'login']);
//Route::post('/login', [AuthController::class, 'guestLogin']);

//ユーザー登録
Route::prefix('/user')->group(function () {
    Route::get('/register', [UserRegisterController::class, 'index'])->name('front.user.register');
    Route::post('/register', [UserRegisterController::class, 'register']);
});

Route::get('/main/menu', [MainController::class, 'index']);

Route::get('/archive/data', [ArchiveController::class, 'list']);

// 認可処理
Route::middleware(['auth'])->group(function () {
    Route::prefix('/recipe')->group(function () {
        Route::get('/list', [RecipeController::class, 'list']);
        Route::post('/list', [RecipeController::class, 'register']);
        Route::get('/detail/{recipe_id}', [RecipeController::class, 'detail'])->whereNumber('recipe_id')->name('detail');
        Route::get('/edit/{recipe_id}', [RecipeController::class, 'edit'])->whereNumber('recipe_id')->name('edit');
        Route::put('/edit/{recipe_id}', [RecipeController::class, 'editSave'])->whereNumber('recipe_id')->name('edit_save');
        Route::delete('/delete/{recipe_id}', [RecipeController::class, 'delete'])->whereNumber('recipe_id')->name('delete');
        Route::post('/complete/{recipe_id}', [RecipeController::class, 'complete'])->whereNumber('recipe_id')->name('complete');
        //Route::get('/completed_list', [CompletedRecipeController::class, 'list']);
    });
    // 完了タスクリスト
    Route::get('/recipe/completed_list', [CompletedRecipeController::class, 'list']);
    //
    Route::get('/logout', [AuthController::class, 'logout']);
});