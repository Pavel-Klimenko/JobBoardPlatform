@extends('layouts.app')

@section('title')
    {{$vacancy->NAME}}
@endsection

@section('content')
    <div class="job_details_area">
        <div class="container">
            <div class="row">

                <div class="col-lg-8">
                    @if($vacancy->IMAGE)
                        <div class="blog_item_img">
                            <img class="card-img rounded-0" width="750" src="{{$vacancy->IMAGE}}" alt="">
                        </div>
                        <br/><br/>
                    @endif
                    <div class="blog_item_img">
                        <h3>About company:</h3>
                        {{$company->DESCRIPTION}}
                    </div><br/><br/>

                    <div class="job_details_header">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="thumb">
                                    <img src="{{$vacancy->ICON}}" alt="">
                                </div>

                                <div class="jobs_conetent">
                                    <a href="#"><h4>{{$vacancy->NAME}}</h4></a>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location">
                                            <p><i class="fa fa-map-marker"></i>
                                                {{$vacancy->COUNTRY}},
                                                {{$vacancy->CITY}}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="descript_wrap white-bg">
                        <div class="single_wrap">
                            <h4>Job description</h4>
                            <p>{{$vacancy->DESCRIPTION}}</p>
                        </div>
                        <div class="single_wrap">
                            <h4>Responsibility</h4>
                            <ul>
                                @foreach (json_decode($vacancy->RESPONSIBILITY) as $point)
                                    <li>{{ $point }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="single_wrap">
                            <h4>Qualifications</h4>
                            <ul>
                                @foreach (json_decode($vacancy->QUALIFICATIONS) as $point)
                                    <li>{{ $point }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="single_wrap">
                            <h4>Benefits</h4>
                            <p>{{$vacancy->BENEFITS}}</p>
                        </div>
                    </div>

                    @if ($isCandidateFlag ?? '')
                        @include('forms.jobApply')
                    @endif

                </div>

                <div class="col-lg-4">
                    <div class="job_sumary">
                        <div class="summery_header">
                            <h3>Job Summery:</h3>
                        </div>
                        <div class="job_content">
                            <ul>
                                <li>Updated at: <span>{{$vacancy->updated_at->format('d.m.Y')}}</span></li>
                                <li>Salary from: <span><b>{{$vacancy->SALARY_FROM}}$</b></span></li>
                                <li>Base technology: <span><b>{{ucfirst($category->NAME)}}</b></span></li>
                                <br/>

                                <li>Company: <span><b>{{$company->NAME}}</b></span></li>
                                <li>Number of employees: <span><b>{{$company->EMPLOYEE_CNT}}</b></span></li>
                                <li>Company Website:
                                    <span>
                                            <a href="{{$company->WEB_SITE}}"><b>{{$company->WEB_SITE}}</b></a>
                                    </span>
                                </li>

                                <br/>
                                <li>Phone:
                                    <span>
                                            <a href="tel:{{$company->PHONE}}"><b>{{$company->PHONE}}</b></a>
                                    </span>
                                </li>
                                <li>Email:
                                    <span>
                                            <a href="mailto:{{$company->EMAIL}}"><b>{{$company->EMAIL}}</b></a>
                                    </span>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
