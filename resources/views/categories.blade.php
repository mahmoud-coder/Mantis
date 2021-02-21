@extends('layouts.products')

@section('page-styles')
@parent
<link rel="stylesheet" href="{!! asset('/css/categories-style.css')!!}">
@endsection

@section('products')
@include('partials.categories')
@endsection