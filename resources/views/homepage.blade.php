@extends('layouts.app')

@section('title')
    Homepage
@endsection

@section('content')
{{--    @include('home_blocks.job_filter')--}}
    @include('home_blocks.job_categories')
{{--    @include('home_blocks.job_listing')--}}
{{--    @include('home_blocks.candidates')--}}
{{--    @include('home_blocks.companies')--}}
{{--    @include('home_blocks.job_searching')--}}
{{--    @include('home_blocks.reviews')--}}
@endsection

