@extends('layouts.frontend')

@section('body-class', 'inner-page')

@section('content')
    @include('frontend.product.hero')
    @include('frontend.product.product')

 @endsection