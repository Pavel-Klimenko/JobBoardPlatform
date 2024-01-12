<?php

namespace App\Containers\Admin\UI\WEB\Routes;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Containers\Candidates\UI\WEB\Controllers\CandidateController;

use App\Containers\Admin\UI\WEB\Controllers\AdminController;

class RouteProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->adminRoute();
    }


    private function adminRoute(): void
    {
        Route::group(['prefix' => 'admin', 'middleware' => 'admin.area'], function () {
            Route::get('main', [AdminController::class, 'renderAdminPanel'])
                ->name('admin-main');
            Route::get('main/{name}', [AdminController::class, 'renderUserList'])
                ->name('admin-users');
            Route::get('render-list/{entity}', [AdminController::class, 'renderList'])
                ->name('render-list');
            Route::post('admin-update-user', [AdminController::class, 'updateUserInfo'])
                ->name('admin-update-user');
            Route::get('user/{id}', [AdminController::class, 'renderUser'])
                ->name('admin-profile');
            Route::get('detail-page/{id}/{entity}', [AdminController::class, 'renderEntity'])
                ->name('render-entity');
            Route::post('update-entity', [AdminController::class, 'updateEntity'])
                ->name('update-entity');
            Route::get('admin-delete-entity', [AdminController::class, 'deleteEntity'])
                ->name('admin-delete-entity');
            Route::get('admin-change-active-status', [AdminController::class, 'changeActiveStatus'])
                ->name('admin-change-active-status');
            Route::get('analytics-line-chart/{entity}', [AdminController::class, 'renderLineChartAnalytics'])
                ->name('analytics-line-chart');
            Route::get('analytics-pie-chart/{entity}', [AdminController::class, 'renderRatioAnalytics'])
                ->name('analytics-pie-chart');
        });
    }
}
