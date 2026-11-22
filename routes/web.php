<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResourceController;

Route::get('/', function () {
    return redirect()->route('resources.index');
});

Route::resource('resources', ResourceController::class);