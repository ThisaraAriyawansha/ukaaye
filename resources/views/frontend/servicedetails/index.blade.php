@use('Illuminate\Support\Facades\Storage')
@extends('layouts.frontend')

@section('title', ($service->meta_title ?: $service->title) . ' | Ukaaye Satellite Systems')
@section('meta_description'){{ $service->meta_description ?: \Illuminate\Support\Str::limit(strip_tags($service->description), 160) }}@endsection
@section('meta_keywords', $service->meta_keyword ?: 'Ukaaye Satellite Systems services, CATV services Sri Lanka, satellite systems Sri Lanka')
@section('og_type', 'website')
@section('og_image', url($service->image_url))

@section('content')
    @include('frontend.servicedetails.hero')
    @include('frontend.servicedetails.servicedetails')

 @endsection