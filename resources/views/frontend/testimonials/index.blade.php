@extends('layouts.frontend')

@section('title', 'Testimonials | Ukaaye Satellite Systems Sri Lanka')
@section('meta_description')See what our clients say about Ukaaye Satellite Systems – trusted wholesale distributor of CATV, satellite, CCTV, and fiber-optic products across Sri Lanka.@endsection
@section('meta_keywords', 'Ukaaye testimonials, Ukaaye Satellite Systems reviews, CATV distributor reviews Sri Lanka')

@section('content')
    @include('frontend.testimonials.hero')
    @include('frontend.testimonials.testimonials')

 @endsection