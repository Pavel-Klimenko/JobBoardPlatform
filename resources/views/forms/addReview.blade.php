@extends('layouts.app')

@section('title')
    Add your review
@endsection

@section('content')
    <div class="job_details_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="apply_job_form white-bg">
                        <h4>Add review about <b>JobBoard</b></h4>
                        <form method="POST" action="{{ route('create-review') }}" id="rForm" enctype='multipart/form-data'>
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input_field">
                                        <input type="text" name="NAME" value="{{ old('NAME') }}" placeholder="Your name">
                                    </div>
                                    @error('NAME')
                                    <div class="alert alert-danger">{{ mb_strtoupper($message) }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <div class="input_field">
                                        <textarea name="REVIEW" id="" cols="30" rows="10"
                                                  placeholder="Type your review">{{ old('REVIEW') }}</textarea>
                                    </div>
                                    @error('REVIEW')
                                    <div class="alert alert-danger">{{ mb_strtoupper($message) }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button type="button" id="inputGroupFileAddon03"><i
                                                        class="fa fa-cloud-upload" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                        <div class="custom-file">
                                            <input name="PHOTO" type="file" class="custom-file-input" id="inputGroupFile03"
                                                   aria-describedby="inputGroupFileAddon03">
                                            <label class="custom-file-label" for="inputGroupFile03">Upload your photo</label>
                                        </div>
                                    </div>
                                    @error('PHOTO')
                                    <div class="alert alert-danger">{{ mb_strtoupper($message) }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <p class="uploaded-file"></p>
                                </div>

                                <div class="col-md-12">
                                    <div class="submit_btn">
                                        <button class="boxed-btn3 w-100 send-data-form" type="submit">Add review</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $( document ).ready(function() {
            $('#inputGroupFile03').change(function() {
                let filename = $('#inputGroupFile03').val();
                $('.uploaded-file').html('File added: ' + filename);
            });
        });

    </script>

@endsection



