@extends('layouts.frontend')

@section('title', ($blog->meta_title ?: $blog->title) . ' | Ukaaye Satellite Systems')
@section('meta_description'){{ $blog->meta_description ?: \Illuminate\Support\Str::limit(strip_tags($blog->description), 160) }}@endsection
@section('meta_keywords', $blog->meta_keywords ?: 'Ukaaye Satellite Systems blog, CATV news Sri Lanka, satellite industry updates')
@section('og_type', 'article')
@section('og_image', url($blog->image_url))

@section('content')
    @include('frontend.blogdetails.hero')
    @include('frontend.blogdetails.blogdetails')

 @endsection