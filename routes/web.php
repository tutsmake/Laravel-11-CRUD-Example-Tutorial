<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NoteCRUDController;
Route::resource('notes', NoteCRUDController::class);
