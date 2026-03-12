@extends('layouts.frontend')

@section('title', ($product->meta_title ?: $product->title) . ' | Ukaaye Satellite Systems')
@section('meta_description'){{ $product->meta_description ?: \Illuminate\Support\Str::limit(strip_tags($product->description), 160) }}@endsection
@section('meta_keywords', $product->meta_keyword ?: 'Ukaaye Satellite Systems products, CATV equipment Sri Lanka, satellite products wholesale')
@section('og_type', 'product')
@section('og_image', url($product->main_img_url))

@section('content')
    @include('frontend.productdetails.hero')
    @include('frontend.productdetails.productdetails')

 @endsection