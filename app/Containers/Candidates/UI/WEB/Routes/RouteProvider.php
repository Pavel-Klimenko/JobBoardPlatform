<?php

namespace App\Containers\Candidates\UI\WEB\Routes;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Containers\Candidates\UI\WEB\Controllers\CandidateController;



class RouteProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->candidatesRoute();
    }


    private function candidatesRoute(): void
    {
        Route::get('candidates', [CandidateController::class, 'getCandidates'])->name('candidates');

        Route::group(['prefix' => 'detail-page'], function () {
            Route::get('candidate/{id}', [CandidateController::class, 'getCandidate'])->name('show-candidate');
        });


        Route::middleware(['candidate.area'])->group(function () {
            Route::group(['prefix' => 'form'], function () {
                Route::view('add-candidate', 'forms.addCandidateCV')->name('add-candidate');
            });
            Route::group(['prefix' => 'create'], function () {
                Route::post('candidate', [CandidateController::class, 'createCandidate'])->name('create-candidate');
            });
        });
    }

}
