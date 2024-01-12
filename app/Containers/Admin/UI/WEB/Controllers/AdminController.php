<?php

namespace App\Containers\Admin\UI\WEB\Controllers;

use App\Containers\Vacancies\Models\InterviewInvitations;
use function Doctrine\Common\Cache\Psr6\get;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Roles;
use App\Models\User;
use App\Containers\Vacancies\Models\Vacancies;
use App\Models\Reviews;
use App\Constants;
use App\Ship\Helpers\Helper;
use App\Services\Charts;
use Illuminate\Http\Request;
use App\Containers\Vacancies\Models\JobCategories;
use App\Contracts\CacheContract;

class AdminController extends BaseController
{
    protected $candidatesRole;
    protected $companiesRole;
    protected $roles;
    protected $jobCategories;
    protected $cacheService;


    //TODO разобраться с '/////////' в JSON полях


    public function __construct(CacheContract $cacheService) {
        $this->candidatesRole = Constants::USER_ROLE_NAMES['candidate'];
        $this->companiesRole = Constants::USER_ROLE_NAMES['company'];
        $this->roles = Roles::all();
        $this->jobCategories = JobCategories::all();
        $this->cacheService = $cacheService;
    }


    public function renderAdminPanel() {
        $candidatesRole = $this->candidatesRole;
        $companiesRole = $this->companiesRole;

        return view('admin_area.main',
            compact( 'candidatesRole', 'companiesRole'));
    }

    public function renderUserList($userType) {
        $candidatesRole = $this->candidatesRole;
        $companiesRole = $this->companiesRole;

        $users = new User();
        $roleName = Constants::USER_ROLE_NAMES[$userType];
        $roleId = Helper::getRoleIdByName($roleName);
        $users = $users->where('role_id', $roleId);

        $itemsOnPage = 8;
        $users = $users->paginate($itemsOnPage);

        $view = 'admin_area.lists.users_list';
        $arrVariables = ['candidatesRole', 'companiesRole', 'users', 'userType'];

        return view($view, compact($arrVariables));
    }

    public function renderUser($id) {
        $candidatesRole = $this->candidatesRole;
        $companiesRole = $this->companiesRole;
        $user = User::find($id);
        if ($user->role_id == Constants::USER_ROLES_IDS[$candidatesRole]) {
            $jobCategories = $this->jobCategories;
            $category = Helper::getTableRow(JobCategories::class, 'ID', $user->CATEGORY_ID);
            $view = 'admin_area.detail_pages.candidate';
            $arrVariables = ['user', 'category', 'candidatesRole', 'companiesRole', 'jobCategories'];
        } elseif ($user->role_id == Constants::USER_ROLES_IDS[$companiesRole]) {
            $view = 'admin_area.detail_pages.company';
            $arrVariables = ['user','candidatesRole', 'companiesRole'];
        }
        return view($view, compact($arrVariables));
    }

    public function updateUserInfo(Request $request)
    {
        $user = User::find($request->id);

        if ($request->role_id == Constants::USER_ROLES_IDS[$this->companiesRole]) {
            $userList = $this->companiesRole;
            $arrUserFields = User::getCompanyFields();
        } elseif ($request->role_id == Constants::USER_ROLES_IDS[$this->candidatesRole]) {
            $userList = $this->candidatesRole;
            $arrUserFields = User::getCandidateFields();
        }

        foreach ($arrUserFields as $field) {
            $user->$field = $request->$field;
        }

        $this->cacheService->deleteKeyFromCache('user_'.$user->id);

        $user->save();
        return redirect()->route('admin-users', ['name' => $userList]);
    }

    public function renderList($entity) {
        $candidatesRole = $this->candidatesRole;
        $companiesRole = $this->companiesRole;

        if ($entity == 'vacancies') {
            $model = Vacancies::class;
            $view = 'admin_area.lists.vacancies';
        } elseif ($entity == 'reviews') {
            $model = Reviews::class;
            $view = 'admin_area.lists.reviews';
        }

        $itemsOnPage = 8;
        $listElements = $model::paginate($itemsOnPage);
        $arrVariables = ['listElements', 'candidatesRole', 'companiesRole'];
        return view($view, compact($arrVariables));
    }

