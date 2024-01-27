<div class="job_listing_area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section_title">
                    <h3>Job Listing</h3>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="brouse_job text-right">
                    <a href="#" class="boxed-btn4">Browse More Job</a>
                    {{--<a href="{{ route('browse-job') }}" class="boxed-btn4">Browse More Job</a>--}}
                </div>
            </div>
        </div>
        <div class="job_lists">
            <div class="row">
                @foreach ($vacancies as $vacancy)
                    <div class="col-lg-12 col-md-12">
                        <div class="single_jobs white-bg d-flex justify-content-between">

                            <div class="jobs_left d-flex align-items-center">
                                <div class="thumb">
                                    <img src="{{ $vacancy['ICON'] }}" alt="">
                                </div>
                                <div class="jobs_conetent">
                                    <a href="#">
                                    {{--<a href="{{ route('show-vacancy', ['id' => $vacancy->ID]) }}">--}}
                                        <h4>{{ $vacancy['NAME'] }}</h4></a>
                                    <div class="links_locat d-flex align-items-center">

                                        <div class="location">
                                            {{--Category: <u>{{ ucfirst($category->NAME) }}</u><br/>--}}
                                            Salary from: <b>{{ $vacancy['SALARY_FROM'] }}$</b>
                                        </div>

                                        <div class="location">
                                            <p>
                                                <i class="fa fa-map-marker"></i>
                                                {{ $vacancy['CITY'] }},
                                                {{ $vacancy['COUNTRY'] }}
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="jobs_right">
                                <div class="apply_now">
                                    <a href="#"
                                       class="boxed-btn3">Look more</a>
{{--                                    <a href="{{ route('show-vacancy', ['id' => $vacancy->ID]) }}"
                                       class="boxed-btn3">Look more</a>--}}
                                </div>
                                <div class="date">
                                    <p>updated at {{$vacancy['updated_at']}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
