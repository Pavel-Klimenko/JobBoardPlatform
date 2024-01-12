<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 14/05/23
 * Time: 23:58
 */

namespace App\Containers\Personal\Actions;

use App\Contracts\CacheContract;
use App\Ship\Helpers\Helper;
use App\Models\User;

class updateUserInfo
{

    protected $cacheService;

    public function __construct(CacheContract $cacheService){
        $this->cacheService = $cacheService;
    }

    public function run($request) {
        sleep(1);

        $user = User::find(Auth::user()->id);

        if (Helper::isCompany()) {
            $arrUserFields = User::getCompanyFields();
        } elseif (Helper::isCandidate()) {
            $arrUserFields = User::getCandidateFields();
        }

        foreach ($arrUserFields as $field) {
            $user->$field = $request->$field;
        }
        $user->ACTIVE = 0;
        $user->save();

        $this->cacheService->deleteKeyFromCache('user_'.$user->id);


        //sending notification to admin
        $date = (object) [
            'entity' => 'user',
            'message' =>  'User updated personal info',
            'entity_id' => $user->id,
        ];

        return $date;
    }
}