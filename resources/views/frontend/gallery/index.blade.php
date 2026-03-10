@extends('layouts.frontend')

@section('body-class', 'inner-page')

@section('content')
    @include('frontend.gallery.hero')
    @include('frontend.gallery.gallery')

 @endsection