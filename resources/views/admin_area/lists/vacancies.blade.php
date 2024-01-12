@include('admin_area.inc.header')
<x-admin-menu/>

<link rel="stylesheet"
      href="{{ asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/custom_css/admin_panel/list.css') }}">

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box clearfix">
                <div class="table-responsive">
                    @if (count($listElements) > 0)
                        <table class="table user-list">
                            <thead>
                            <tr>
                                <th><span>Title</span></th>
                                <th><span>Category</span></th>
                                <th><span>Created</span></th>
                                <th class="text-center"><span>Status</span></th>
                                <th><span>City</span></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($listElements as $vacancy)
                                @php
                                    $jobCategories = \App\Containers\Vacancies\Models\JobCategories::class;
                                    $category = \App\Ship\Helpers\Helper::getTableRow($jobCategories, 'ID', $vacancy->CATEGORY_ID);
                                    $user = \App\Models\User::class;
                                    $company = \App\Ship\Helpers\Helper::getTableRow($user, 'id', $vacancy->COMPANY_ID);
                                @endphp


                                <tr>
                                    <td>
                                        <a href="{{ route('render-entity', ['id' => $vacancy->ID, 'entity' => 'vacancy']) }}"
                                           class="user-link">{{$vacancy->NAME}}</a>
                                    </td>
                                    <td>{{$category->NAME}}</td>
                                    <td>{{$vacancy->created_at->format('Y/m/d')}}</td>
                                    @php
                                        $activeStatus = ($vacancy->ACTIVE == 1) ? 'active' : 'not active';
                                    @endphp
                                    <td class="text-center">
                                        <span class="label label-default">{{$activeStatus}}</span>
                                    </td>
                                    <td>{{ $vacancy->CITY }}</td>
                                    <td style="width: 20%;">
                                        <a href="{{ route('render-entity', ['id' => $vacancy->ID, 'entity' => 'vacancy']) }}"
                                           class="table-link">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>

                                        <a href="{{ route('admin-delete-entity', ['entity' => 'vacancy', 'id' => $vacancy->ID]) }}"
                                           class="table-link danger">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>

                                        @php
                                            $action = ($vacancy->ACTIVE == 1) ? 'Deactivate' : 'Activate';
                                        @endphp

                                        <a href="{{ route('admin-change-active-status',[
                                                 'entity' => 'vacancy',
                                                 'id' => $vacancy->ID
                                                 ]) }}"
                                           class="table-link link-success">
                                            <span class="fa-stack">{{$action}}</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <h5>Empty vacancies list</h5>
                    @endif
                </div>
                <!-- pagination  -->
                @if ($listElements->hasPages())
                    {{ $listElements->links('admin-pagination') }}
                @endif
            </div>
        </div>
    </div>
</div>
@include('admin_area.inc.footer')
