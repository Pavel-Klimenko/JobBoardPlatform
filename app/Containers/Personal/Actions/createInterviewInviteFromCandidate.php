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

class createInterviewInviteFromCandidate
{
    public function run($invitation, $vacancy, $request) {
        $invitation->COMPANY_ID = $request->COMPANY_ID;
        $invitation->CANDIDATE_ID = Auth::user()->id;
        $invitation->CANDIDATE_NAME = Auth::user()->NAME;
        $invitation->VACANCY_ID = $request->VACANCY_ID;
        $invitation->VACANCY_NAME = $vacancy->NAME;
        $invitation->CANDIDATE_COVERING_LETTER = $request->CANDIDATE_COVERING_LETTER;
        $invitation->STATUS = Constants::INTERVIEW_ADVICES_STATUSES['NO_STATUS'];

        $candidate = User::find(Auth::user()->id);
        $company = User::find($request->COMPANY_ID);

        //sending notification to candidate email
        $date = (object)[
            'name' => Constants::SITE_NAME,
            'email' => Constants::EMAIL,
            //'template' => '',
            'message' => 'Candidate send ad interview request',
            'company_email' => $company->EMAIL,
            'candidate_id' => $candidate->id,
            'candidate_name' => $candidate->NAME,
            'candidate_email' => $candidate->EMAIL,
            'candidate_phone' => $candidate->PHONE,
            'covering_letter' => $request->CANDIDATE_COVERING_LETTER,
            'vacancy_id' => $request->VACANCY_ID,
            'vacancy_name' => $vacancy->NAME,
        ];

        return $date;
    }
}