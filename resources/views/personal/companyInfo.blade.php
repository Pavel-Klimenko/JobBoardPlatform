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
                                    <h2>Company : <b>{{$user->NAME}}</b></h2>
                                    <h2>Country: <b>{{$user->COUNTRY}}</b></h2>
                                    <h2>City: <b>{{$user->CITY}}</b></h2>
                                    <h2>Email: <b><a href="mailto:{{$user->EMAIL}}">{{$user->EMAIL}}</a></b></h2>
                                    <h2>Phone: <b><a href="tel:{{$user->PHONE}}">{{$user->PHONE}}</a></b></h2>
                                    <h2>Website: <b><a href="{{$user->WEB_SITE}}">{{$user->WEB_SITE}}</a></b></h2>
                                    <br/><br/>
                                    <h4>Number of staff: <b>{{$user->EMPLOYEE_CNT}}</b> people</h4>
                                    <br/><br/>
                                    <h2>About company: </h2>
                                    <p>{{$user->DESCRIPTION}}</p>
                            </div>


                            <div class="blog_details edit-form" style="display: none">
                                @include('personal.inc.edit-forms.editCompany')
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

