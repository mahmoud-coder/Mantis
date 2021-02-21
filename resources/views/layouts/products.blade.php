@extends('layouts.page')

@section('page-styles')
<link rel="stylesheet" href="{!! mix('/css/products-style.css')!!}">
@endsection

@section('page-content')
<div class="hero">
<img  class="products-hero-img" src="/images/products-hero.jpg">
</div>
@if($main_message->use)
<div class="products-page-main-message">
    <h3 class="message-title">{!! $main_message->title !!}</h3>
    <p class="message-content">{!! $main_message->content !!}</p>
</div>
@endif
@yield('products')
@endsection