@use('Illuminate\Support\Str')
@use('Illuminate\Support\Facades\Storage')
@extends('layouts.frontend')

@section('title', 'Ukaaye Satellite Systems | CATV, Satellite, CCTV & Fiber Optic Products Sri Lanka')
@section('meta_description')Ukaaye Satellite Systems – Sri Lanka's leading wholesale distributor of CATV, satellite, CCTV, and fiber-optic & data networking products. Trusted supplier for dealers island-wide.@endsection
@section('meta_keywords', 'CATV products Sri Lanka, satellite products Sri Lanka, CCTV wholesale Sri Lanka, fiber optic products Sri Lanka, data networking products Sri Lanka, Ukaaye Satellite Systems')

@section('content')
    @include('frontend.home.hero')
    @include('frontend.home.about')
    @include('frontend.home.services')
    @include('frontend.home.cta')
    @include('frontend.home.product')
    @include('frontend.home.testimonials')
    @include('frontend.home.blog')
    @include('frontend.home.company')
 @endsection