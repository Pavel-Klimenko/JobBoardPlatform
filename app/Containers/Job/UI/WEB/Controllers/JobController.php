<?php
namespace App\Containers\Job\UI\WEB\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Jobs\SendEmailToCompany;


class JobController extends BaseController
{
    /**
     *
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function enqueue(Request $request)
    {
        $details = ['email' => 'mr-freeman89@mail.ru'];
        SendEmailToCompany::dispatch($details);
    }

}
