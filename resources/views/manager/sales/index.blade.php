@extends('layouts.admin')

@section('header')
Sales
@stop

@section('content')


<style>

#formtable {
    border-collapse: separate;
    border-spacing: 0 1em;
  }

  tbody {
    display:block;
    height:340px;
    overflow:auto;
    width: 100%;
    /*min-width: 800px;*/
}
thead, tbody tr {
    display:table;
    /*width:100%;*/
    table-layout:fixed;
}

th {
    width: 80px;
}
tr{
  /*height: 75px;*/
}

td {width: 80px;
    /*max-width: 100px;*/
    overflow: hidden;
    text-overflow: ellipsis;
}

</style>

@if(Session::has('deleted_sale'))
  <p class="bg-danger"><strong>{{session('deleted_sale')}}</strong></p>
@elseif(Session::has('created_sale'))
  <p class="bg-info"><strong>{{session('created_sale')}}</strong></p>
@elseif(Session::has('updated_sale'))
  <p class="bg-info"><strong>{{session('updated_sale')}}</strong></p>
@endif


<div class="col-sm-6">
	
{!!Form::open(['method'=>'POST','action'=>'SalesController@store'])!!}

<table id="formtable">

<tr>
<div class="form-group">
<td>{!!Form::label('amount','Amount:')!!}</td>
<td>{!!Form::number('amount', 'value',['style'=>'width:50px;', 'min'=>0, 'max'=>100])!!} %</td>
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
<td>{!!Form::date('ending_date')!!}</td>
</div>
</tr>


<tr>
<div class="form-group">
<td>
{!!Form::submit('Create Sale',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}
</td>
</div>
</tr>

</table>

@include('includes.form_error')
</div>



<div class="col-sm-6">


  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Amount</th>
        <th>Starting Date</th>
        <th>Ending Date</th>
        {{-- <th>Created At</th> --}}
      </tr>
    </thead>
    <tbody>

    @if($sales)
    	@foreach($sales as $sale)

      <tr class="success">
        <td><a href="{{route('sales.edit',$sale->id)}}">{{$sale->id}}</a></td>
        <td>{{$sale->amount*100}}%</td>
        <td>{{Carbon::createFromFormat('Y-m-d H:i:s', $sale->starting_date)->format('d-M-Y')}}</td>
        {{-- <td>{{$sale->starting_date->toDateTimeString()}}</td> --}}
        <td>{{Carbon::createFromFormat('Y-m-d H:i:s', $sale->ending_date)->format('d-M-Y')}}</td>
        {{-- <td>{{$sale->created_at->diffForHumans()}}</td> --}}
        <td>
        {{-- {!!Form::open(['method'=>'POST','action'=>['SalesController@addSaleProduct', $sale->id]])!!} --}}
        {{-- {{ csrf_field() }} --}}
        <a href="{{route('sales.add.product',$sale->id)}}" class="btn btn-primary">Add Products</a>
        {{--{!!Form::submit('Add Products',['class'=>'btn btn-primary'])!!}
        {!!Form::close()!!}</td> --}}
      </tr>

      	@endforeach
    @endif



    </tbody>
  </table>

</div>

@stop



