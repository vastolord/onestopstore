@extends('layouts.admin')



@section('header')
Edit Users
@stop


@section('content')

<style type="text/css">
	.pos-fixed{

		position: fixed;
		height: 200px;
		width: 200px;
	}
	.pos-rel{

		position: initial;

	}

</style>


<div class="row">

<div class="col-sm-3">
<div class="pos-fixed">
<img class="img-responsive img-rounded" src={{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}>
</div>
</div>

<div class="col-sm-9">
{!!Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=>true])!!}

<div class="form-group">
{!!Form::label('first_name','First Name:')!!}
{!!Form::text('first_name',null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
{!!Form::label('last_name','Last Name:')!!}
{!!Form::text('last_name',null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
{!!Form::label('email','Email:')!!}
{!!Form::email('email',null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
{!!Form::label('role_id','Role:')!!}
{!!Form::select('role_id',[''=>'Choose Options']+$roles, null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
{!!Form::label('is_active','Status:')!!}
{!!Form::select('is_active',array(1=>'Active',0=>'Not Active'),null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
{!!Form::label('photo_id','File:')!!}
{!!Form::file('photo_id',null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
{!!Form::label('password','Password:')!!}
{!!Form::password('password',['class'=>'form-control'])!!}
</div>


{!!Form::submit('Update User',['class'=>'btn btn-primary col-sm-3 pull-left'])!!}
{!!Form::close()!!}


{!!Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy', $user->id]])!!}
<div class="form-group">
{!!Form::submit('Delete User',['class'=>'btn btn-danger col-sm-3 pull-right'])!!}
</div>
{!!Form::close()!!}



</div>
</div>
<br>
<div class="row">
@include('includes.form_error')
</div>

@stop