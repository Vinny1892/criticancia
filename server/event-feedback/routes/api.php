<?php

use Illuminate\Http\Request;
use App\Vote;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::get('/teste' , function(){
    $allData = Vote::all();
    return response($allData);
});

Route::post('/', "VoteController@vote");
