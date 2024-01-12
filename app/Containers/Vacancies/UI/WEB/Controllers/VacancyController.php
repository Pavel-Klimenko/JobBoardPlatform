<?php
namespace App\Containers\Vacancies\UI\WEB\Controllers;


use App\Containers\Vacancies\Actions;

use App\Contracts\CacheContract;
use App\Events\NewEntityCreated;
use App\Ship\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

use App\Containers\Vacancies\Models\Vacancies;


class VacancyController extends BaseController
{
    protected $cacheService;

    public function __construct(CacheContract $cacheService){
        $this->cacheService = $cacheService;
    }

    public function getVacancyById(Request $request) {
        $vacancy = Vacancies::find($request->ID);
        return response()->json(array('vacancy'=> $vacancy), 200);
    }

    public function getVacancies(Request $request)
    {
        $vacancies = app(Actions\getVacancies::class)->run($request);
        return view('lists.browse_job', compact('vacancies'));
    }

    public function createVacancy(Request $request)
    {
        sleep(1);

        $request->validate([
            'NAME' => 'required|max:255',
            'COUNTRY' => 'required|max:255',
            'CITY' => 'required|max:255',
            'CATEGORY_ID' => 'required|not_in:0',
            'SALARY_FROM' => 'required|max:255',
            'DESCRIPTION' => 'required|max:2500',
            'RESPONSIBILITY' => 'required|max:2500',
            'QUALIFICATIONS' => 'required|max:2500',
            'BENEFITS' => 'required|max:2500',
        ]);

        $newVacancy = app(Actions\getCandidates::class)->run($request);

        //sending notification to admin
        $date = (object) [
            'entity' => 'vacancy',
            'message' =>  'Added new vacancy',
            'entity_id' => $newVacancy->ID,
        ];

        event(new NewEntityCreated($date));

        return redirect()->route('personal-vacancies');
    }

    public function getVacancy($id)
    {
        $cachedObject = $this->cacheService->getObjectIntoCache('vacancy_'.$id);
        if (isset($cachedObject) && $cachedObject) {
            $vacancy = $cachedObject;
        } else {
            $vacancy = app(Actions\getVacancy::class)->run($id);
            $this->cacheService->putObjectIntoCache('vacancy_'.$id, $vacancy);
        }


        if ($vacancy) {
            $category = app(Actions\getCategory::class)->run($vacancy);
            $company = app(Actions\getCompany::class)->run($vacancy);
        }


        $isCandidateFlag = Helper::isCandidate();
        $isCompanyFlag = Helper::isCompany();


        if ($isCandidateFlag) {
            $candidate = auth()->user();
            $candidateInvitation = app(Actions\getCandidateInvitations::class)->run($candidate, $company, $vacancy);

            return view('detail_pages.vacancy',
                compact('vacancy', 'category', 'company', 'isCompanyFlag', 'isCandidateFlag', 'candidateInvitation'));
        } elseif ($isCompanyFlag) {
            return view('detail_pages.vacancy',
                compact('vacancy', 'category', 'company', 'isCandidateFlag', 'isCompanyFlag'));
        } else {
            return view('detail_pages.vacancy',
                compact('vacancy', 'category', 'company'));
        }
    }

    public function deleteVacancy(Request $request)
    {
        app(Actions\deleteVacancy::class)->run($request);
        $this->cacheService->deleteKeyFromCache('vacancy_'.$request->VACANCY_ID);
        return back();
    }

    public function updateVacancy(Request $request)
    {
        sleep(1);
        app(Actions\updateVacancy::class)->run($request);

        $this->cacheService->deleteKeyFromCache('vacancy_'.$request->VACANCY_ID);

        //sending notification to admin
        $date = (object) [
            'entity' => 'vacancy',
            'message' =>  'Updated new vacancy',
            'entity_id' => $request->VACANCY_ID,
        ];

        event(new NewEntityCreated($date));

        return back();
    }

}
