<?php
use Illuminate\Support\Facades\Route;

use App\Containers\Vacancies\UI\WEB\Controllers\VacancyController;
use App\Containers\HomePage\UI\WEB\Controllers\HomePageController;
use App\Containers\Candidates\UI\WEB\Controllers\CandidateController;
use App\Containers\Personal\UI\WEB\Controllers\PersonalController;

Route::get('/', [HomePageController::class, 'renderHomePage']);


//TODO СДЕЛАТЬ ФРОНТ НА vue JS!!!

//TODO общий контроллер в middleware!

Route::group(['prefix' => 'vacancies'], function () {
    Route::get('/',[VacancyController::class, 'getList']);
    Route::get('/{id}',[VacancyController::class, 'get']);
    Route::post('/create',[VacancyController::class, 'createVacancy']);
    Route::delete('/delete/{id}',[VacancyController::class, 'deleteVacancy']);
    Route::post('/update/{id}',[VacancyController::class, 'updateVacancy']);
});

Route::group(['prefix' => 'candidates'], function () {
    Route::post('/create-invitation',[CandidateController::class, 'createInterviewInvitation']);
    Route::get('/',[CandidateController::class, 'getList']);
    Route::get('/{id}',[CandidateController::class, 'get']);
});

//Route::group(['prefix' => 'personal'], function () {
//    //Route::get('/create-interview-invitation',[CandidateController::class, 'createInterviewInvitation']);
//    //Route::get('/',[CandidateController::class, 'getCandidates']);
//    Route::get('/update-user-info', [PersonalController::class, 'updateUserInfo']);
//    Route::get('/company-vacancies/{id}', [PersonalController::class, 'getCompanyVacancies']);
//    Route::get('/{id}',[PersonalController::class, 'getPersonalInfo']);
//    Route::get('/change-invitation-status/{id}/{status}', [PersonalController::class, 'changeInvitationStatus']);
//    Route::get('/get-interview-invitations/{id}/{status}', [PersonalController::class, 'getInterviewInvitations']);
//
//});
