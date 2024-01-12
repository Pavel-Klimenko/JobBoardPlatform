@extends('layouts.app')

@section('title')
    Contact
@endsection

@section('content')
    <!-- ================ contact section start ================= -->
    <section class="contact-section section_padding">
        <div class="container">
            <div class="d-none d-sm-block mb-5 pb-4">

                <div id="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3024.4442950374846!2d-74.05682228434466!3d40.708234845782265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c250c04f430689%3A0xf65049dd8310ba7d!2sLiberty%20Science%20Center!5e0!3m2!1sru!2sby!4v1639068963034!5m2!1sru!2sby"
                            width="600" height="480" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div><br/>
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Get in Touch</h2>
                    </div>
                    <div class="col-lg-8">
                        @include('forms.contactUs')
                    </div>

                    <div class="col-lg-4">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3>{{$ADDRESS}}</h3>
                                <p>Office</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                                <h3>{{$PHONE}}</h3>
                                <p>Phone</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3>{{$EMAIL}}</h3>
                                <p>Email</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection

