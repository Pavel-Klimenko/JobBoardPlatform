<?php

namespace App\Containers\Personal\UI\WEB\Controllers;

use Illuminate\Routing\Controller as BaseController;

use App\Containers\Personal\_Actions;
use App\Events\NewEntityCreated;
use App\Events\VacancyInterviewRequest;
use Illuminate\Http\Request;
use App\Events\CandidateInvitation;
use App\Containers\Vacancies\_Models\Vacancies;
use App\Containers\Vacancies\_Models\InterviewInvitations;
use App\Ship\Helpers\Helper;
use Illuminate\Support\Facades\Http;


class PersonalController extends BaseController
{
    public function getPersonalInfo($id)
    {
        $response = Http::acceptJson()->get(env('APP_JOBSERVICE_URL').'/api/personal/' . $id);
        $response = json_decode($response->getBody(), true);
        dump($response);
        //return app(_Actions\getPersonalInfo::class)->run();
    }

    public function getCompanyVacancies($id)
    {
        $response = Http::acceptJson()->get(env('APP_JOBSERVICE_URL').'/api/personal/company-vacancies/' . $id);
        $response = json_decode($response->getBody(), true);
        dump($response);

    }

    public function getInterviewInvitations($id, $status)
    {
        $response = Http::acceptJson()->get(env('APP_JOBSERVICE_URL').'/api/personal/get-interview-invitations/'.$id.'/'.$status);
        $response = json_decode($response->getBody(), true);
        dump($response);

    }

    public function changeInvitationStatus($id, $status)
    {
        $response = Http::acceptJson()->put(env('APP_JOBSERVICE_URL').'/api/personal/change-invitation-status/'.$id.'/'.$status);
        $response = json_decode($response->getBody(), true);
        dump($response);
//        $date = app(_Actions\changeAdviceStatus::class)->run($id, $status);
//        event(new CandidateInvitation($date));
//        return back();
    }

    public function createInterviewInvite(Request $request)
    {
        $invitation = new InterviewInvitations();
        $vacancy = Helper::getTableRow(Vacancies::class, 'ID', $request->VACANCY_ID);

        if (Helper::isCompany()) {
            $date = app(_Actions\createInterviewInviteFromCompany::class)->run($invitation, $vacancy, $request);
            event(new CandidateInvitation($date));
        }

        if (Helper::isCandidate()) {
            $date = app(_Actions\createInterviewInviteFromCandidate::class)->run($invitation, $vacancy, $request);
            event(new VacancyInterviewRequest($date));
        }

        $invitation->save();
        return back();
    }

    public function uploadUserImage(Request $request)
    {
        $date = app(_Actions\uploadUserImage::class)->run($request);
        event(new NewEntityCreated($date));
        return back();
    }

    public function updateUserInfo(Request $request)
    {

        $arData = [
            'user_id' => 2,
            'NAME' => 'Pavel',
            'PHONE' => '+49722211777'
        ];

        $response = Http::acceptJson()->post(env('APP_JOBSERVICE_URL').'/api/personal/update-user-info/', $arData);
        $response = json_decode($response->getBody(), true);
        dump($response);

//        $date = app(_Actions\updateUserInfo::class)->run($request);
//        event(new NewEntityCreated($date));
//        return back();
    }

}
