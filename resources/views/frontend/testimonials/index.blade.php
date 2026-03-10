@extends('layouts.frontend')

@section('body-class', 'inner-page')

@section('content')
    @include('frontend.testimonials.hero')
    @include('frontend.testimonials.testimonials')

 @endsection