@extends('layouts.page')

@section('page-styles')
<link rel="stylesheet" href="{!! mix('/css/product-style.css')!!}">
@endsection

@section('page-content')
<div class="product-row">
<div class="product-image"> <img src="{{ asset($product->image) }}"> </div>
<div class="product-details-container">
    <div class="product-details">{!! $product->content !!}</div>
</div>
</div>
@endsection