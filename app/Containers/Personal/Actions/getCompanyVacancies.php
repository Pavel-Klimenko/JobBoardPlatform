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
use App\Models\User;

class getCompanyVacancies
{
    public function run() {
        if (Helper::isAdmin()) {
            return redirect()->route('admin-main');
        }

        $title = 'Company vacancies';
        $user = auth()->user();
        $jobCategories = JobCategories::all();

        $itemsOnPage = 4;
        $vacancies = User::find($user->id)
            ->vacancies()
            ->where('ACTIVE', 1)
            ->paginate($itemsOnPage)
            ->withQueryString();

        return view('personal.vacancies', compact('vacancies', 'jobCategories', 'title'));
    }
}