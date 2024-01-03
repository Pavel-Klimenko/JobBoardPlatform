<?php

use Illuminate\Support\Facades\DB;

use App\Http\Controllers;

Route::get('/', [Controllers\TestController::class, 'test']);
