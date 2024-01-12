<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 14/05/23
 * Time: 23:58
 */

namespace App\Containers\Candidates\Actions;

use App\Contracts\CacheContract;
use App\Models\User;

class getCandidate
{

    protected $cacheService;

    public function __construct(CacheContract $cacheService){
        $this->cacheService = $cacheService;
    }

    public function run($id) {

        $cachedObject = $this->cacheService->getObjectIntoCache('user_'.$id);
        if (isset($cachedObject) && $cachedObject) {
            $candidate = $cachedObject;
        } else {
            $candidate = User::find($id);
            $this->cacheService->putObjectIntoCache('user_'.$id, $candidate);
        }

        return $candidate;
    }

}