    public function renderEntity($id, $entity) {
        $candidatesRole = $this->candidatesRole;
        $companiesRole = $this->companiesRole;

        if ($entity == 'vacancy') {
            $vacancy = Vacancies::find($id);
            $category = Helper::getTableRow(JobCategories::class, 'ID', $vacancy->CATEGORY_ID);
            $company = Helper::getTableRow(User::class, 'ID', $vacancy->COMPANY_ID);
            $jobCategories = $this->jobCategories;
            $view = 'admin_area.detail_pages.vacancy';
            $arrVariables = ['vacancy', 'jobCategories', 'category', 'company', 'candidatesRole', 'companiesRole'];
        } elseif ($entity == 'review') {
            $review = Reviews::find($id);
            $view = 'admin_area.detail_pages.review';
            $arrVariables = ['review', 'candidatesRole', 'companiesRole'];
        }

        return view($view, compact($arrVariables));
    }

    public function updateEntity(Request $request)
    {
        if ($request->entity == 'vacancy') {
            $element = Vacancies::find($request->id);
            $arrFields = Vacancies::getVacancyFields();
            $linkForRedirect = '/admin/render-list/vacancies';
            $this->cacheService->deleteKeyFromCache('vacancy_'.$request->id);
        } elseif ($request->entity == 'review') {
            $element = Reviews::find($request->id);
            $arrFields = Reviews::getReviewFields();
            $linkForRedirect = '/admin/render-list/reviews';
        }

        foreach ($arrFields as $field) {
            $element->$field = $request->$field;
        }

        $element->save();
        return redirect($linkForRedirect);
    }


    public function deleteEntity(Request $request)  {
        if (in_array($request->entity, Constants::USER_ENTITIES)) {
            $model = User::class;
            $cachePrefix = 'user_';
        } elseif ($request->entity == 'vacancy') {
            $model = Vacancies::class;
            $cachePrefix = 'vacancy_';
        } elseif ($request->entity == 'review') {
            $model = Reviews::class;
        }

        $entity = $model::find($request->id);
        $entity->delete();

        if (isset($cachePrefix) && $cachePrefix) {
            $this->cacheService->deleteKeyFromCache($cachePrefix.$request->id);
        }

        return back();
    }

    public function changeActiveStatus(Request $request)  {
        if (in_array($request->entity, Constants::USER_ENTITIES)) {
            $model = User::class;
            $cachePrefix = 'user_';
        } elseif ($request->entity == 'vacancy') {
            $model = Vacancies::class;
            $cachePrefix = 'vacancy_';
        } elseif ($request->entity == 'review') {
            $model = Reviews::class;
        }

        $entity = $model::find($request->id);
        $entity->ACTIVE = ($entity->ACTIVE == 1) ? 0 : 1;
        $entity->save();

        if (isset($cachePrefix) && $cachePrefix) {
            $this->cacheService->deleteKeyFromCache($cachePrefix.$request->id);
        }

        return back();
    }


    /**Line chart of growth since start of the current year
     *
     * @param $entity
     */
    public function renderLineChartAnalytics($entity) {
       $currentMonth = Helper::getCurrentMonth();

       $quantityOfMonths = $currentMonth;
       $monthsRange = range(0,$quantityOfMonths - 1);
       rsort($monthsRange);

       $arrMonths = [];
       $monthsInYear = 12;
       foreach ($monthsRange as $month) {
           $monthNumber = $currentMonth - $month;
           $monthNumber = ($monthNumber < 1) ? $monthsInYear + $monthNumber : $monthNumber;
           $arrMonths[] = $monthNumber;
       }

       if ($entity == 'vacancies') {
           $model = Vacancies::class;
       } elseif ($entity == 'users') {
           $model = User::class;
       }

        $chartData = [];
        foreach ($arrMonths as $month) {
            $rowData = Helper::getQuantityMonthlyRows($model, $month);
            $chartData['MONTHS'][] = $rowData['MONTHS'];
            $chartData['QUANTITY'][] = $rowData['CNT_ROWS'];
        }

        Charts::renderLineChart('New vacancies', $chartData['QUANTITY'], $chartData['MONTHS']);
    }

    /**Pie charts
     *
     * @param $entity
     */
    public function renderRatioAnalytics($entity) {
        if ($entity == 'users') {
            $candidatesQuantity = User::candidates()->count();
            $companiesQuantity = User::companies()->count();
            $arrData = [$candidatesQuantity, $companiesQuantity];
            $arrTitles = ["Candidates", "Companies"];
        } elseif ($entity == 'invitations') {
            $acceptedInvitations = InterviewInvitations::accepted()->count();
            $rejectedInvitations = InterviewInvitations::rejected()->count();
            $noStatusInvitations = InterviewInvitations::nostatus()->count();
            $arrData = [$acceptedInvitations, $rejectedInvitations, $noStatusInvitations];
            $arrTitles = ["Accepted", "Rejected", "No status"];
        }
        Charts::renderPieChart($arrData, $arrTitles);
    }

}
