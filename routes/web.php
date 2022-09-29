<?php

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
    return view('welcome');
});

Route::get('image/upload','MultiImageUploadController@fileCreate');
Route::post('image/upload/store','MultiImageUploadController@fileStore');
Route::post('image/delete','MultiImageUploadController@fileDestroy');

Route::delete('photos/{imageUpload}',[
    'uses' => 'MultiImageUploadController@destroy',
    'as' => 'photos.destroy'
]);
