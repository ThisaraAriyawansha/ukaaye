@extends('layouts.frontend')

@section('title', 'Gallery | Ukaaye Satellite Systems Sri Lanka')
@section('meta_description', 'View the Ukaaye Satellite Systems product and project gallery – CATV, satellite, CCTV, and fiber-optic installations and products in Sri Lanka.')
@section('meta_keywords', 'Ukaaye gallery, satellite products photos, CCTV installation gallery Sri Lanka')

@section('content')
    @include('frontend.gallery.hero')
    @include('frontend.gallery.gallery')

 @endsection