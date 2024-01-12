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


                            @if($user->IMAGE)
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" width="750" src="{{asset($user->IMAGE)}}" alt="">
                                </div>
                            @endif

                            <div class="blog_details">
                                @include('forms.uploadImage')
                            </div>

                            <div class="blog_details user-info">
                                <h2>Name: <b>{{$user->NAME}}</b></h2>
                                <h2>Country: <b>{{$user->COUNTRY}}</b></h2>
                                <h2>City: <b>{{$user->CITY}}</b></h2>
                                <h2>Email: <b>{{$user->EMAIL}}</b></h2>
                                <h2>Phone: <b>{{$user->PHONE}}</b></h2>
                                <h2>Specialization: <b>{{ucfirst($category->NAME)}} developer</b></h2>
                                <h2>Level: <b>{{ucfirst($user->LEVEL)}}</b></h2>
                                <h2><u>{{$user->YEARS_EXPERIENCE}} years experience</u></h2>
                                <h2>Salary: <b>{{$user->SALARY}}$</b></h2>
                                <br/>
                                <h2>Experience: </h2>
                                <h4>{{$user->EXPERIENCE}}</h4>
                                <br/>
                                <h2>Education: </h2>
                                <h4>{{$user->EDUCATION}}</h4>
                                <br/><br/>
                                <h2>Technical skills: </h2>
                                @foreach (json_decode($user->SKILLS) as $point)
                                    <b>{{ $point }}&nbsp;&nbsp;</b>
                                @endforeach
                                <br/><br/>
                                <h2>Languages: </h2>
                                @foreach (json_decode($user->LANGUAGES) as $point)
                                    <b>{{ $point }}&nbsp;&nbsp;</b>
                                @endforeach
                                <br/><br/>
                                <h2>About me: </h2>
                                <h4>{{$user->ABOUT_ME}}</h4>
                            </div>

                            <div class="blog_details edit-form" style="display: none">
                                @include('personal.inc.edit-forms.editCandidate')
                            </div>

                            <div class="blog_details" id="edit_personal_info">
                                <a href="javascript:void(0);" type="button" class="btn btn-outline-success">Edit personal info</a>
                            </div>
                        </article>
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

