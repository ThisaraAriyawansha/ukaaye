@extends('layouts.frontend')

@section('title', 'Blog | Ukaaye Satellite Systems Sri Lanka')
@section('meta_description', 'Read the latest news, guides, and updates from Ukaaye Satellite Systems on CATV, satellite, CCTV, and fiber-optic products in Sri Lanka.')
@section('meta_keywords', 'satellite systems blog Sri Lanka, CATV news Sri Lanka, CCTV updates, fiber optic guides Sri Lanka')

@section('content')
    @include('frontend.blog.hero')
    @include('frontend.blog.blog')

 @endsection