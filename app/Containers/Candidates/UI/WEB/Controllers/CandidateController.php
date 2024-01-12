<?php
namespace App\Containers\Candidates\UI\WEB\Controllers;

use App\Containers\Candidates\Actions;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Contracts\CacheContract;



class CandidateController extends BaseController
{
    protected $cacheService;

    public function __construct(CacheContract $cacheService){
        $this->cacheService = $cacheService;
    }

    /**Get Vacancies using filter
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getCandidates(Request $request)
    {
        $candidates = app(Actions\getCandidates::class)->run($request);
        $itemsOnPage = 8;
        $candidates = $candidates->paginate($itemsOnPage)->withQueryString();
        return view('lists.candidates', compact('candidates'));
    }


    /**Get candidate CV from the table
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getCandidate($id)
    {
        $candidate = app(Actions\getCandidate::class)->run($id);
        return app(Actions\getCandidateView::class)->run($candidate);
    }

    public function createVacancyInquiry(Request $request) {
        return app(Actions\createVacancyInquiry::class)->run($request);
    }
}
