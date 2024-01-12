<?php

namespace App\Containers\Job\UI\WEB\Routes;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Containers\Job\UI\WEB\Controllers\JobController;


class RouteProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->jobRoute();
    }


    private function jobRoute(): void
    {
        Route::get('test-email', [JobController::class, 'enqueue'])->name('add-mail-to-queue');
    }
}
