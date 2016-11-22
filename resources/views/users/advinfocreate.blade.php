@extends('layouts.authapp')


@section('content')

<h3 class="col-md-offset-2">{{(strtolower(substr(Auth::user()->name(), -1))=="s") ? Auth::user()->name()."'" : Auth::user()->name() . "'s"}} Info:  </h3>

<div class="col-md-offset-2 col-sm-6">


<div class="row col-md-offset-3">

{!!Form::model(Auth::user(),['method'=>'POST','action'=>['UserInfoController@usersInfoStore'],'files'=>true])!!}


<div class="col-sm-6">
<div class="form-group">
{!!Form::label('first_name','First Name:')!!}
{!!Form::text('first_name', null,['class'=>'form-control'])!!}
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
{!!Form::label('last_name','Last Name:')!!}
{!!Form::text('last_name',null,['class'=>'form-control'])!!}
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
{!!Form::label('birthday','Date of Birth:')!!}
{!!Form::date('birthday',Auth::user()->advanced? Auth::user()->advanced->date : null,['class'=>'form-control','id'=>'bday'])!!}
</div>
</div>


<div class="col-sm-6">
<div class="form-group">
{!!Form::label('gender','Gender:')!!}
{!!Form::select('gender',[''=>'Choose Gender'] + ['Female'=>'Female','Male'=>'Male','Other'=>'Other'],Auth::user()->advanced? Auth::user()->advanced->gender : null,['class'=>'form-control'])!!}
</div>
</div>



<div class="col-sm-6">
<div class="form-group">
{!!Form::label('street','Street:')!!}
{!!Form::text('street',Auth::user()->advanced? Auth::user()->advanced->street : null,['class'=>'form-control'])!!}
</div>
</div>


<div class="col-sm-6">
<div class="form-group">
{!!Form::label('city','City:')!!}
{!!Form::text('city',Auth::user()->advanced? Auth::user()->advanced->city : null,['class'=>'form-control'])!!}
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
{!!Form::label('postcode','Postcode:')!!}
{!!Form::text('postcode',Auth::user()->advanced? Auth::user()->advanced->postcode : null,['class'=>'form-control'])!!}
</div>
</div>


<div class="col-sm-6">
<div class="form-group">
{!!Form::label('country_id','Country:')!!}
{!!Form::select('country_id',[''=>'Choose Country'] + $countries,Auth::user()->advanced? Auth::user()->advanced->country_id : null,['class'=>'form-control'])!!}
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
{!!Form::label('phone','Phone No:')!!}
{!!Form::text('phone',Auth::user()->advanced? '0'.Auth::user()->advanced->phone : null,['class'=>'form-control'])!!}
</div>
</div>



<div class="col-sm-6">
<div class="form-group">
{!!Form::label('photo_id','Photo:')!!}
{!!Form::file('photo_id',null,['class'=>'form-control'])!!}
</div>
</div>




<div class="col-sm-12">
{!!Form::submit('Save Info',['class'=>'btn btn-primary col-sm-3 pull-right'])!!}
{!!Form::close()!!}
</div>
</div>

<br>

<div class="col-md-offset-2" style="text-align: center;">
@include('includes.form_error')
</div>


<script type="text/javascript">

var setDate = <?php echo json_encode(Auth::user()->advanced? Auth::user()->advanced->birthday:NULL); ?>; 
if(setDate){
document.getElementById("bday").defaultValue =setDate;
}else{
document.getElementById("bday").defaultValue = "";
}

</script>

@stop