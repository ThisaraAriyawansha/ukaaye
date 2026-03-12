@use('Illuminate\Support\Str')
@use('Illuminate\Support\Facades\Storage')
@extends('layouts.frontend')

@section('title', 'Services | Ukaaye Satellite Systems Sri Lanka')
@section('meta_description', 'Explore the services offered by Ukaaye Satellite Systems – wholesale supply and distribution of CATV, satellite, CCTV, and fiber-optic products across Sri Lanka.')
@section('meta_keywords', 'satellite systems services Sri Lanka, CATV distribution services, CCTV supply services, fiber optic distribution Sri Lanka')

@section('content')
    @include('frontend.services.hero')
    @include('frontend.services.services')

 @endsection