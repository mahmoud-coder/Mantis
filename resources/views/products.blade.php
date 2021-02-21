@extends('layouts.products')

@section('page-styles')
@parent
<style>
    .products .product-container{
        flex:0 0 {!! (100/$products_page_columns).'%'; !!};
    }
</style>
@endsection

@section('products')
<div class="products">
@foreach($products as $product)
<div class="product-container">
<div class="product">
    <img src="{{$product->thumbnail}}" class="product_thumbnail">
    <div class="product-title">{{$product->title}}</div>
    <a href="{{route('product',['slug' => $product->slug])}}" class="readmore">Read More</a>
</div>
</div>
@endforeach
</div>
{{$products->links('paginations.products')}}
@endsection