@extends('admin.layout')

@section('title')
Page Products
@endsection

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<style>
    .st0{fill:#C6C1C1;}
	.st1{fill:#827E7E;}
	.st2{fill:#C6C1C1;stroke:#827E7E;stroke-width:5;stroke-miterlimit:10;}
	.st3{font-family:'Arial-BoldMT';}
	.st4{font-size:12px;}
</style>
@endsection

@section('page_content')
<form method="POST">
    @csrf
    <div class="card">
        <div class="card-header">
            <h5><i class="fas fa-feather-alt"></i>&nbsp;&nbsp; Products Message</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <label class="col-md-3">Use products Page Top message</label>
                <label class="custom-checkbox">
                    <input type="checkbox" name="use_products_message" @if($use_products_message) checked @endif>
                    <div class="checkbox-body"></div>
                </label>
            </div>
            <label>Title</label>
            <input type="text" name="products_message_title" class="form-control" value="{!!$products_message_title!!}">
            <label class="mt-4">Message
            <textarea name="products_message_content" class="summernote" cols="110" rows="6">{!!$products_message_content!!}</textarea>
            </label>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5><i class="fas fa-desktop"></i>&nbsp;&nbsp; Products Columns</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3">Products Columns</div>
                <div class="col-lg-9">
                    <label class="rdo">
                        <input type="radio" name="products_columns" value="3" @if($products_page_columns == '3') checked @endif>
                         <div class="rdo-body">
                            <svg viewBox="0 0 100 60">
                                 <rect x="2" y="25" class="st0" width="95" height="33"/>
                                <path class="st1" d="M95,28v27H5V28H95 M100,23H0v37h100V23L100,23z"/>
                                <line  class="st2" x1="66" y1="23" x2="66" y2="59"/>
                                <line  class="st2" x1="33" y1="23" x2="33" y2="59"/>
                                <text transform="matrix(1 0 0 1 38 15)" class="st0 st3 st4">Three</text>
                            </svg>
                        </div>
                     </label>
                    <label class="rdo">
                    <input type="radio" name="products_columns" value="4"  @if($products_page_columns == '4') checked @endif>
                    <div class="rdo-body">
                        <svg viewBox="0 0 100 60">
                            <rect x="2" y="25" class="st0" width="95" height="33"/>
                            <path class="st1" d="M95,28v27H5V28H95 M100,23H0v37h100V23L100,23z"/>
                            <line class="st2" x1="75" y1="24" x2="75" y2="58"/>
                            <line class="st2" x1="50" y1="24" x2="50" y2="58"/>
                            <line class="st2" x1="25" y1="24" x2="25" y2="58"/>
                            <text transform="matrix(1 0 0 1 38 15)" class="st0 st3 st4">Four</text>
                        </svg>
                    </div>
                    </label>
                    <label class="rdo">
                        <input type="radio" name="products_columns" value="5"  @if($products_page_columns == '5') checked @endif>
                        <div class="rdo-body">
                            <svg viewBox="0 0 100 60">
                                <rect x="2" y="25" class="st0" width="95" height="33"/>
                                <path class="st1" d="M95,28v27H5V28H95 M100,23H0v37h100V23L100,23z"/>
                                <line class="st2" x1="80" y1="24" x2="80" y2="58"/>
                                <line class="st2" x1="60" y1="24" x2="60" y2="58"/>
                                <line class="st2" x1="40" y1="24" x2="40" y2="58"/>
                                <line class="st2" x1="20" y1="24" x2="20" y2="58"/>
                                <text transform="matrix(1 0 0 1 38 15)" class="st0 st3 st4">Five</text>
                            </svg>
                        </div>
                    </label>
                </div>
            </div>
            <div class="row py-4">
                <div class="col-lg-3">Maximum Products per page</div>
                <div>
                    <input type="number" name="products_page_max" class="form-control" value={{$products_page_max}}>
                </div>
            </div>
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

