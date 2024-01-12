<?php

namespace App\Containers\HomePage\UI\WEB\Routes;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Containers\HomePage\UI\WEB\Controllers\HomePageController;



class RouteProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->homeRoute();
    }


    private function homeRoute(): void
    {
        Route::get('/', [HomePageController::class, 'renderHomePage'])->name('homepage');
    }
}
