@extends('layouts.admin')



@section('header')
Previous Sales
@stop



@section('content')

<div class="col-md-offset-2 col-sm-6">


  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Amount</th>
        <th>Started At</th>
        <th>Ended At</th>
        <th>Created At</th>
      </tr>
    </thead>
    <tbody>

  @if($previous)


      @foreach($previous as $previous)

      <tr class="warning">
        <td>{{$previous->id}}</td>
        <td>{{$previous->amount*100}}%</td>
        <td>{{Carbon::createFromFormat('Y-m-d H:i:s', $previous->starting_date)->format('d-M-Y')}}</td>
        {{-- <td>{{$sale->starting_date->toDateTimeString()}}</td> --}}
        <td>{{Carbon::createFromFormat('Y-m-d H:i:s', $previous->ending_date)->format('d-M-Y')}}</td>
        <td>{{$previous->created_at->diffForHumans()}}</td>
      </tr>
        @endforeach
        
    @endif


    </tbody>
  </table>




</div>


@stop