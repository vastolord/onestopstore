@extends('layouts.admin')

@section('header')
Categories
@stop

@section('content')



<div class="col-sm-6">

{!!Form::model($category,['method'=>'PATCH','action'=>['AddCategoriesController@update', $category->id]])!!}
<div class="form-group">
{!!Form::label('name','Name:')!!}
{!!Form::text('name',null,['class'=>'form-control'])!!}
</div>


{!!Form::submit('Update Category',['class'=>'btn btn-primary col-sm-4 pull-left'])!!}
{!!Form::close()!!}

{!!Form::open(['method'=>'DELETE','action'=>['AddCategoriesController@destroy',$category->id]])!!}
{!!Form::submit('Delete Category',['class'=>'btn btn-danger col-sm-4 pull-right'])!!}
{!!Form::close()!!}


</div>
  


@stop