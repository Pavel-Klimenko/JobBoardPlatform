<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 14/05/23
 * Time: 23:58
 */

namespace App\Containers\Candidates\Actions;

use App\Containers\Vacancies\Models\InterviewInvitations;

class createVacancyInquiry
{
    public function run($request) {
        $inquries = new InterviewInvitations();
        $inquries->COMPANY_ID = $request->COMPANY_ID;
        $inquries->CANDIDATE_ID = $request->CANDIDATE_ID;
        $inquries->VACANCY_ID = $request->VACANCY_ID;
        $inquries->COVERING_LETTER = $request->COVERING_LETTER;
        return $inquries->save();
    }
}