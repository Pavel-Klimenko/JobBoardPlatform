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
                    @if (count($users) > 0)
                        <table class="table user-list">
                            <thead>
                            <tr>
                                <th><span>User</span></th>
                                <th><span>Created</span></th>
                                <th class="text-center"><span>Status</span></th>
                                <th><span>Email</span></th>
                                <th>&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($users as $user)
                                @php
                                    if ($userType == 'candidate') {
                                            $model = \App\Containers\Vacancies\Models\JobCategories::class;
                                            $category = \App\Ship\Helpers\Helper::getTableRow($model, 'ID', $user->CATEGORY_ID);
                                    }
                                @endphp
                                <tr>
                                    <td>
                                        <img src="{{ $user->ICON }}" alt="">
                                        <a href="{{ route('admin-profile', ['id' => $user->id]) }}"
                                           class="user-link">{{$user->NAME}}</a>

                                        @if ($userType == 'candidate')
                                            <span class="user-subhead">
                                            {{ $user->LEVEL }}
                                                {{ ucfirst($user->NAME)}}
                                            developer
                                        </span>
                                        @endif
                                    </td>
                                    <td>
                                        {{$user->created_at->format('Y/m/d')}}
                                    </td>
                                    @php
                                        $activeStatus = ($user->ACTIVE == 1) ? 'active' : 'not active';
                                    @endphp
                                    <td class="text-center">
                                        <span class="label label-default">{{$activeStatus}}</span>
                                    </td>
                                    <td>
                                        <a href="mailto:{{ $user->EMAIL }}">{{ $user->EMAIL }}</a>
                                    </td>
                                    <td style="width: 20%;">
                                        <a href="{{ route('admin-profile', ['id' => $user->id]) }}" class="table-link">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                        </span>
                                        </a>

                                        <a href="{{ route('admin-delete-entity', ['entity' => 'candidate', 'id' => $user->id]) }}"
                                           class="table-link danger">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                        </span>
                                        </a>

                                        @php
                                            $action = ($user->ACTIVE == 1) ? 'Deactivate' : 'Activate';
                                        @endphp

                                        <a href="{{ route('admin-change-active-status',[
                                             'entity' => 'candidate',
                                             'id' => $user->id
                                             ]) }}"
                                           class="table-link link-success">
                                        <span class="fa-stack">
                                            {{$action}}
                                        </span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <h5>Empty users list</h5>
                    @endif
                </div>
                <!--pagination-->
                @if ($users->hasPages())
                    {{ $users->links('admin-pagination') }}
                @endif
            </div>
        </div>
    </div>
</div>
@include('admin_area.inc.footer')
