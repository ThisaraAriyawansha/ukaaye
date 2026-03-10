@extends('layouts.frontend')

@section('body-class', 'inner-page')

@section('content')
    @include('frontend.cart.hero')
    @include('frontend.cart.cart')

 @endsection