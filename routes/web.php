<?php

use App\Http\Controllers\IntroduceSndgController;
use App\Http\Controllers\LinkController;
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
Route::get('/', function () {
    return view('SNDGSetting.master');
});
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
