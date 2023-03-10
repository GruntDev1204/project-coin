<?php

use App\Http\Controllers\AdminManagerController;
use App\Http\Controllers\IntroduceSndgController;
use App\Http\Controllers\LinkController;
use App\Models\AdminManager;
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
Route::get('/', function(){
    return view('welcome');
});

Route::get('/JoinSndg', [AdminManagerController::class, 'FormAddView']);
Route::post('/JoinSndg', [AdminManagerController::class, 'create']);

Route::get('/login', [AdminManagerController::class, 'FormLoginView']);
Route::post('/login', [AdminManagerController::class, 'Login']);
Route::get('/logout', [AdminManagerController::class, 'logOut']);


Route::get('/list', [AdminManagerController::class, 'listAdmins']);

Route::get('/changeIn4', [AdminManagerController::class, 'changeUrIn4Index']);

Route::get('/setting', [AdminManagerController::class, 'loadMyfinfo']);
Route::post('/setting', [AdminManagerController::class, 'updatedInfo']);






Route::group(['prefix'=>'/setting'] ,function(){
    Route::group(['prefix'=>'/Introduce'] ,function(){
        Route::get('/form', [IntroduceSndgController::class, 'View']);
        Route::get('/idIntro/{id}', [IntroduceSndgController::class, 'getIdIntro']);
        Route::post('/ChangeIntro', [IntroduceSndgController::class, 'UpdateInfo']);
    });

    Route::group(['prefix'=>'/Link'] ,function(){
        Route::get('/form', [LinkController::class, 'View']);
        Route::get('/IdfixLink/{id}', [LinkController::class, 'getId']);
        Route::post('/FixLink', [LinkController::class, 'UpdateLink']);
    });

});
