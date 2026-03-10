@extends('layouts.frontend')

@section('body-class', 'inner-page')

@section('content')
    @include('frontend.productdetails.hero')
    @include('frontend.productdetails.productdetails')

 @endsection