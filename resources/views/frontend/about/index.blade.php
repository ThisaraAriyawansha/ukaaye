@extends('layouts.frontend')

@section('body-class', 'inner-page')

@section('content')
    @include('frontend.about.hero')
    @include('frontend.about.about')
    @include('frontend.about.mission')
    @include('frontend.about.vision')
    @include('frontend.about.commitments')
 @endsection