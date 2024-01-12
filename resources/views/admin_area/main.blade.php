@include('admin_area.inc.header')
<x-admin-menu/>

<main>
    <div class="row">
        <div class="col s6">
            <div style="padding: 35px;" align="center" class="card">
                <div class="row">
                    <div class="left card-title">
                        <b>Registered users</b>
                    </div>
                </div>

                <div class="row">
                    <a href="{{ route('admin-users', ['name' => $candidatesRole]) }}">
                        <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                            <i class="indigo-text text-lighten-1 large material-icons">person</i>
                            <span class="indigo-text text-lighten-1"><h5>Candidates</h5></span>
                        </div>
                    </a>
                    <div class="col s1">&nbsp;</div>
                    <div class="col s1">&nbsp;</div>

                    <a href="{{ route('admin-users', ['name' => $companiesRole]) }}">
                        <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                            <i class="indigo-text text-lighten-1 large material-icons">view_list</i>
                            <span class="indigo-text text-lighten-1"><h5>Companies</h5></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col s6">
            <div style="padding: 35px;" align="center" class="card">
                <div class="row">
                    <div class="left card-title">
                        <b>Website growth analytics</b>
                    </div>
                </div>
                <div class="row">
                    <a href="{{ route('analytics-line-chart', ['entity' => 'vacancies']) }}">
                        <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                            <i class="indigo-text text-lighten-1 large material-icons">store</i>
                            <span class="indigo-text text-lighten-1"><h5>New Vacancies</h5></span>
                        </div>
                    </a>

                    <div class="col s1">&nbsp;</div>
                    <div class="col s1">&nbsp;</div>

                    <a href="{{ route('analytics-line-chart', ['entity' => 'users']) }}">
                        <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                            <i class="indigo-text text-lighten-1 large material-icons">assignment</i>
                            <span class="indigo-text text-lighten-1"><h5>New users</h5></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s6">
            <div style="padding: 35px;" align="center" class="card">
                <div class="row">
                    <div class="left card-title">
                        <b>Vacancies and Reviews</b>
                    </div>
                </div>

                <div class="row">
                    <a href="{{ route('render-list', ['entity' => 'vacancies']) }}">
                        <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                            <i class="indigo-text text-lighten-1 large material-icons">local_offer</i>
                            <span class="indigo-text text-lighten-1"><h5>Vacancies</h5></span>
                        </div>
                    </a>

                    <div class="col s1">&nbsp;</div>
                    <div class="col s1">&nbsp;</div>

                    <a href="{{ route('render-list', ['entity' => 'reviews']) }}">
                        <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                            <i class="indigo-text text-lighten-1 large material-icons">loyalty</i>
                            <span class="indigo-text text-lighten-1"><h5>Reviews</h5></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col s6">
            <div style="padding: 35px;" align="center" class="card">
                <div class="row">
                    <div class="left card-title">
                        <b>Ratio analytics</b>
                    </div>
                </div>

                <div class="row">
                    <a href="{{ route('analytics-pie-chart', ['entity' => 'invitations']) }}">
                        <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                            <i class="indigo-text text-lighten-1 large material-icons">view_list</i>
                            <span class="indigo-text text-lighten-1"><h5>Invitation for an interview</h5></span>
                        </div>
                    </a>
                    <div class="col s1">&nbsp;</div>
                    <div class="col s1">&nbsp;</div>

                    <a href="{{ route('analytics-pie-chart', ['entity' => 'users']) }}">
                        <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                            <i class="indigo-text text-lighten-1 large material-icons">assignment</i>
                            <span class="indigo-text text-lighten-1"><h5>Users ratio</h5></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

@include('admin_area.inc.footer')



