<ul id="slide-out" class="side-nav fixed z-depth-2">
    <li class="center no-padding">
        <div class="indigo darken-2 white-text" style="height: 180px;">
            <div class="row">
                <img style="margin-top: 5%;" width="100" height="100" src="https://res.cloudinary.com/dacg0wegv/image/upload/t_media_lib_thumb/v1463990208/photo_dkkrxc.png" class="circle responsive-img" />
                <p style="margin-top: -13%;">Admin panel</p>
            </div>
        </div>
    </li>
    <li id="dash_dashboard"><a class="waves-effect" href="{{ route('admin-main') }}"><b>Dashboard</b></a></li>

    <ul class="collapsible" data-collapsible="accordion">
        <li id="dash_users">
            <div id="dash_users_header" class="collapsible-header waves-effect"><b>Users</b></div>
            <div id="dash_users_body" class="collapsible-body">
                <ul>
                    @foreach ($roles as $role)
                        @if ($role->display_name == 'Administrator') @continue @endif
                        <li id="users_seller">
                            <a class="waves-effect" style="text-decoration: none;"
                               href="{{ route('admin-users', ['name' => $role->name]) }}">
                                {{$role->display_name}} list
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </li>
        <li id="dash_dashboard"><a class="waves-effect" href="{{ route('render-list', ['entity' => 'vacancies']) }}"><b>Vacancies</b></a></li>
        <li id="dash_dashboard"><a class="waves-effect" href="{{ route('render-list', ['entity' => 'reviews']) }}"><b>Reviews</b></a></li>
    </ul>
    <li id="dash_dashboard"><a class="waves-effect" href="{{ route('homepage') }}"><b>Go to website</b></a></li>

</ul>
