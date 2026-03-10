@extends('layouts.frontend')

@section('body-class', 'inner-page')

@section('content')
    @include('frontend.blog.hero')
    @include('frontend.blog.blog')

 @endsection