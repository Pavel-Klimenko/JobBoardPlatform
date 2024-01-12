@extends('layouts.app')

@section('title')
    Candidates
@endsection

@section('content')
    <!-- job_listing_area_start  -->
    <div class="job_listing_area plus_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    {{--filter component--}}
                    <x-candidatesFilter/>
                </div>
                <div class="col-lg-9">
                    <div class="recent_joblist_wrap">
                        <div class="recent_joblist white-bg ">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h4>List of candidates</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="job_lists m-0">
                        <div class="row">

                            @if (count($candidates) > 0)
                                @foreach ($candidates as $candidate)

                                    @php
                                    $model = \App\Containers\Vacancies\Models\JobCategories::class;
                                    $catedory = \App\Ship\Helpers\Helper::getTableRow($model, 'ID', $candidate->CATEGORY_ID);
                                    @endphp


                                    <div class="col-lg-12 col-md-12">
                                        <div class="single_jobs white-bg d-flex justify-content-between">

                                            <div class="jobs_left d-flex align-items-center">
                                                <div class="thumb">
                                                    <img src="{{ $candidate->ICON }}" width="48" height="48" alt="">
                                                </div>
                                                <div class="jobs_conetent">
                                                    <a href="{{ route('show-candidate', ['id' => $candidate->id]) }}">
                                                        <h4>{{ $candidate->NAME }}</h4></a>
                                                    <div class="links_locat d-flex align-items-center">

                                                        <div class="location">
                                                                {{ $candidate->LEVEL }}
                                                                {{ ucfirst($catedory->NAME) }}
                                                                developer
                                                            <p>
                                                                <b>{{ $candidate->YEARS_EXPERIENCE }} years experience</b>
                                                            </p>

                                                        </div>

                                                        <div class="location">
                                                            <p>
                                                                <i class="fa fa-clock-o"></i>
                                                                {{ $candidate->COUNTRY }},
                                                                {{ $candidate->CITY }}
                                                            </p>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="jobs_right">
                                                <div class="apply_now">
                                                    <a href="{{ route('show-candidate', ['id' => $candidate->id]) }}" class="boxed-btn3">
                                                        Look more
                                                    </a>
                                                </div>
                                                <div class="date">
                                                    <p>updated at {{$candidate->updated_at->format('d.m.Y')}}</p>
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
                        @if ($candidates->hasPages())
                            {{ $candidates->links('paginate') }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job_listing_area_end  -->
@endsection

