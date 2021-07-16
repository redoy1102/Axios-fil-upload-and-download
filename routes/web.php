<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;



Route::get('/', function () {
    return view('Home');
});

Route::get('/C', function() {
    return view('C');
});

Route::post('/fileUp',[UploadController::class,'fileUpload']);

Route::post('/cfileup', [UploadController::class,'fileUploadC']);

