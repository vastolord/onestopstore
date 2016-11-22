@extends('layouts.admin')



@section('header')
Create Users
@stop


@section('content')

{!!Form::open(['method'=>'POST','action'=>'AdminUsersController@store','files'=>true])!!}

<div class="form-group col-sm-6">
{!!Form::label('first_name','First Name:')!!}
{!!Form::text('first_name',null,['class'=>'form-control'])!!}
</div>

<div class="form-group col-sm-6">
{!!Form::label('last_name','Last Name:')!!}
{!!Form::text('last_name',null,['class'=>'form-control'])!!}
</div>

<div class="form-group col-sm-12">
{!!Form::label('email','Email:')!!}
{!!Form::email('email',null,['class'=>'form-control'])!!}
</div>

<div class="form-group col-sm-12">
{!!Form::label('role_id','Role:')!!}
{!!Form::select('role_id',[''=>'Choose Options']+$roles, null,['class'=>'form-control'])!!}
</div>

<div class="form-group col-sm-12">
{!!Form::label('is_active','Status:')!!}
{!!Form::select('is_active',array(1=>'Active',0=>'Not Active'),0,['class'=>'form-control'])!!}
</div>



<div class="form-group col-sm-12">
{!!Form::label('photo_id','Photo:')!!}
{!!Form::file('photo_id',null,['class'=>'form-control'])!!}
{{-- <img src="" id="profile-img-tag" width="200px" />
     <script type="text/javascript">
        function readURL(input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
        $('#profile-img-tag').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
        }
        }
        $("#photo_id").change(function(){
        readURL(this);
        });
        </script> --}}
</div>

<div class="form-group col-sm-12">
{!!Form::label('password','Password:')!!}
{!!Form::password('password',['class'=>'form-control'])!!}
</div>

<div class="form-group col-sm-12">
{!!Form::submit('Create User',['class'=>'btn btn-primary'])!!}
</div>

{!!Form::close()!!}

@include('includes.form_error')


@stop