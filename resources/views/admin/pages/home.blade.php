@extends('admin.layout')

@section('title')  
  Page Home 
@endsection

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('page_content')
<form method="POST">
  @csrf
  <div class="card">
    <div class="card-header">
      <h5><i class="fas fa-feather-alt"></i>&nbsp;&nbsp; Hero Message</h5>
    </div>
    <div class="card-body">
      <label for="hero-message-title">Title</label>
      <input type="text" name="hero_message_title" class="form-control" value="{!!$hero_message_title!!}">
      <label class="mt-4">Message</label>
      <textarea name="hero_message_content" class="summernote">{!!$hero_message_content!!}</textarea>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <h5><i class="fas fa-feather-alt"></i>&nbsp;&nbsp; About Message</h5>
    </div>
    <div class="card-body">
      <label>Title</label>
      <input type="text" name="about_message_title"  class="form-control" value = "{!!$about_message_title!!}">
      <label class="mt-4">About content</label>
      <textarea name="about_message_content" class="summernote">{!!$about_message_content!!}</textarea>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <h5><i class="fas fa-feather-alt"></i>&nbsp;&nbsp; Services Section</h5>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item py-4">
        <div class="row">
          <h4 class="col-md-3">Cost</h4>
          <div class="col-md-9">
            <div class="row">
              <p class="col-md-3">Us <span class="font-weight-bold">Cost</span> service</p>
              <label class="custom-checkbox col-md-9">
                <input type="checkbox" name="use_cost_service" @if($use_cost) checked @endif>
                <div class="checkbox-body"></div>
              </label>
              <div class="col-12">
                <textarea name="cost_service_content" class="summernote">{!!$cost_services_content!!}</textarea>
              </div>
            </div>
          </div>
        </div>
      </li>
      <li class="list-group-item py-4">
        <div class="row">
          <h4 class="col-md-3">Shipping</h4>
          <div class="col-md-9">
            <div class="row">
            <p class="col-md-3">Us <span class="font-weight-bold">Shipping</span> service</p>
            <label class="custom-checkbox col-md-9">
              <input type="checkbox" name="use_shipping_service" @if($use_shipping) checked @endif>
              <div class="checkbox-body"></div>
            </label>
            <div class="col-12">
              <textarea name="cost_shipping_content" class="summernote">{!!$shipping_services_content!!}</textarea>
            </div>
            </div>
          </div>
        </div>
      </li>
      <li class="list-group-item py-4">
        <div class="row">
          <h4 class="col-md-3">Packing</h4>
          <div class="col-md-9">
            <div class="row">
            <p class="col-md-3">Us <span class="font-weight-bold">Packing</span> service</p>
            <label class="custom-checkbox col-md-9">
              <input type="checkbox" name="use_packing_service" @if($use_packing) checked @endif>
              <div class="checkbox-body"></div>
            </label>
            <div class="col-12">
              <textarea name="cost_packing_content" class="summernote">{!!$packing_services_content!!}</textarea>
            </div>
            </div>
          </div>
        </div>
      </li>
      <li class="list-group-item py-4">
        <div class="row">
          <h4 class="col-md-3">Quality</h4>
          <div class="col-md-9">
            <div class="row">
            <p class="col-md-3">Us <span class="font-weight-bold">Quality</span> service</p>
            <label class="custom-checkbox col-md-9">
              <input type="checkbox" name="use_quality_service" @if($use_quality) checked @endif>
              <div class="checkbox-body"></div>
            </label>
            <div class="col-12">
              <textarea name="cost_quality_content" class="summernote">{!!$quality_services_content!!}</textarea>
            </div>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
<div class="card">
  <div class="card-header">
    <h5><i class="fas fa-feather-alt"></i>&nbsp;&nbsp; Quality Police</h5>
  </div>
  <div class="card-body">
    <label>Title</label>
    <input type="text" name="quality_policy_title" value = "{!!$quality_policy_title!!}" class="form-control">
    <label class="mt-4">Quality Policy Content</label>
    <textarea name="quality_policy_content" class="summernote">{!!$quality_policy_content!!}</textarea>
  </div>
</div>
<input type="submit" value="Save" class="btn btn-primary">
</form>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
$(document).ready(function() {
  $('.summernote').summernote();
});
</script>
@endsection