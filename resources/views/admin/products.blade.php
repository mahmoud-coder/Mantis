@extends('admin.layout')

@section('title') 
all products
@endsection

@section('styles')

@endsection

@section('page_content')
@if(count($products) > 0)
<table class="table table-striped">
  <thead>
    <tr>
      <th>id</th>
      <th>Title</th>
      <th>Thumbnail</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach($products as $product)
    <tr>
      <th>{{$product->id}}</th>
      <td>{{$product->title}}</td>
      <td><img src="{{asset($product->thumbnail)}}" class="img-thumbnail"></td>
      <td>
        <a href="{!!route('admin.delete.product',['id' => $product->id ]) !!}" class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i> Delete</a> | 
        <a href="{!!route('admin.edit.product',['id' => $product->id ]) !!}" class="btn btn-sm btn-info"> <i class="fas fa-edit"></i> Edit</a>
      </td>
    </tr>
@endforeach
  </tbody>
</table>
<hr>
{{$products->links('admin.paginations.products')}}
@else
<h3>There are no product yet</h3>
@endif
@endsection

@section('scripts')

@endsection