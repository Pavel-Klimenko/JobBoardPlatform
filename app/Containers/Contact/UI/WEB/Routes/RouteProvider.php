<?php

namespace App\Containers\Contact\UI\WEB\Routes;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Containers\Contact\UI\WEB\Controllers\ContactController;


class RouteProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->contactRoute();
    }


    private function contactRoute(): void
    {
        Route::get('contact', [ContactController::class, 'renderContactPage'])->name('contact');
        Route::post('contact-us', [ContactController::class, 'addUserMessage'])->name('contact-us');
    }
}
