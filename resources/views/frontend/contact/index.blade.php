@extends('layouts.frontend')

@section('body-class', 'inner-page')

@section('content')
    @include('frontend.contact.hero')
    @include('frontend.contact.faq')
    @include('frontend.contact.contact')
    @include('frontend.contact.map')
    @include('frontend.contact.message')
 @endsection