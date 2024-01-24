<?php

namespace App\Containers\HomePage\UI\WEB\Controllers;

use App\Containers\HomePage\_Actions;
//use App\Events\NewEntityCreated;
use App\Containers\Vacancies\_Models\Vacancies;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Exception;
use Illuminate\Support\Facades\Http;


class HomePageController extends Controller
{
    public function renderHomePage()
    {
        $response = Http::acceptJson()->get(env('APP_JOBSERVICE_URL').'/api/homepage/');
        $arResponse = json_decode($response->getBody(), true);
        $cities = $arResponse['cities'];
        $jobCategories = $arResponse['job_categories'];
        $vacancyCategories = $arResponse['vacancy_categories'];
        $vacancies = $arResponse['vacancies'];
        $candidates = $arResponse['candidates'];
        $companies = $arResponse['companies'];
        $reviews = $arResponse['reviews'];

        dump($cities);

        return view('homepage',
            compact('cities', 'jobCategories', 'vacancyCategories',
                'vacancies', 'candidates' , 'companies', 'reviews'
            ));

    }

//    public function createUserReview(Request $request)
//    {
//        $date = app(Actions\createUserReview::class)->run($request);
//        event(new NewEntityCreated($date));
//        return redirect()->route('homepage');
//    }

}
