<?php

use Illuminate\Support\Facades\Route;



Route::prefix('auth')->group(function(){
    Route::post('login','AuthController@Login');
    Route::post('register','AuthController@Register');
});


Route::middleware('auth:api')->group(function(){
    Route::post('logout','AuthController@Logout');

    Route::prefix('transactions')->name('transactions.')->group(function(){
        Route::get('users','TransactionsController@UsersHaveTransactions')->name('users');
    });
    
    

});

Route::get('guest','AuthController@NotFound')->name('guest');

Route::fallback('AuthController@NotFound');
