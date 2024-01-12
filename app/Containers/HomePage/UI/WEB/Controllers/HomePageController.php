<?php

namespace App\Containers\HomePage\UI\WEB\Controllers;

use App\Containers\HomePage\Actions;
use App\Events\NewEntityCreated;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Exception;

class HomePageController extends Controller
{
    public function renderHomePage()
    {
        try {
            return app(Actions\renderHomePage::class)->run();
        } catch (Exception $exception) {
            return print_r($exception->getMessage());
        }
    }

//    public function createUserReview(Request $request)
//    {
//        $date = app(Actions\createUserReview::class)->run($request);
//        event(new NewEntityCreated($date));
//        return redirect()->route('homepage');
//    }

}
