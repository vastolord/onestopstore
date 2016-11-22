@extends('layouts.admin')

@section('header')
Brands
@stop

@section('content')




<div class="col-sm-6">
	

{!!Form::open(['method'=>'POST','action'=>'AddBrandsController@store'])!!}
<div class="form-group">
{!!Form::label('brand','Name:')!!}
{!!Form::text('brand',null,['class'=>'form-control'])!!}
</div>
{!!Form::submit('Add Brand',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}




</div>




<div class="col-sm-6">


@if($brands)	
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Created</th>
      </tr>
    </thead>
    
    @foreach($brands as $brand)
    <tbody>
      <tr class="success">
        <td>{{$brand->id}}</td>
        <td><a href="{{route('brands.edit', $brand->id)}}">{{$brand->brand}}</a></td>
        <td>{{$brand->created_at ? $brand->created_at->diffForHumans() : "No date"}}</td>
      </tr>
    </tbody>
  	@endforeach

  </table>
	@endif

</div>




@stop