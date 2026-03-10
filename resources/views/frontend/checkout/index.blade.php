@extends('layouts.frontend')

@section('body-class', 'inner-page')

@section('content')
    @include('frontend.checkout.hero')
    @include('frontend.checkout.checkout')

 @endsection