@extends('layouts.admin')



@section('header')
Products
@stop



@section('content')

@if(Session::has('deleted_product'))
  <p class="bg-danger"><strong>{{session('deleted_product')}}</strong></p>
@elseif(Session::has('created_product'))
  <p class="bg-info"><strong>{{session('created_product')}}</strong></p>
@elseif(Session::has('updated_product'))
  <p class="bg-info"><strong>{{session('updated_product')}}</strong></p>
@endif


  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>Brand</th>
        <th>Category</th>
        <th>Description</th>
        <th>Unit Price</th>
        <th>Stock</th>
        <th>Added At</th>
        <th>Updated At</th>
      </tr>
    </thead>
    <tbody>

    @if($products)
    	@foreach($products as $product)

      <tr class="success">
        <td>{{$product->id}}</td>
        <td><img height=40 src="{{$product->photo ? $product->photo->file : 'http://placehold.it/400x400'}}"></td>
        
       {{--  <td><img height=40 src="{{$product->imgpath ? $product->imgpath : 'http://placehold.it/400x400'}}"></td> --}}
        <td><a href="{{route('products.edit',$product->id)}}">{{$product->title}}</a></td>
        <td>{{$product->brand ? $product->brand->brand : "No Brand"}}</td>
        <td>{{$product->category ? $product->category->name : "Uncategorized"}}</td>
        <td>{{str_limit($product->description,20)}}</td>
        <td>{{($product->price)}}</td>
        <td>{{($product->stock? $product->stock : "No Stock")}}</td>
        <td>{{$product->created_at->diffForHumans()}}</td>
        <td>{{$product->updated_at->diffForHumans()}}</td>
      </tr>

      	@endforeach
    @endif



    </tbody>
  </table>
@stop