<?php
use Illuminate\Support\Facades\Route;

use App\Containers\Vacancies\UI\WEB\Controllers\VacancyController;
use App\Containers\HomePage\UI\WEB\Controllers\HomePageController;

Route::get('/', [HomePageController::class, 'renderHomePage']);


Route::group(['prefix' => 'vacancies'], function () {
    Route::get('/',[VacancyController::class, 'getVacancies']);
    Route::get('/{id}',[VacancyController::class, 'getVacancyById']);
    Route::get('/delete/{id}',[VacancyController::class, 'deleteVacancy']);
});
