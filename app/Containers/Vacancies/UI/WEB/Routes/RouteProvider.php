<?php

namespace App\Containers\Vacancies\UI\WEB\Routes;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Containers\Vacancies\UI\WEB\Controllers\VacancyController;



class RouteProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->vacanciesRoute();
    }


    private function vacanciesRoute(): void
    {
        Route::get('browse-job', [VacancyController::class, 'getVacancies'])->name('browse-job');

        Route::group(['prefix' => 'detail-page'], function () {
            Route::get('vacancy/{id}', [VacancyController::class, 'getVacancy'])->name('show-vacancy');
        });

        Route::group(['prefix' => 'ajax'], function () {
            Route::post('get-vacancy',[VacancyController::class, 'getVacancyById']);
        });


        Route::middleware(['company.area'])->group(function () {
            Route::group(['prefix' => 'form'], function () {
                Route::view('add-vacancy', 'forms.addVacancy')->name('add-vacancy');
            });

            Route::get('delete-vacancy', [VacancyController::class, 'deleteVacancy'])
                ->name('delete-vacancy');

            Route::post('update-vacancy', [VacancyController::class, 'updateVacancy'])
                ->name('update-vacancy');

            Route::group(['prefix' => 'create'], function () {
                Route::post('vacancy', [VacancyController::class, 'createVacancy'])
                    ->name('create-vacancy');
            });
        });
    }
}
