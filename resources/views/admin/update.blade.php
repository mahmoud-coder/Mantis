@extends('admin.layout')

@section('title') 
Udate
@endsection

@section('styles')
@endsection

@section('page_content')
<h1 class="h3 mb-0 text-gray-800">Update</h1>

<div class="card mb-4 py-3 border-left-info">
    <div class="card-body">
       <b class = "text-lg"> Current Version: </b> <span id="current-version"> {!! $version !!} </span>
    </div>
</div>

@if($update_exits)
<div class="card shadow mb-4" style="display:none" id="message-success">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Updated</h6>
    </div>
    <div class="card-body" id="message-success-content"></div>
</div>

<button class="btn btn-info btn-icon-split" id="update-btn">
    <span class="icon text-white-50"> <i class="fas fa-sync"></i> </span>
    <span class="text">Update to Version: {!! $update_to !!} </span>
</button>

@else
<p> <b>No Update file found,</b>  </p>
<p> make sure you extract the <u>update.zip</u> file to the site root</p>
@endif
@endsection

@section('scripts')
<script>
    $(function(){
        $("#update-btn").on('click',function(){
            $.ajax("{!! route('admin.update') !!}",{
                method:'POST',
                headers:{'X-CSRF-TOKEN':"{!! csrf_token() !!}" },
                success:function(response){
                    if(response.success){
                        $('#update-btn').hide()
                        $('#message-success').show()
                        $('#message-success-content').text(response.success)
                        $('#current-version').text('{!! $update_to !!}')
                    }
                }
            })
        })
    })
</script>
@endsection