@extends('layouts.frontend')

@section('body-class', 'inner-page')

@section('content')
    @include('frontend.wishlist.hero')
    @include('frontend.wishlist.wishlist')

 @endsection