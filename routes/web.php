<?php
use Illuminate\Support\Facades\Route;

use App\Containers\Vacancies\UI\WEB\Controllers\VacancyController;
use App\Containers\HomePage\UI\WEB\Controllers\HomePageController;
use App\Containers\Candidates\UI\WEB\Controllers\CandidateController;

Route::get('/', [HomePageController::class, 'renderHomePage']);


Route::group(['prefix' => 'vacancies'], function () {
    Route::get('/create',[VacancyController::class, 'createVacancy']);
    Route::get('/',[VacancyController::class, 'getVacancies']);
    Route::get('/{id}',[VacancyController::class, 'getVacancyById']);
    Route::get('/delete/{id}',[VacancyController::class, 'deleteVacancy']);
    Route::get('/update/{id}',[VacancyController::class, 'updateVacancy']);
});



Route::group(['prefix' => 'candidates'], function () {
    Route::get('/create-interview-invitation',[CandidateController::class, 'createInterviewInvitation']);
    Route::get('/',[CandidateController::class, 'getCandidates']);
    Route::get('/{id}',[CandidateController::class, 'getCandidate']);
});
