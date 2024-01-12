<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 14/05/23
 * Time: 23:58
 */

namespace App\Containers\Candidates\Actions;

use App\Ship\Helpers\Helper;
use App\Containers\Vacancies\Models\JobCategories;
use App\Models\User;

class getCandidates
{
    public function run($request) {

        $arrRequest = $request->all();
        $candidates = User::candidates()->where('ACTIVE', 1);

        if ($request->has('CATEGORY_NAME')) {
            $model = JobCategories::class;
            $category = Helper::getTableRow($model, 'NAME', $arrRequest['CATEGORY_NAME']);
            $arrRequest['CATEGORY_ID'] = $category->ID;
        }


        if (!empty($arrRequest)) {
            $filterParams = ['LEVEL', 'CATEGORY_ID', 'CITY'];

            //assembling filter params
            $arrFilter = [];
            foreach ($arrRequest as $paramName => $paramValue) {
                if (in_array($paramName, $filterParams)) {
                    $arrFilter[$paramName] = $paramValue;
                }
            }

            //filtering collection
            if (!empty($arrFilter)) {
                foreach ($arrFilter as $key => $value) {
                    $candidates = $candidates->where($key, $value);
                }
            }

            //sorting results
            if ($request->has('SORT')) {
                if ($arrRequest['SORT'] == 'maxExperience') {
                    $sortFiled = 'YEARS_EXPERIENCE';
                } elseif ($arrRequest['SORT'] == 'newest') {
                    $sortFiled = 'created_at';
                }
                $candidates = $candidates->orderBy($sortFiled, 'desc');
            }
        }


        return $candidates;
    }


}