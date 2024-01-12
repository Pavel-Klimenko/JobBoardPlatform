<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 14/05/23
 * Time: 23:58
 */

namespace App\Containers\HomePage\Actions;

use App\Containers\Vacancies\Models\JobCategories;
use App\Containers\Vacancies\Models\Vacancies;
//use App\Models\User;
//use App\Models\Reviews;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Http;


class renderHomePage
{
    public function run() {
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
            compact('cities',
                'jobCategories',
                'vacancyCategories',
                'vacancies',
                'candidates' ,
                'companies',
                'reviews'
            ));
    }

    private function getVacanciesCategories()
    {
        return Vacancies::select('CATEGORY_ID')
            ->distinct()
            ->where('ACTIVE', 1)
            ->limit(8)
            ->get();
    }
}
