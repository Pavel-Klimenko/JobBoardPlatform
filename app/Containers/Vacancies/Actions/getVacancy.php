<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 14/05/23
 * Time: 23:58
 */

namespace App\Containers\Vacancies\Actions;

use App\Containers\Vacancies\Models\Vacancies;

class getVacancy
{
    public function run($id) {
        $vacancy = Vacancies::find($id);
        return $vacancy;
    }

}