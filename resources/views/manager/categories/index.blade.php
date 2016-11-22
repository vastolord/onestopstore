@extends('layouts.admin')

@section('header')
Categories
@stop

@section('content')




<div class="col-sm-6">
	

{!!Form::open(['method'=>'POST','action'=>'AddCategoriesController@store'])!!}
<div class="form-group">
{!!Form::label('name','Name:')!!}
{!!Form::text('name',null,['class'=>'form-control'])!!}
</div>
{!!Form::submit('Create Category',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}




</div>




<div class="col-sm-6">


@if($categories)	
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Created</th>
      </tr>
    </thead>
    
    @foreach($categories as $category)
    <tbody>
      <tr class="success">
        <td>{{$category->id}}</td>
        <td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></td>
        <td>{{$category->created_at ? $category->created_at->diffForHumans() : "No date"}}</td>
      </tr>
    </tbody>
  	@endforeach

  </table>
	@endif

</div>




@stop