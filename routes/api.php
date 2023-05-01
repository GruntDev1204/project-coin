<?php

use App\Http\Controllers\AdminManagerController;
use App\Http\Controllers\IntroduceSndgController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\RMController;
use App\Http\Controllers\TokenController;
use Database\Seeders\AdminsSndg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['prefix'=>'/Sndg'] ,function(){
    Route::get('/introduce', [IntroduceSndgController::class, 'index']);
    Route::get('/link', [LinkController::class, 'index']);
    Route::get('/member', [AdminManagerController::class, 'memberListchinh']);
    Route::get('/RM', [RMController::class, 'showRM']);
    Route::get('/apiToken', [TokenController::class, 'apiToken']);

});


Route::get('/test/{id}', [AdminsSndg::class, 'apiToken']);
