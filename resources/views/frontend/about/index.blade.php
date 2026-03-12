@extends('layouts.frontend')

@section('title', 'About Us | Ukaaye Satellite Systems Sri Lanka')
@section('meta_description', 'Learn about Ukaaye Satellite Systems – a trusted wholesale distributor of CATV, satellite, CCTV, and fiber-optic products in Sri Lanka. Our mission, vision, and commitments.')
@section('meta_keywords', 'about Ukaaye Satellite Systems, satellite distributor Sri Lanka, CATV supplier Sri Lanka')

@section('content')
    @include('frontend.about.hero')
    @include('frontend.about.about')
    @include('frontend.about.mission')
    @include('frontend.about.vision')
    @include('frontend.about.commitments')
 @endsection