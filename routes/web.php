<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ReagenController;
use App\Http\Controllers\ReagenKulturController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\User;
use App\Http\Middleware\Manager;

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


Auth::routes();

//Route Admin   

Route::get('history', [HistoryController::class, 'dashboard'])->name('user');
Route::group(['middleware' => 'manager'],function(){

    Route::get('home', [ReagenController::class, 'dashboard'])->name('home');  
    Route::prefix('reagen')->group(function(){
        Route::get('/', [ReagenController::class, 'index']);
    });
    Route::prefix('reagen-kultur')->group(function(){  
        Route::get('/', [ReagenKulturController::class, 'index']);
    });

    Route::get('edit-manager/{id}', [AdminController::class, 'edit']);
    Route::post('edit-manager/{id}', [AdminController::class, 'update_manager']);
   
});
Route::group(['middleware' => 'admin'],function(){

    Route::get('admin', [ReagenController::class, 'dashboard'])->name('admin');
    Route::prefix('reagena')->group(function(){
        Route::get('/', [ReagenController::class, 'index']);
        Route::get('create', [ReagenController::class, 'create']);
        Route::post('create', [ReagenController::class, 'insert']);
        Route::get('edit/{id}', [ReagenController::class, 'edit']);
        Route::post('edit/{id}', [ReagenController::class, 'update_logistic']);
        Route::get('delete/{id}', [ReagenController::class, 'delete']);
    });

    Route::prefix('reagena-kultur')->group(function(){
        Route::get('/', [ReagenKulturController::class, 'index']);
        Route::get('create', [ReagenKulturController::class, 'create']);
        Route::post('create', [ReagenKulturController::class, 'insert']);
        Route::get('edit/{id}', [ReagenKulturController::class, 'edit']);
        Route::post('edit/{id}', [ReagenKulturController::class, 'update_logistic']);
        Route::get('delete/{id}', [ReagenKulturController::class, 'delete']);
    });
       
    Route::get('exp_excel', [ReagenController::class, 'export_items']);
    Route::post('import', [ReagenController::class, 'import']);
    

    Route::get('exp_excel_kultur', [ReagenKulturController::class, 'export_items']);
    Route::post('import_kultur', [ReagenKulturController::class, 'import']);

    Route::prefix('user-data')->group(function(){
        Route::get('/', [AdminController::class, 'all']);
        Route::get('create', [AdminController::class, 'add']);
        Route::post('tambah', [AdminController::class, 'tambah']);
        Route::get('edit/{id}', [AdminController::class, 'edit']);
        Route::post('edit/{id}', [AdminController::class, 'update']);
        Route::get('delete/{id}', [AdminController::class, 'delete']);
    });
});

Route::group(['middleware' => 'user'],function(){

    Route::get('user', [ReagenController::class, 'dashboard'])->name('user');
    Route::prefix('reagenu')->group(function(){
        Route::get('/', [ReagenController::class, 'index']);
        Route::get('edit/{id}', [ReagenController::class, 'edit']);
        Route::post('edit/{id}', [ReagenController::class, 'update_user']);
    });
    Route::prefix('reagenu-kultur')->group(function(){
        Route::get('/', [ReagenKulturController::class, 'index']);
        Route::get('edit/{id}', [ReagenKulturController::class, 'edit']);
        Route::post('edit/{id}', [ReagenKulturController::class, 'update_user']);
    });

    Route::get('edit-user/{id}', [AdminController::class, 'edit']);
    Route::post('edit-user/{id}', [AdminController::class, 'update_user']);
});

Route::group(['middleware' => 'user-riset'],function(){

    Route::get('user-riset', [ReagenController::class, 'dashboard'])->name('user');
    Route::prefix('reagenr-riset')->group(function(){
        Route::get('/', [ReagenController::class, 'index']);
        Route::get('edit/{id}', [ReagenController::class, 'edit']);
        Route::post('edit/{id}', [ReagenController::class, 'update_user']);
    });
    Route::get('edit-riset/{id}', [AdminController::class, 'edit']);
    Route::post('edit-riset/{id}', [AdminController::class, 'update_riset']);
    
});


Route::group(['middleware' => 'user-kultur'],function(){

    Route::get('user-kultur', [ReagenController::class, 'dashboard'])->name('user');

    Route::prefix('reagenk-kultur')->group(function(){
        Route::get('/', [ReagenKulturController::class, 'index']);
        Route::get('edit/{id}', [ReagenKulturController::class, 'edit']);
        Route::post('edit/{id}', [ReagenKulturController::class, 'update_user']);
    });
    Route::get('edit-kultur/{id}', [AdminController::class, 'edit']);
    Route::post('edit-kultur/{id}', [AdminController::class, 'update_kultur']);
});
