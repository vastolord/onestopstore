@extends('layouts.admin')

@section('header')
Edit Sale
@stop


@section('content')
<style>
	#formtable {
    border-collapse: separate;
    border-spacing: 0 1em;
	}
</style>


<div class="col-sm-6">
	
{!!Form::model($sale,['method'=>'PATCH','action'=>['SalesController@update', $sale->id]])!!}

<table id="formtable">

<tr>
<div class="form-group">
<td>{!!Form::label('amount','Amount:')!!}</td>
<td>{!!Form::number('amount', $sale->amount*100,['style'=>'width:50px;', 'min'=>0, 'max'=>100])!!} %</td>
</div>
</tr>


<tr>
<div class="form-group">
<td>{!!Form::label('starting_date','Starting Date:')!!}</td>
<td>{!!Form::date('starting_date', Carbon::now())!!}</td>
</div>
</tr>


<tr>
<div class="form-group">
<td>{!!Form::label('ending_date','Ending Date:')!!}</td>
<td>{!!Form::date('ending_date', Carbon::now())!!}</td>
</div>
</tr>


<tr>
<div class="form-group col-md-6">
<td>
{!!Form::submit('Edit Sale',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}
</td>
</div>

<div class="form-group">
<td class=" col-md-6 pull-right">

{!!Form::open(['method'=>'DELETE','action'=>['SalesController@destroy', $sale->id]])!!}
{!!Form::submit('Delete Sale',['class'=>'btn btn-danger'])!!}
{!!Form::close()!!}

</td>
</div>
</tr>

</table>

@include('includes.form_error')
</div>

<div class="col-sm-6">

<h4 class="text-info">Current Status</h4>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Amount</th>
        <th>Starting Date</th>
        <th>Ending Date</th>
        <th>Created At</th>
      </tr>
    </thead>
    <tbody>

      <tr class="info">
        <td>{{$sale->id}}</td>
        <td>{{$sale->amount*100}}%</td>
        <td>{{Carbon::createFromFormat('Y-m-d H:i:s', $sale->starting_date)->format('d-M-Y')}}</td>
        <td>{{Carbon::createFromFormat('Y-m-d H:i:s', $sale->ending_date)->format('d-M-Y')}}</td>
        <td>{{$sale->created_at->diffForHumans()}}</td>
      </tr>



    </tbody>
  </table>

</div>





@stop

