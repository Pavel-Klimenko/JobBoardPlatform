<?php
namespace App\Containers\Vacancies\UI\WEB\Controllers;


use App\Containers\Vacancies\_Actions;

//use App\Contracts\CacheContract;
use App\Events\NewEntityCreated;
use App\Ship\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

use App\Containers\Vacancies\_Models\Vacancies;
use Illuminate\Support\Facades\Http;
use Exception;
use App\Constants;

class VacancyController extends BaseController
{
//    protected $cacheService;
//
//    public function __construct(CacheContract $cacheService){
//        $this->cacheService = $cacheService;
//    }

    public function get($id) {

        $response = Http::acceptJson()->get(env('APP_JOBSERVICE_URL').'/api/vacancies/' . $id);
        $vacancy = json_decode($response->getBody(), true);
        return view('detail_pages.vacancy', compact('vacancy'));
//            return view('detail_pages.vacancy',
//                compact('vacancy', 'category', 'company', 'isCandidateFlag', 'isCompanyFlag'));
    }


    public function getList(Request $request)
    {
        //TODO фильтр в POSTMAN, сделать AJAX запросом!
        $arParams = [
            //'CATEGORY_NAME' => 'java',
            //'CITY' => 'Boston'
        ];

        $response = Http::acceptJson()->post(env('APP_JOBSERVICE_URL').'/api/vacancies/list', $arParams);
        $vacancies = json_decode($response->getBody(), true)['data'];

        return view('lists.browse_job', compact('vacancies'));
    }



    public function createVacancy(Request $request)
    {
        $arParams = [
            'NAME' => 'Test444',
            //'ICON' => Auth::user()->ICON,
            //'IMAGE' => Auth::user()->IMAGE,
            'COUNTRY' => 'Test444',
            'CITY' => 'Test444',
            'CATEGORY_ID' => 1,
            //'COMPANY_ID' => Auth::user()->id, TODO передать с другого сервиса
            'SALARY_FROM' => 1000,
            'DESCRIPTION' => '345435435dgfdg',
            //'RESPONSIBILITY' => Helper::convertTextPointsToJson($request->RESPONSIBILITY),
            //'QUALIFICATIONS' => Helper::convertTextPointsToJson($request->QUALIFICATIONS),
            'BENEFITS' => 'Test4545'
        ];

        $response = Http::post(env('APP_JOBSERVICE_URL').'/api/vacancies/create/', $arParams);
        if (!in_array($response->status(),Constants::SUCCESSFUL_RESPONSE_CODES)) dd($response);
    }


    public function deleteVacancy($id)
    {
        $response = Http::delete(env('APP_JOBSERVICE_URL').'/api/vacancies/delete/' . $id);
        if ($response->status() != 200) dd($response);
        return redirect('/vacancies/list');
    }

    public function updateVacancy($id, Request $request)
    {
        $arParams = [
            'NAME1' => 'PHP Developer333888',
            //'CITY' => 'Boston'
        ];

        $response = Http::post(env('APP_JOBSERVICE_URL').'/api/vacancies/update/' . $id, $arParams);
        if (!in_array($response->status(),Constants::SUCCESSFUL_RESPONSE_CODES)) dd($response);
    }
}
