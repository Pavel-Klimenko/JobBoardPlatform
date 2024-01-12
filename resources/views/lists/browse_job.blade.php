@extends('layouts.app')

@section('title')
    Browse Job
@endsection

@section('content')
    <!-- job_listing_area_start  -->
    <div class="job_listing_area plus_padding">
        <div class="container">

            <div class="row">
                <div class="col-lg-3">
                    {{--filter component--}}
                    <x-vacanciesFilter/>
                </div>
                <div class="col-lg-9">
                    <div class="recent_joblist_wrap">
                        <div class="recent_joblist white-bg ">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h4>List of vacancies</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="job_lists m-0">
                        <div class="row">

                            @if (count($vacancies) > 0)
                                @foreach ($vacancies as $vacancy)
                                    @php
                                        $model = \App\Containers\Vacancies\Models\JobCategories::class;
                                        $catedory = \App\Ship\Helpers\Helper::getTableRow($model, 'ID', $vacancy->CATEGORY_ID);
                                    @endphp
                                    <div class="col-lg-12 col-md-12">
                                        <div class="single_jobs white-bg d-flex justify-content-between">

                                            <div class="jobs_left d-flex align-items-center">
                                                <div class="thumb">
                                                    <img src="{{ $vacancy->ICON }}" alt="">
                                                </div>
                                                <div class="jobs_conetent">
                                                    <a href="{{ route('show-vacancy', ['id' => $vacancy->ID]) }}">
                                                        <h4>{{ $vacancy->NAME }}</h4></a>
                                                    <div class="links_locat d-flex align-items-center">

                                                        <div class="location">
                                                            Category: <u>{{ ucfirst($catedory->NAME) }}</u><br/>
                                                            Salary from: <b>{{ $vacancy->SALARY_FROM }}$</b>
                                                        </div>

                                                        <div class="location">
                                                            <p>
                                                                <i class="fa fa-map-marker"></i>
                                                                {{ $vacancy->CITY }},
                                                                {{ $vacancy->COUNTRY }}
                                                            </p>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="jobs_right">
                                                <div class="apply_now">
                                                    <a href="{{ route('show-vacancy', ['id' => $vacancy->ID]) }}"
                                                       class="boxed-btn3">Look more</a>
                                                </div>
                                                <div class="date">
                                                    <p>updated at {{$vacancy->updated_at->format('d.m.Y')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-lg-12 col-md-12">
                                    <p>Vacancy list is empty</p>
                                </div>
                            @endif
                        </div>
                        <!-- pagination  -->
                        @if ($vacancies->hasPages())
                            {{ $vacancies->links('paginate') }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job_listing_area_end  -->
@endsection

