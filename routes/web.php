<?php

use Illuminate\Support\Facades\DB;

use App\Containers\HomePage\UI\WEB\Controllers\HomePageController;

Route::get('/', [HomePageController::class, 'renderHomePage']);
