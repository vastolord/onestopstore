@extends('layouts.admin')

@section('header')
Categories
@stop

@section('content')



<div class="col-sm-6">

{!!Form::model($brand,['method'=>'PATCH','action'=>['AddBrandsController@update', $brand->id]])!!}
<div class="form-group">
{!!Form::label('brand','Name:')!!}
{!!Form::text('brand',null,['class'=>'form-control'])!!}
</div>


{!!Form::submit('Update Brand',['class'=>'btn btn-primary col-sm-4 pull-left'])!!}
{!!Form::close()!!}

{!!Form::open(['method'=>'DELETE','action'=>['AddBrandsController@destroy',$brand->id]])!!}
{!!Form::submit('Delete Brand',['class'=>'btn btn-danger col-sm-4 pull-right'])!!}
{!!Form::close()!!}


</div>
  


@stop