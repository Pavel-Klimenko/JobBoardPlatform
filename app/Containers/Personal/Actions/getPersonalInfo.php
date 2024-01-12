<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 14/05/23
 * Time: 23:58
 */

namespace App\Containers\Personal\Actions;

use App\Ship\Helpers\Helper;
use App\Containers\Vacancies\Models\JobCategories;

class getPersonalInfo
{
    public function run() {
        if (Helper::isAdmin()) {
            return redirect()->route('admin-main');
        }

        $user = auth()->user();
        $title = 'Personal info';

        if (Helper::isCompany()) {
            $view = view('personal.companyInfo', compact('user', 'title'));
        } elseif (Helper::isCandidate()) {
            $jobCategories = JobCategories::all();
            $category = Helper::getTableRow(JobCategories::class, 'ID', $user->CATEGORY_ID);
            $view = view('personal.candidateInfo', compact('user', 'title', 'category', 'jobCategories'));
        }

        return $view;
    }
}