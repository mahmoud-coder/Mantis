@extends('layouts.page')

@section('page-styles')
<link rel="stylesheet" href="{!! mix('/css/home-style.css') !!}">
@endsection

@section('page-content')
<div class="hero">
    <img class="hero-img" src="/images/hero.jpg">
    <div class="hero-message">
        <h2 class="header">{!! $hero_message_title !!}</h2>
        <p class="content">{!! $hero_message_content !!}</p>
    </div>
</div>
<div class="about">
    <div class="about-message">
        <h2 class="header">{!! $about_message_title !!}</h2>
        <p class="content">{!! $about_message_content !!}</p>
    </div>
</div>
<div class="services">
    @if($use_cost)
    <div class="service">
        <div class="icon-container">
            <i class="icon-creadit-cards" style="font-size:75px;"></i>
        </div>
        <h3 class="header">COST</h3>
        <p class="content">{!!$cost_services_content!!}</p>
    </div>
    @endif
    @if($use_shipping)
    <div class="service">
        <div class="icon-container">
            <i class="icon-yatch" style="font-size:50px"></i>
        </div>
        <h3 class="header">SHIPPING</h3>
        <p class="content">{!!$shipping_services_content!!}</p>
    </div>
    @endif
    @if($use_packing)
    <div class="service">
        <div class="icon-container">
            <i class="icon-box"></i>
        </div>
        <h3 class="header">PACKING</h3>
        <p class="content">{!!$packing_services_content!!}</p>
    </div>
    @endif
    @if($use_quality)
    <div class="service">
        <div class="icon-container">
            <i class="icon-quality" style="font-size:85px"></i>
        </div>
        <h3 class="header">QUALITY</h3>
        <p class="content">{!!$quality_services_content!!}</p>
    </div>
    @endif
</div>
<div class="quality-policy">
    <div class="quality-policy-message">
        <h3 class="quality-policy-header">{!! $quality_policy_title !!}</h3>
        <hr>
        <p class="content">{!!$quality_policy_content!!}</p>
        <svg id="right-L" width="360" height="120" viewBox="0 0 240 80">
            <polygon class="L" points="0,0 240,0 240,80 220,80 220,20 0,20"/>
        </svg>
        <svg id="left-L" width="360" height="120" viewBox="0 0 240 80">
            <polygon class="L" points="0,0 20,0 20,60 240,60 240,80 0,80"/>
        </svg>
    </div>
</div>
<div class="products">
    <svg class="products-abstruct" width="196" height="229" viewBox="0 0 196 229">
    <rect id="XMLID_40_" x="11.1" y="49.8" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -43.0331 49.2081)" class="st0" width="53.6" height="53.6"/>
    <rect id="XMLID_42_" x="49.8" y="11.1" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -4.3664 65.2243)" class="st1" width="53.6" height="53.6"/>
    <rect id="XMLID_43_" x="89.6" y="49.9" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -20.1588 104.7648)" class="st2" width="53.6" height="53.6"/>
    <rect id="XMLID_44_" x="129.3" y="11.2" transform="matrix(0.7071 -0.7071 0.7071 0.7071 18.8841 121.5227)" class="st3" width="53.6" height="53.6"/>
    <rect id="XMLID_48_" x="11.1" y="164.4" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -124.0669 82.7734)" class="st4" width="53.6" height="53.6"/>
    <rect id="XMLID_47_" x="50.8" y="124.7" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -84.4002 99.2039)" class="st5" width="53.6" height="53.6"/>
    <rect id="XMLID_46_" x="91.6" y="162.5" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -99.1926 139.1585)" class="st6" width="53.6" height="53.6"/>
    <rect id="XMLID_45_" x="131.3" y="123.8" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -60.1497 155.9164)" class="st6" width="53.6" height="53.6"/>
    </svg>
    <hr class="top">
    <h3 class="header">Explore Our Products</h3>
    <h3 class="header shadow">Explore Our Products</h3>
    <hr class="bottom">
    {{--
        <!-- divide products to frozen and fresh -->
        @include('partials.categories')
    --}}
    <div class="products-grid">
        @foreach($products as $product)
            @include('partials.product',$product)
        @endforeach
    </div>
    <a href="{!! route('products') !!}" class="btn-all-products">check all products</a>
</div>
@endsection