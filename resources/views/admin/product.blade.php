@extends('admin.layout')

@section('title')
Add New Product
@endsection

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('page_content')
@if(Session::has('errors'))
<div class="modal" id="error-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background:red;color:white">
      <div class="modal-header">
        <h3 class="modal-title">Error</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul>
          @foreach($errors->all() as $error)
          <li>{!!$error!!}</li>
          @endforeach
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endif
@if(isset($product))
<h1 class="h3 mb-4 text-gray-800">Edit Product</h1>
@else
<h1 class="h3 mb-4 text-gray-800">Add new product</h1>
@endif
<form method="post" enctype="multipart/form-data">
 @csrf
  <div class="row">
    <div class="col-lg-3">Product Title</div>
    <input type="text" name="title" class="form-control col-lg-9" @isset($product) value="{{$product->title}}" @endisset >
  </div>
  <hr>
  <div class="row">
    <div class="col-lg-3">Product Category</div>
    <div class="col-lg-9">
      @foreach ($categories as $category) 
        <div class="form-check">
          <input class="form-check-input" type="radio" id="radio-{{$category->name}}" name="category" value="{{$category->id}}" @if( isset($product) && $product->category->id == $category->id) checked @endif >
          <label class="form-check-label" for="radio-{{$category->name}}">{{$category->name}}</label>
        </div>
      @endforeach 
    </div>
  </div>
  <hr>
  <div class="my-5 row">
    <div class="col-lg-3">Product Thumbnail</div>
    <div class="col-lg-9">
      @if(isset($product))
      <img  id="thumbnail-preview" src="{{asset($product->thumbnail)}}">
      @else
      <img  id="thumbnail-preview">
      @endif
      <input type="file" name="product_thumbnail" accept="image/*" onchange="showImg(this,'thumbnail-preview')">
    </div>
    </div>
    <hr>
    <div class="my-5 row">
     <div class="col-lg-3">Product Image</div>
     <div class="col-lg-9">
      <img  id="image-preview" @isset($product) src="{{asset($product->image)}}" @endisset >
      <input type="file" name="product_image" accept="image/*" onchange="showImg(this,'image-preview')">
     </div>
    </div>
    <hr>
    <div class="row my-5">
     <div class="col-lg-3">Content</div>
     <textarea name="content" class="summernote col-lg-9"> @isset($product) {!!$product->content!!} @endisset </textarea>
    </div>
    <input type="submit" value="{{isset($product) ? 'Edit' : 'Save'}}" class="btn btn-primary">
</form>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
$(document).ready(function() {
  $('.summernote').summernote();
});
</script>
@if(Session::has('errors'))
<script>$('#error-modal').modal()</script>
@endif
@endsection