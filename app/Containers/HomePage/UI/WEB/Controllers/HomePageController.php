<?php

namespace App\Containers\HomePage\UI\WEB\Controllers;

use App\Containers\HomePage\_Actions;
//use App\Events\NewEntityCreated;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Exception;
use Illuminate\Support\Facades\Http;

class HomePageController extends Controller
{
    public function renderHomePage()
    {
        try {
            $response = Http::acceptJson()->post(env('APP_JOBSERVICE_URL').'/api/homepage/');
            $arResponse = json_decode($response->getBody(), true);
            $cities = $arResponse['cities'];
            $jobCategories = $arResponse['job_categories'];
            $vacancyCategories = $arResponse['vacancy_categories'];
            $vacancies = $arResponse['vacancies'];
            $candidates = $arResponse['candidates'];
            $companies = $arResponse['companies'];
            $reviews = $arResponse['reviews'];

            return view('homepage',
                compact('cities', 'jobCategories', 'vacancyCategories',
                    'vacancies', 'candidates' , 'companies', 'reviews'
                ));
        } catch (Exception $exception) {
            return print_r($exception->getMessage());
        }
    }

//    public function createUserReview(Request $request)
//    {
//        $date = app(Actions\createUserReview::class)->run($request);
//        event(new NewEntityCreated($date));
//        return redirect()->route('homepage');
//    }

}
