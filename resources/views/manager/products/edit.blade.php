@extends('layouts.admin')


@section('header')
Edit Products
@endsection




@section('content')



<div class="row">
{!!Form::model($product,['method'=>'PATCH','action'=>['AddProductsController@update', $product->id],'files'=>true])!!}


<div class="col-sm-6">
<div class="form-group">
{!!Form::label('title','Product Name:')!!}
{!!Form::text('title',null,['class'=>'form-control'])!!}
</div>
</div>



<div class="col-sm-6">
<div class="form-group">
{!!Form::label('category_id','Category:')!!}
{!!Form::select('category_id',[''=>'Choose Category']+ $categories,null,['class'=>'form-control'])!!}
</div>
</div>



<div class="col-sm-6">
<div class="form-group">
{{ Form::radio('rchoice', 'id', true,['id'=>'r1']) }}
{!!Form::label('brand_id','Select Brand:')!!}
{!!Form::select('brand_id',[''=>'Choose Brand']+ $brands,null,['class'=>'form-control', 'id'=>'brand_id'])!!}
</div>
</div>


<div class="col-sm-6">
<div class="form-group">
{{ Form::radio('rchoice', 'name',false,['id'=>'r2']) }}
{!!Form::label('brand_name','Add Brand:')!!}
{!!Form::text('brand_name',null,['class'=>'form-control', 'id'=>'brand_name', 'disabled'=>'true'])!!}
</div>
</div>




<div class="col-sm-6">
<div class="form-group">
{!!Form::label('price','Unit Price:')!!}
{!!Form::text('price',null,['class'=>'form-control'])!!}
</div>
</div>


<div class="col-sm-6">
<div class="form-group">
{!!Form::label('stock','Stock:')!!}
{!!Form::text('stock',null,['class'=>'form-control'])!!}
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
{!!Form::label('photo_id','Photo:')!!}
{!!Form::file('photo_id',null,['class'=>'form-control'])!!}
</div>
</div>

<div class="col-sm-12">
<div class="form-group">
{!!Form::label('description','Description:')!!}
{!!Form::textarea('description',null,['class'=>'form-control','rows'=>4])!!} {{-- ,'rows'=>3 --}}
</div>
</div>


<div class="col-sm-12">
{!!Form::submit('Edit Post',['class'=>'btn btn-primary col-sm-3 pull-left'])!!}
{!!Form::close()!!}


{!!Form::open(['method'=>'DELETE','action'=>['AddProductsController@destroy', $product->id]])!!}
<div class="form-group">
{!!Form::submit('Delete Post',['class'=>'btn btn-danger col-sm-3 pull-right'])!!}
</div>
{!!Form::close()!!}
</div>



</div>
<br>
<div class="row">
@include('includes.form_error')
</div>


@endsection



@section('JS')
<script type="text/javascript">


		function ToggleId() {
        document.getElementById('brand_name').disabled = true;
    	document.getElementById('brand_id').disabled = false;
		}
		
		function ToggleName() {
        document.getElementById('brand_name').disabled = false;
    	document.getElementById('brand_id').disabled = true;
		}
		
		document.getElementById("r1").addEventListener("change", ToggleId);
		document.getElementById("r2").addEventListener("change", ToggleName);

</script> 

@endsection
