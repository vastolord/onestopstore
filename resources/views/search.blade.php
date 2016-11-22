@extends('layouts.authapp')

@section('content')

<style>

.thumb{

	width: 60px;
	height: 60px;
}

#sortlinks {
    border-collapse: separate;
    border-spacing: 0 1em;
}

</style>

{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
 --}}

@include('layouts.searchII')


<div class="container">
    <div class="row col-sm-12">



{{-- sort links --}}
 <div class="col-md-2">

<table id="sortlinks">
{{-- <thead> --}}
	<tr>
		<th>
			Sort By:
		</th>
	</tr>
{{-- </thead> --}}
<tr><td>
{{-- @foreach($ids as $a)
	{{$a}}
@endforeach --}}

{{-- <a href="{{url('#')}}">Categories</a></td></tr> --}}


<tr><td>
<form action="{{route('bndSortSearched')}}" method="get">
	<input type="hidden" name="key" value="{{$key}}">
{{-- @if(!empty($ids)) --}}
@foreach((array)$ids as $i)
	<input type="hidden" name="ids[]" value="{{$i}}">
@endforeach
{{-- @endif --}}
<button type="submit" class="btn btn-info">Brand</button></form>
</td></tr>



<tr><td>
<form action="{{route('catSortSearched')}}" method="get">
    <input type="hidden" name="key" value="{{$key}}">
{{-- @if(!empty($ids)) --}}
@foreach((array)$ids as $i)
    <input type="hidden" name="ids[]" value="{{$i}}">
@endforeach
{{-- @endif --}}
<button type="submit" class="btn btn-info">Category</button></form>
</td></tr>



<tr><td>
<form action="{{route('sortaz')}}" method="get">
	<input type="hidden" name="key" value="{{$key}}">
{{-- @if(!empty($ids)) --}}
@foreach((array)$ids as $i)
	<input type="hidden" name="ids[]" value="{{$i}}">
@endforeach
{{-- @endif --}}
<button type="submit" class="btn btn-info">Name (A-Z)</button></form>
</td></tr>

<tr><td>
<form action="{{route('sortza')}}" method="get">
	<input type="hidden" name="key" value="{{$key}}">
{{-- @if(!empty($ids)) --}}
@foreach((array)$ids as $i)
	<input type="hidden" name="ids[]" value="{{$i}}">
@endforeach
{{-- @endif --}}
<button type="submit" class="btn btn-info">Name (Z-A)</button></form>
</td></tr>

<tr><td>
<form action="{{route('sorthl')}}" method="get">
{{-- @if(!empty($ids)) --}}
@foreach((array)$ids as $i)
	<input type="hidden" name="ids[]" value="{{$i}}">
@endforeach
{{-- @endif --}}
<button type="submit" class="btn btn-info">Price (High-Low)</button></form>
</td></tr>

<tr><td>
<form action="{{route('sortlh')}}" method="get">
{{-- @if(!empty($ids)) --}}
@foreach((array)$ids as $i)
	<input type="hidden" name="ids[]" value="{{$i}}">
@endforeach
{{-- @endif --}}
<button type="submit" class="btn btn-info">Price (Low-High)</button></form>
</td></tr>

</table>

</div>
{{-- sort links --}}


		
		{{-- search results --}}


        <div class="col-sm-10 col-md-10">



    <h4>Search result for: {{$key}} </h4><br>


@if(!empty($result))
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Stock</th>
        @foreach ($result as $product)
                        @if($product->onSale())
                        <th class="text-center">Actual Price</th>           
                        <th class="text-center">Sale Price</th>
                        @else
                        <th class="text-center">Price</th>                                   
                        @endif
                        <?php break; ?>
        @endforeach

                        <th> </th>
                    </tr>
                </thead>
                <tbody>



		@foreach ($result as $product)

                   
		{{-- Single item --}}
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object thumb" src="{{$product->photo? $product->photo->file : url('http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png')}}"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="{{route('product.detail',$product->id)}}">{{$product->title}}</a></h4>
                                <h5 class="media-heading"><a href="{{route('bycategory',$product->category->name)}}">{{$product->category->name}}</a></h5>
                                <span>Status: </span>
                                {!!$product->inStock() ? 
                                html_entity_decode('<span class="text-success"><strong>In Stock</strong></span>') :
                                html_entity_decode('<span class="text-danger"><strong>No Stock</strong></span>')
                            	!!}
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        {{-- <input type="email" class="form-control" id="exampleInputEmail1" value="3"> --}}
                        <strong>{{$product->stock?$product->stock:'0'}}</strong>
                        </td>

                        {{-- if On Sale --}}
                        @if($product->onSale())
                        <td class="col-sm-1 col-md-1 text-center" style="text-decoration: line-through;">
                        <strong>৳ {{number_format($product->price,2,'.',',')}}</strong></td>

                        <td class="col-sm-1 col-md-1 text-center">
                        <strong>৳ {{number_format(($product->salePrice()),2,'.',',')}}</strong></td>
                        
                        @else
                        <td class="col-sm-1 col-md-1 text-center">
                        <strong>৳ {{number_format($product->price,2,'.',',')}}</strong></td>


                        @endif
                        {{-- if On Sale --}}


 {{--<td class="col-sm-1 col-md-1 text-center"><strong>$14.61</strong></td> --}}
                        <td class="col-sm-1 col-md-1">
                        <button type="button" class="btn btn-success">
                            <span class="glyphicon glyphicon-plus"></span> Add to Cart
                        </button></td>
                    </tr>
 		 {{-- single Item --}}

 		      @endforeach
      	         </tbody>
            </table>
		

{{-- {{ $result->render() }} --}}
		
		@else
			<h4 class="text-danger" style="text-align: center;"><strong>No Match Found.</strong></h4>

@endif
{{-- result not empty --}}

        </div>
    </div>
</div>

		{{-- search results --}}


     {{-- {{count($posts)}} --}}
{{--      @foreach ($result as $product)

     <h4>{{$product->title}}</h4><br>
     <h4>{{$product->description}}</h4><br>
     <h4>{{$product->category}}</h4><br>

     @endforeach --}}

@endsection
