<?php
namespace App\Containers\Vacancies\UI\WEB\Controllers;


use App\Containers\Vacancies\_Actions;

//use App\Contracts\CacheContract;
use App\Events\NewEntityCreated;
use App\Ship\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

use App\Containers\Vacancies\Models\Vacancies;
use Illuminate\Support\Facades\Http;
use Exception;


class VacancyController extends BaseController
{
//    protected $cacheService;
//
//    public function __construct(CacheContract $cacheService){
//        $this->cacheService = $cacheService;
//    }

    public function getVacancyById($id) {
        try {
            $response = Http::acceptJson()->post(env('APP_JOBSERVICE_URL').'/api/vacancies/read/', ['id' => $id]);
            $vacancy = json_decode($response->getBody(), true);
            //dump($arResponse);

            return view('detail_pages.vacancy', compact('vacancy'));

//            return view('detail_pages.vacancy',
//                compact('vacancy', 'category', 'company', 'isCandidateFlag', 'isCompanyFlag'));
        } catch (Exception $exception) {
            return print_r($exception->getMessage());
        }
    }


    public function getVacancies(Request $request)
    {
        try {

            //TODO фильтр в POSTMAN, сделать AJAX запросом!
            $arParams = [
                //'CATEGORY_NAME' => 'java',
                //'CITY' => 'Boston'
            ];

            $response = Http::acceptJson()->post(env('APP_JOBSERVICE_URL').'/api/vacancies/list', $arParams);
            $vacancies = json_decode($response->getBody(), true)['data'];
            //dump($vacancies);

            return view('lists.browse_job', compact('vacancies'));


        } catch (Exception $exception) {
            return print_r($exception->getMessage());
        }
    }



//    public function createVacancy(Request $request)
//    {
//        sleep(1);
//
//        $request->validate([
//            'NAME' => 'required|max:255',
//            'COUNTRY' => 'required|max:255',
//            'CITY' => 'required|max:255',
//            'CATEGORY_ID' => 'required|not_in:0',
//            'SALARY_FROM' => 'required|max:255',
//            'DESCRIPTION' => 'required|max:2500',
//            'RESPONSIBILITY' => 'required|max:2500',
//            'QUALIFICATIONS' => 'required|max:2500',
//            'BENEFITS' => 'required|max:2500',
//        ]);
//
//        $newVacancy = app(_Actions\getCandidates::class)->run($request);
//
//        //sending notification to admin
//        $date = (object) [
//            'entity' => 'vacancy',
//            'message' =>  'Added new vacancy',
//            'entity_id' => $newVacancy->ID,
//        ];
//
//        event(new NewEntityCreated($date));
//
//        return redirect()->route('personal-vacancies');
//    }


    public function deleteVacancy($id)
    {
        try {
            $response = Http::delete(env('APP_JOBSERVICE_URL').'/api/vacancies/delete/' . $id);
            if ($response->status() != 200) dd($response);
            return redirect('/vacancies/list');
        } catch (Exception $exception) {
            return print_r($exception->getMessage());
        }
    }
//
//    public function updateVacancy(Request $request)
//    {
//        sleep(1);
//        app(_Actions\updateVacancy::class)->run($request);
//
//        $this->cacheService->deleteKeyFromCache('vacancy_'.$request->VACANCY_ID);
//
//        //sending notification to admin
//        $date = (object) [
//            'entity' => 'vacancy',
//            'message' =>  'Updated new vacancy',
//            'entity_id' => $request->VACANCY_ID,
//        ];
//
//        event(new NewEntityCreated($date));
//
//        return back();
//    }

}
