@extends('layouts.page')

@section('page-styles')
<link rel="stylesheet" href="{!! mix('/css/contact-us-style.css') !!}">
@endsection

@section('page-content')
<div class="contact-us-bg">
<form method="POST">
    @csrf
<div class="contact-us-row">
    <div class="contact-us-illustrator">
        <div class="illustrator-title">CONTACT US</div>
        <svg viewBox="0 0 447.8 339" class="illustrator">
            <path class="st0" d="M28.9,302.9l169.7-105.6c17-10.6,38.5-10.6,55.5,0l169.7,105.6"/>
            <line class="st0" x1="263.7" y1="196.3" x2="423.8" y2="116.6"/>
            <line class="st0" x1="188.8" y1="195.3" x2="28.7" y2="115.6"/>
            <path class="st1" d="M260.2,25.2l-8.9-4.3c-15.8-7.6-34.1-7.6-49.9,0.1l-8.7,4.2"/>
            <path class="st2" d="M32.2,103.2L12,113.1v189c0,15,12.1,27.1,27.1,27.1h374.6c15,0,27.1-12.1,27.1-27.1V112.2 l-18.6-9"/>
            <path class="st3" d="M417.2,111.6V42.3c0-6.7-5.4-12.1-12.1-12.1H49.3c-6.7,0-12.1,5.4-12.1,12.1v69.3"/>
            <path class="st4" d="M112.2,95.7H62.9c-6.6,0-12-5.4-12-12V69.1c0-6.6,5.4-12,12-12h49.3c6.6,0,12,5.4,12,12v14.7 C124.2,90.4,118.8,95.7,112.2,95.7z"/>
            <line class="st5" x1="134.7" y1="64.9" x2="390.2" y2="64.9"/>
            <line class="st5" x1="134.7" y1="76.4" x2="390.2" y2="76.4"/>
            <line class="st5" x1="134.7" y1="87.4" x2="390.2" y2="87.4"/>
            <line class="st5" x1="134.7" y1="100.4" x2="390.2" y2="100.4"/>
            <line class="st5" x1="50.9" y1="111.9" x2="392.7" y2="111.9"/>
            <line class="st5" x1="50.9" y1="123.4" x2="390.2" y2="123.4"/>
            <line class="st5" x1="75.2" y1="134.9" x2="374.2" y2="134.9"/>
            <line class="st5" x1="108.7" y1="144.9" x2="337.7" y2="144.9"/>
            <line class="st5" x1="128.2" y1="156.4" x2="326.2" y2="156.4"/>
            <line class="st5" x1="151.2" y1="167.4" x2="304.2" y2="167.4"/>
            <line class="st5" x1="180.7" y1="180.4" x2="281.7" y2="180.4"/>
        </svg>
    </div>
    <div class="form-inputs">
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="email" placeholder="EMail">
        <input type="text" name="subject" placeholder="Subject">
        <textarea name="message" placeholder="Message" cols="30" rows="10"></textarea>
        <button class="send-btn">
            SEND
            <svg viewBox="0 0 512 512" width="24" height="24">
                <path d="M476 3.2L12.5 270.6c-18.1 10.4-15.8 35.6 2.2 43.2L121 358.4l287.3-253.2c5.5-4.9 13.3 2.6 8.6 8.3L176 407v80.5c0 23.6 28.5 32.9 42.5 15.8L282 426l124.6 52.2c14.2 6 30.4-2.9 33-18.2l72-432C515 7.8 493.3-6.8 476 3.2z"/>
            </svg>
        </button>
    </div>
</div>
</form>
</div>
@endsection