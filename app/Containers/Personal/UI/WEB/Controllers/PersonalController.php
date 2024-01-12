<?php

namespace App\Containers\Personal\UI\WEB\Controllers;

use Illuminate\Routing\Controller as BaseController;

use App\Containers\Personal\Actions;
use App\Events\NewEntityCreated;
use App\Events\VacancyInterviewRequest;
use Illuminate\Http\Request;
use App\Events\CandidateInvitation;
use App\Containers\Vacancies\Models\Vacancies;
use App\Containers\Vacancies\Models\InterviewInvitations;
use App\Ship\Helpers\Helper;


class PersonalController extends BaseController
{
    public function getPersonalInfo()
    {
        return app(Actions\getPersonalInfo::class)->run();
    }

    public function getCompanyVacancies()
    {
        return app(Actions\getCompanyVacancies::class)->run();
    }

    public function getIterviewRequests($requestsType)
    {
        return app(Actions\getIterviewRequests::class)->run($requestsType);
    }

    public function changeAdviceStatus($INVITE_ID, $STATUS)
    {
        $date = app(Actions\changeAdviceStatus::class)->run($INVITE_ID, $STATUS);
        event(new CandidateInvitation($date));
        return back();
    }

    public function createInterviewInvite(Request $request)
    {
        $invitation = new InterviewInvitations();
        $vacancy = Helper::getTableRow(Vacancies::class, 'ID', $request->VACANCY_ID);

        if (Helper::isCompany()) {
            $date = app(Actions\createInterviewInviteFromCompany::class)->run($invitation, $vacancy, $request);
            event(new CandidateInvitation($date));
        }

        if (Helper::isCandidate()) {
            $date = app(Actions\createInterviewInviteFromCandidate::class)->run($invitation, $vacancy, $request);
            event(new VacancyInterviewRequest($date));
        }

        $invitation->save();
        return back();
    }

    public function uploadUserImage(Request $request)
    {
        $date = app(Actions\uploadUserImage::class)->run($request);
        event(new NewEntityCreated($date));
        return back();
    }

    public function updateUserInfo(Request $request)
    {
        $date = app(Actions\updateUserInfo::class)->run($request);
        event(new NewEntityCreated($date));
        return back();
    }

}
