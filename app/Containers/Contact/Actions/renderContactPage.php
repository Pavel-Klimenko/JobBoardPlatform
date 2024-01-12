<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 14/05/23
 * Time: 23:58
 */

namespace App\Containers\Contact\Actions;

use App\Constants;
use App\Contracts\CacheContract;
use App\Containers\Contact\Actions;



class renderContactPage
{

    protected $cacheService;

    public function __construct(CacheContract $cacheService){
        $this->cacheService = $cacheService;
    }

    public function run() {
        $contactData = [
            'ADDRESS' => Constants::ADDRESS,
            'PHONE' => Constants::PHONE,
            'EMAIL' => Constants::EMAIL
        ];

        $cachedObject = $this->cacheService->getObjectIntoCache('contact_data');
        if (isset($cachedObject) && $cachedObject) {
            $contactData = $cachedObject;
        } else {
            $this->cacheService->putObjectIntoCache('contact_data', $contactData);
        }

        return $contactData;
    }
}