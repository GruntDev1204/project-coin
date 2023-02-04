<?php

use App\Http\Controllers\IntroduceSndgController;
use App\Http\Controllers\LinkController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['prefix'=>'/Sndg'] ,function(){
    Route::get('/introduce', [IntroduceSndgController::class, 'index']);
    Route::get('/link', [LinkController::class, 'index']);

});


