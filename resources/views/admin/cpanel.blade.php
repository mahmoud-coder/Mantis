@extends('admin.layout')

@section('title')
 Admin 
@endsection

@section('styles')
<style>
   .svg-bg{fill:#eaeaea}
  .svg-txt{fill:darkgray;font-size:16px;font-weight:bold;user-select:none}
</style>
@endsection

@section('page_content')
<h1 class="h3 mb-4 text-gray-800">Site Options</h1>

<form method="POST" action="{{ route('site-options-save') }}" enctype="multipart/form-data">
@csrf
{{-- GENERAL OPTIONS --}}
<div class="card">
    <div class="card-header">
        <h5><i class="fas fa-cogs"></i>&nbsp;&nbsp; General Options</h5>
    </div>
    <div class="card-body">
    <div class="form-group row">
    <label for="site-title" class="col-lg-2 col-form-label">Site Title</label>
    <div class="col-lg-10">
      <input type="text" name="site-title" class="form-control" id="site-title" value={{$site_title}}>
    </div>
    </div>
    <div class="form-group row">
    <label for="site-email" class="col-lg-2 col-form-label">Site Email</label>
    <div class="col-lg-10">
      <input type="email" name="site-email"class="form-control" id="site-email" value={{$site_email}}>
    </div>
    </div>
    <div class="form-group row">
    <label for="site-phone" class="col-lg-2 col-form-label">Site Phone</label>
    <div class="col-lg-10">
      <input type="text" name="site-phone"class="form-control" id="site-phone" value={{$site_phone}}>
    </div>
    </div>
    </div>
</div>
{{-------------------------------------------------------------------}}
{{-- LOGO --}}
<div class="card">
  <div class="card-header">
    <h5><i class="fas fa-feather-alt"></i>&nbsp;&nbsp; Logo</h5>
  </div>
  <div class="card-body">
    <div class="row">
      <label for="logo" class="col-lg-2" >Site Logo</label>
      <div class="col-lg-10">
        <img src="{{asset('/storage/images/'.$site_logo_name)}}" class="img-thumbnail" style="max-width:200px;margin-bottom:25px" id="logo-preview">
        <br>
        <input type="file" name="logo" id="logo" accept="image/*" onchange="showImg(this,'logo-preview')">
      </div>
    </div>
    <hr>
    <div class="row">
      <label for="favicon" class="col-lg-2">Favicon</label>
      <div class="col-lg-10">
        <img src="{{asset('/storage/images/favicon.png')}}" class="img-thumbnail" id="favicon-preview">
        <input type="file" name="favicon" id="favicon" accept="image/png" onchange="showImg(this,'favicon-preview')">
      </div>
    </div>
  </div>
</div>

{{--------------------------------------------------------------------}}
{{-- SITE LAYOUT --}}
<div class="card">
  <div class="card-header">
    <h5><i class="fas fa-desktop"></i>&nbsp;&nbsp; Site Layout</h5>
  </div>
  <div class="card-body">
    <label class="rdo">
      <input type="radio" name="site-layout" value="full" @if($site_layout == 'full') checked @endif>
      <div class="rdo-body">
        <svg viewBox="0 0 100 60">
          <rect  class="svg-bg" x="2" y="2" width="96" height="56"/>
          <text id="XMLID_2_" transform="matrix(1 0 0 1 36 38)" class="svg-txt">Full</text>
        </svg>
      </div>
    </label>
    <label class="rdo">
      <input type="radio" name="site-layout" value="boxed" @if($site_layout == 'boxed') checked @endif>
      <div class="rdo-body">
        <svg viewBox="0 0 100 60">
          <rect  class="svg-bg" x="2" y="2" width="96" height="56"/>
          <rect  x="20" y="1" width="60" height="59" style="stroke:white;stroke-width:2px;fill:#dddddd"/>
          <text id="XMLID_2_" transform="matrix(1 0 0 1 28 38)" class="svg-txt">Boxed</text>
        </svg>
      </div>
    </label>
  </div>
</div>
{{---------------------------------------------------------------------}}
{{-- FACEBOOK --}}
<div class="card">
  <div class="card-header">
    <h5><i class="fab fa-facebook"></i>&nbsp;&nbsp; FaceBook</h5>
  </div>
  <div class="card-body">
    <div class="form-group row">
        <div class="col-lg-2">Use facebook</div>
        <div class="col-lg-10">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="show-facebook" name="show-facebook" @if($show_facebook) checked @endif>
            <label class="form-check-label" for="show-facebook">
            show facebook icon and link
            </label>
        </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="facebook-url" class="col-lg-2 col-form-label">FaceBook URL</label>
        <div class="col-lg-10">
        <input type="text" name="facebook-url"class="form-control" id="facebook-url" value="{{$facebook_url}}">
    </div>
  </div>
  </div>
</div>
{{------------------------------------------------------------------------}}
{{-- LINKEDIN --}}
<div class="card">
  <div class="card-header">
    <h5><i class="fab fa-linkedin"></i>&nbsp;&nbsp; Linkedin</h5>
  </div>
  <div class="card-body">
    <div class="form-group row">
        <div class="col-lg-2">Use linkedin</div>
        <div class="col-lg-10">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="show-linkedin" name="show-linkedin" @if($show_linkedin) checked @endif>
            <label class="form-check-label" for="show-linkedin">
            show linkedin icon and link
            </label>
        </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="linkedin-url" class="col-lg-2 col-form-label">linkedin URL</label>
        <div class="col-lg-10">
        <input type="text" name="linkedin-url"class="form-control" id="linkedin-url" value="{{$linkedin_url}}">
    </div>
  </div>
  </div>
</div>
<button type="submit" class="btn btn-primary">Save options</button>
</form>
@endsection
