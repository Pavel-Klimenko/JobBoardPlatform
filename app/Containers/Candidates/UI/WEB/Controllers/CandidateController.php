<?php
namespace App\Containers\Candidates\UI\WEB\Controllers;

use App\Constants;
use App\Containers\Candidates\_Actions;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Contracts\CacheContract;
use Illuminate\Support\Facades\Http;


class CandidateController extends BaseController
{
//    protected $cacheService;
//
//    public function __construct(CacheContract $cacheService){
//        $this->cacheService = $cacheService;
//    }


    public function getCandidates()
    {
        $response = Http::acceptJson()->post(env('APP_JOBSERVICE_URL').'/api/candidates/');
        $response = json_decode($response->getBody(), true);
        dump($response);


        //$itemsOnPage = 8;
        //$candidates = $candidates->paginate($itemsOnPage)->withQueryString();
        //return view('lists.candidates', compact('candidates'));
    }


    public function getCandidate($id)
    {
        $response = Http::acceptJson()->get(env('APP_JOBSERVICE_URL').'/api/candidates/' . $id);
        $response = json_decode($response->getBody(), true);
        dump($response);
        //return view('detail_pages.vacancy', compact('vacancy'));
    }

    public function createInterviewInvitation(Request $request) {
        $arParams = [
            'COMPANY_ID' => 1,
            'CANDIDATE_ID' => 3,
            'VACANCY_ID' => 2,
            'COVERING_LETTER' => 'TEST666666666666666',
        ];

        $response = Http::post(env('APP_JOBSERVICE_URL').'/api/candidates/create-interview-invitation', $arParams);
        if (!in_array($response->status(),Constants::SUCCESSFUL_RESPONSE_CODES)) dd($response);
    }
}
