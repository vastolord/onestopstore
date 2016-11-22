@extends('layouts.admin')

@section('header')
Add Products
@stop


@section('content')

{{-- <script type="text/javascript">
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };

</script> --}}

<div class="col-sm-12"> 
<img id="blah" alt="your image" width="150" height="150" />
{{-- <img src="" height="200" alt="Image preview..."> --}}
</div>
<br>
<br>

{!!Form::open(['method'=>'POST','action'=>'AddProductsController@store', 'files'=>true])!!}

<div class="col-sm-6">
<div class="form-group">
{!!Form::label('title','Product Name:')!!}
{!!Form::text('title',null,['class'=>'form-control'])!!}
</div>
</div>

<div class="row col-sm-12">

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
{!!Form::label('category_id','Category:')!!}
{!!Form::select('category_id',[''=>'Choose Category']+ $categories,null,['class'=>'form-control'])!!}
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
{!!Form::file('photo_id',null,['class'=>'form-control', 'id'=>'imgfile', 'onchange'=>'loadFile(event)'])!!}
</div>
</div>

<div class="col-sm-12">
<div class="form-group">
{!!Form::label('description','Description:')!!}
{!!Form::textarea('description',null,['class'=>'form-control','rows'=>4])!!} {{-- ,'rows'=>3 --}}
</div>
</div>


<div class="col-sm-6">
{!!Form::submit('Add Product',['class'=>'btn btn-primary'])!!}
</div>

{!!Form::close()!!}
</div>
<br>


<div class="row col-sm-12">
<br>
@include('includes.form_error')
</div>


{{-- <div class="form-group">
{{ Form::hidden('user_id', '') }}
</div>
 --}}

@stop


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



		

		// function previewFile() {

  // 		// var preview = document.querySelector('img');
  // 		var preview = getElementById('blah');
  // 		var file    = getElementById('imgfile').files[0];
  // 		var reader  = new FileReader();

  // 		reader.addEventListener("load", function () {
  //   		preview.src = reader.result;
  // 		}, false);

  // 		if (file) {
  //   		reader.readAsDataURL(file);
  // 			}
		// }
		var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('blah');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };



		document.getElementById("imgfile").addEventListener("mouseover", function(event){
				window.alert('ok');
		});



</script> 

@endsection