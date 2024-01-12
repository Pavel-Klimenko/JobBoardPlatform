@extends('layouts.app')

@section('title')
    {{$candidate->NAME}}
@endsection

@section('content')
    <div class="job_details_area">
        <div class="container">
            <div class="row">

                <div class="col-lg-8">
                    @if($candidate->IMAGE)
                        <div class="blog_item_img">
                            <img class="card-img rounded-0" width="750" src="{{$candidate->IMAGE}}" alt="">
                        </div>
                        <br/><br/>
                    @endif
                    <div class="job_details_header">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="thumb">
                                    <img src="{{$candidate->ICON}}" alt="">
                                </div>
                                <div class="jobs_conetent">
                                    <a href="javascript:void(0);"><h4>
                                            {{$candidate->NAME}}
                                        </h4></a>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location">
                                            <p><i class="fa fa-map-marker"></i>
                                                {{$candidate->COUNTRY}},
                                                {{$candidate->CITY}}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="descript_wrap white-bg">

                        <div class="single_wrap">
                            <h4>Level:</h4>
                            <p>
                                {{$candidate->LEVEL}}
                                {{ucfirst($category->NAME)}}
                                developer
                            </p>
                        </div>

                        <div class="single_wrap">
                            <h4>Experience:</h4>
                            <p>{{$candidate->EXPERIENCE}}</p>
                        </div>
                        <div class="single_wrap">
                            <h4>Education:</h4>
                            <p>{{$candidate->EDUCATION}}</p>
                        </div>
                        <div class="single_wrap">
                            <h4>Skills:</h4>
                            @foreach (json_decode($candidate->SKILLS) as $skill)
                                <b>{{ $skill }}&nbsp;&nbsp;&nbsp;</b>
                            @endforeach
                        </div>
                        <div class="single_wrap">
                            <h4>Languages:</h4>
                            <ul>
                                @foreach (json_decode($candidate->LANGUAGES) as $lang)
                                    <li>{{ $lang }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="single_wrap">
                            <h4>About me:</h4>
                            <p>{{$candidate->ABOUT_ME}}</p>
                        </div>
                    </div>
                    @if ($isCompanyFlag ?? '')
                        @include('forms.inviteCandidate')
                    @endif
                </div>

                <div class="col-lg-4">
                    <div class="job_sumary">
                        <div class="summery_header">
                            <h3>Candidate Summery:</h3>
                        </div>
                        <div class="job_content">
                            <ul>
                                <li>Updated at: <span>{{$candidate->updated_at->format('d.m.Y')}}</span></li>
                                <li>Desired salary: <span><b>{{$candidate->SALARY}}$</b></span></li>
                                <li>Base technology: <span><b>{{ucfirst($category->NAME)}}</b></span></li>
                                <li><span><b>{{$candidate->YEARS_EXPERIENCE}} years experience</b></span></li>
                                <br/>
                                <li>Phone:
                                    <span>
                                            <a href="tel:{{$candidate->PHONE}}"><b>{{$candidate->PHONE}}</b></a>
                                    </span>
                                </li>
                                <li>Email:
                                    <span>
                                            <a href="mailto:{{$candidate->EMAIL}}"><b>{{$candidate->EMAIL}}</b></a>
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
