<?php

use App\Http\Controllers\AdminManagerController;
use App\Http\Controllers\IntroduceSndgController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\RMController;
use App\Http\Controllers\TokenController;
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


Route::get('/', [AdminManagerController::class, 'FormAddView']);
Route::post('/JoinSndg', [AdminManagerController::class, 'create']);

Route::get('/login', [AdminManagerController::class, 'FormLoginView']);
Route::post('/login', [AdminManagerController::class, 'Login']);
Route::get('/logout', [AdminManagerController::class, 'logOut']);

Route::get('/listMember', [AdminManagerController::class, 'indexList']);
Route::get('/Members', [AdminManagerController::class, 'memberIndex']);


Route::get('/allowed/{id}', [AdminManagerController::class, 'allowMember']);


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

    Route::group(['prefix'=>'/RM'] ,function(){
        Route::get('/form', [RMController::class, 'view']);
        Route::post('/addRM', [RMController::class, 'create']);
        Route::get('/listRM', [RMController::class, 'index']);
        Route::get('/deletedRM/{id}', [RMController::class, 'deleted']);


        Route::get('/indexList', [RMController::class, 'indexList']);
        Route::post('/addList', [RMController::class, 'addList']);
        Route::get('/deleteList/{id}', [RMController::class, 'deleteList']);
        Route::get('/doneList/{id}', [RMController::class, 'isDone']);



    });
    Route::group(['prefix'=>'/tokenomics'] ,function(){
        Route::post('/formEdit', [TokenController::class, 'edittoken']);
        Route::get('/data', [TokenController::class, 'index']);
        Route::get('/view', [TokenController::class, 'view']);

    });
});
