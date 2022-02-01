<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FormController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/bot', function () {
    return view('bot');
});

Route::get('/all', function () {
    return view('all');
});


Route::get('/','App\Http\Controllers\FormController@allData')->name('contact-data');

Route::get('/admin','App\Http\Controllers\FormController@botMess')->name('contact-data');

Route::post('/admin', 'App\Http\Controllers\FormController@submit2')->name('form1');



//Route::post('/validate', function () {
////    dd(Request::all());
////    return view('welcome');
//    return 'OKKK';
//})->name('form1');

//Route::post('/s','App\Http\Controllers\FormController')->name('form1');
