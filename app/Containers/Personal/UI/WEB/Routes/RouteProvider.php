<?php

namespace App\Containers\Personal\UI\WEB\Routes;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Containers\Personal\UI\WEB\Controllers\PersonalController;

use App\Containers\Admin\UI\WEB\Controllers\AdminController;

class RouteProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->personalRoute();
    }


    private function personalRoute(): void
    {
        Route::group(['prefix' => 'personal', 'middleware' => 'auth'], function () {
            Route::get('info', [PersonalController::class, 'getPersonalInfo'])
                ->name('personal-info');
            Route::get('vacancies', [PersonalController::class, 'getCompanyVacancies'])
                ->name('personal-vacancies');
            Route::get('interview-requests/{type}', [PersonalController::class, 'getIterviewRequests'])
                ->name('interview-requests');
            Route::post('invite-to-interview', [PersonalController::class, 'createInterviewInvite'])
                ->name('invite-to-interview');
            //статус отклика
            Route::get('change-advice-status/{ADVICE_ID}/{STATUS}', [PersonalController::class, 'changeAdviceStatus'])
                ->name('change-advice-status');
            Route::post('upload-user-image', [PersonalController::class, 'uploadUserImage'])
                ->name('upload-user-image');
            Route::post('update-user-info', [PersonalController::class, 'updateUserInfo'])
                ->name('update-user-info');
            Route::post('update-vacancy', [PersonalController::class, 'updateUserInfo'])
                ->name('update-vacancy');
        });

        Route::get('personal', [PersonalController::class, 'getCompanyVacancies'])
            ->name('personal')
            ->middleware('auth');
    }
}
