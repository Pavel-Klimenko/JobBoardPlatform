<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 14/05/23
 * Time: 23:58
 */

namespace App\Containers\Personal\Actions;

use App\Constants;
use App\Containers\Vacancies\Models\InterviewInvitations;
use App\Models\User;
use App\Events\CandidateInvitation;

class createInterviewInviteFromCompany
{
    public function run($invitation, $vacancy, $request) {
        $invitation->COMPANY_ID = Auth::user()->id;
        $invitation->CANDIDATE_ID = $request->CANDIDATE_ID;
        $invitation->CANDIDATE_NAME = $request->CANDIDATE_NAME;
        $invitation->VACANCY_ID = $request->VACANCY_ID;
        $invitation->VACANCY_NAME = $vacancy->NAME;
        $invitation->STATUS = Constants::INTERVIEW_ADVICES_STATUSES['ACCEPTED'];

        $candidate = User::find($request->CANDIDATE_ID);

        //sending notification to candidate email
        $date = (object) [
            'name' => Constants::SITE_NAME,
            'email' => Constants::EMAIL,
            'message' => 'You are invited for an interview!',
            'candidate_email' => $candidate->EMAIL,
            'company_name' => Auth::user()->NAME,
            'company_email' => Auth::user()->EMAIL,
            'company_phone' => Auth::user()->PHONE,
            'company_website' => Auth::user()->WEB_SITE,
            'vacancy_id' => $request->VACANCY_ID,
            'vacancy_name' => $vacancy->NAME,
        ];


        return $date;
    }
}