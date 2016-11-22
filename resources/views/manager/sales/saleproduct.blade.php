@extends('layouts.admin')



@section('header')
Attach Products
@stop



@section('content')

<style>
 #ptable tbody {
    display:block;
    height:340px;
    overflow:auto;
    width: 100%;
    /*min-width: 800px;*/
}
#ptable thead, #ptable tbody tr {
    display:table;
    /*width:100%;*/
    table-layout:fixed;
}

#ptable th {
    width: 80px;
}
tr{
  /*height: 75px;*/
}

#ptable td {
  text-align: center;
    width: 80px;
    /*max-width: 100px;*/
    overflow: hidden;
    text-overflow: ellipsis;
}


#otable th{
  width: 100px;
  text-align: center;
}

</style>



<div class="col-sm-6">


  <table class="table" style="max-width: 250px;">
      <tr><td><strong>ID</td> </strong><td><strong><a href="{{route('sales.edit',$sale->id)}}">{{$sale->id}}</a></strong></td></tr>
      <tr> <td><strong>Amount</strong></td> <td><strong>{{$sale->amount*100}}%</strong></td> </tr>
      <tr> <td><strong>Starts From</strong></td> <td><strong>{{Carbon::createFromFormat('Y-m-d H:i:s', $sale->starting_date)->format('d-M-Y')}}</strong></td> </tr>
      <tr> <td><strong>Ends At</strong></td> <td><strong>{{Carbon::createFromFormat('Y-m-d H:i:s', $sale->ending_date)->format('d-M-Y')}}</strong></td> </tr>
      <tr> <td><strong>Created At</strong></td> <td><strong>{{$sale->created_at->diffForHumans()}}</strong></td> </tr>
  </table>


<div class="row">
<br>
<br>
<strong>Added Products</strong>
<br>
<br>

  @if($onsale)
   <table id="otable" style="text-align:center;">
      <thead>
      <tr> 
      <th>ID</th>
      <th>Name</th>
      <th>Sale Price</th>
      </tr>
      </thead>
      <tbody>
      @foreach($onsale as $onsale)
      <tr class="success">
        <td>{{$onsale->id}}</td>
        <td>{{$onsale->title}}</td>
        <td>{{$onsale->salePrice() }}</td>
        <td>{!!Form::open(['method'=>'DELETE','action'=>['SalesController@detachProduct',$onsale->id]])!!}
        {{ csrf_field() }}
        {{-- <a href="{{route('sales.add.product',$sale->id)}}">Add Products</a> --}}
        {!!Form::submit('&times;',['class'=>'btn btn-danger'])!!}
        {{-- {{ Form::hidden('pid', $product->id) }} --}}
        {!!Form::close()!!}
        </td>
      </tr>
        @endforeach
  </tbody>
  </table>
    @endif


</div>



@include('includes.form_error')



</div>
<div class="col-sm-6">
<strong>Products</strong>
<br>
<br>
<table id="ptable">
  <thead>
  <tr>
  
  <th>ID</th>
  <th>Name</th>
  <th>Category</th>
  <th>Price</th>
  <th>Brand</th>
  
  </tr>
  </thead>
  <tbody>
  @if($products)
    
      @foreach($products as $product)
<tr class="success">
        <td>{{$product->id}}</td>
        <td>{{$product->title}}</td>
        <td>{{$product->category->name}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->brand? $product->brand->name: 'Non Brand'}}</td>
        <td>{!!Form::open(['method'=>'POST','action'=>['SalesController@attachProduct',$sale->id]])!!}
        {{ csrf_field() }}
        {{-- <a href="{{route('sales.add.product',$sale->id)}}">Add Products</a> --}}
        {!!Form::submit('Add',['class'=>'btn btn-primary'])!!}
        {{ Form::hidden('pid', $product->id) }}
        {!!Form::close()!!}</td>
        
</tr>
      @endforeach
        
  @endif
  </tbody>
</table>

</div>

@stop