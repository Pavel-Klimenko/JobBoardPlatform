<?php
namespace App\Containers\Contact\UI\WEB\Controllers;

use App\Containers\Contact\Actions;
use App\Contracts\CacheContract;
use App\Events\NewUserMessage;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;



class ContactController extends BaseController
{
    protected $cacheService;

    public function __construct(CacheContract $cacheService){
        $this->cacheService = $cacheService;
    }

    /**Rendering the page with JobBoard info
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function renderContactPage() {
        $contactData = app(Actions\renderContactPage::class)->run();
        return view('contact', $contactData);
    }

    public function addUserMessage(Request $request)
    {
        $date = app(Actions\addUserMessage::class)->run($request);
        event(new NewUserMessage($date));
        return redirect()->route('homepage');
    }
}
