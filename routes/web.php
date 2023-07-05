<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\MainController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CompletedRecipeController;

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

Route::get('/main/menu', [MainController::class, 'index']);

Route::get('/archive/data', [ArchiveController::class, 'index']);

// 認可処理
Route::middleware(['auth'])->group(function () {
    Route::prefix('/recipe')->group(function () {
        Route::get('/list', [RecipeController::class, 'list']);
        Route::post('/register', [RecipeController::class, 'register']);
        Route::get('/detail/{recipe_id}', [RecipeController::class, 'detail'])->whereNumber('recipe_id')->name('detail');
        Route::get('/edit/{recipe_id}', [RecipeController::class, 'edit'])->whereNumber('recipe_id')->name('edit');
        Route::put('/edit/{recipe_id}', [RecipeController::class, 'editSave'])->whereNumber('recipe_id')->name('edit_save');
        Route::delete('/delete/{recipe_id}', [RecipeController::class, 'delete'])->whereNumber('recipe_id')->name('delete');
        Route::post('/complete/{recipe_id}', [RecipeController::class, 'complete'])->whereNumber('recipe_id')->name('complete');
    });
    // 完了タスクリスト
    Route::get('/completed_recipes/list', [CompletedRecipeController::class, 'list']);
    //
    Route::get('/logout', [AuthController::class, 'logout']);
});