@extends('layouts.app')

@section('title')
    {{$title}}
@endsection

@section('content')

    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <article class="blog_item">
                            <div class="blog_details">
                                @if (count($candidatesRequests) > 0)
                                    @foreach ($candidatesRequests as $request)
                                        <a class="d-inline-block"
                                           href="{{ route('show-vacancy', ['id' => $request->VACANCY_ID]) }}">
                                            <h2>{{$request->VACANCY_NAME}}</h2>
                                        </a><br/>

                                        <h4>Status: <u>{{mb_strtoupper($request->STATUS)}}</u></h4><br>
                                        @if($isCompanyFlag)
                                            <ul class="blog-info-link">
                                                <li>
                                                    <a href="{{ route('show-candidate', ['id' => $request->CANDIDATE_ID]) }}">
                                                        <p>Candidate: <b>{{$request->CANDIDATE_NAME}}</b></p>
                                                    </a>
                                                </li>
                                            </ul>

                                            @if($request->CANDIDATE_COVERING_LETTER)
                                                <b>Candidate`s covering letter:</b>
                                                <p>{{$request->CANDIDATE_COVERING_LETTER}}</p>
                                            @endif

                                        @elseif($isCandidateFlag)
                                            @php
                                                $model = \App\Models\User::class;
                                                $company = \App\Ship\Helpers\Helper::getTableRow($model, 'id', $request->COMPANY_ID)
                                            @endphp

                                            @if($request->STATUS == 'accepted')
                                                @include('personal.inc.acceptedInfo')
                                            @elseif($request->STATUS == 'rejected')
                                                @include('personal.inc.rejectedInfo')
                                            @endif

                                        @endif

                                        @if($isCompanyFlag)
                                            @include('personal.inc.companyButtons')
                                        @endif

                                    @endforeach
                                @else
                                    <div class="col-lg-12 col-md-12">
                                        <p>There are not interview requests</p>
                                    </div>
                                @endif
                            </div>
                        </article>

                        <!-- pagination  -->
                        @if ($candidatesRequests->hasPages())
                            {{ $candidatesRequests->links('paginate') }}
                        @endif

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        @include('personal.aside')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

@endsection


