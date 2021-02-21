@extends('layouts.page')

@section('page-styles')
<link rel="stylesheet" href="{!! mix('/css/about-style.css') !!}">
@endsection

@section('page-content')
<div class="about-hero"></div>
<div class="about-messages">
    <div class="about-message-container"> {{-- to be repeated --}}
        <div class="featured-image">
            <img src="/images/about-strawberries.png">
        </div>
        <div class="about-message">
            <h3 class="about-message-title">Mantis Comapany</h3>
            <p class="about-message-content">Mants is one of the pioneers of Egyptian companies in the field of agriculture whither supervising farms or exporting agricultural products to the globe, relying on more than twenty years of experience in agriculture, products storing and packing; which made it gain the confidence of many farmers and traders. </p>
        </div>
    </div>

    {{-- the repeated ones --}}
    <div class="about-message-container"> 
        <div class="featured-image">
            <img src="/images/about-apricot.png">
        </div>
        <div class="about-message">
            <h3 class="about-message-title">Our Vision & Mission</h3>
            <p class="about-message-content">We aspire to build a long-term relationship of trust with our customers by providing the best products at the best prices, relying on high technolgy in agriculture, storing and packing with the observation international standards in our products.</p>
        </div>
    </div>

    <div class="about-message-container"> 
        <div class="featured-image">
            <img src="/images/about-apples.png">
        </div>
        <div class="about-message">
            <h3 class="about-message-title">Why Us?</h3>
            <ul class="about-message-content list">
                <li>We use the latest technologies in growing, packing and storing crops.</li>
                <li>We use the best packing materials.</li>
                <li>Our prices are competitive.</li>
                <li>Satisfying our customers is our first priority.<li>
            </ul>
        </div>
    </div>
</div>
@endsection