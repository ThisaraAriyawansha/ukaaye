@extends('layouts.frontend')

@section('body-class', 'inner-page')

@section('content')
    @include('frontend.faq.hero')
    @include('frontend.faq.cta')
    @include('frontend.faq.faq')
    @include('frontend.faq.blog')

 @endsection