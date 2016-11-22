@extends('layouts.index')


@section('content')
<div class="container">
    <div class="row">

        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong>AllyTees.com</strong>
                        <br>
                        P.O. Box 2012
                        <br>
                        Detroit, Mi 48000
                        <br>
                        <abbr title="Phone">P:</abbr> (213) 484-6829
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em>Date: November, 12 2013</em>
                    </p>
                    <p>
                        <em>Receipt #: 0000015</em>
                    </p>
                </div>
            </div>
            <div class="row">

                <div class="text-center">
                    <img src="http://allytees.sudo-tv.com/download_file/view_inline/39/" alt="allytees-500-trans.png" width="180" height="180">
                    <h1>Receipt</h1>
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>#</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                    </tr>
                    </thead>
                    @foreach($products as $product)
                    <tbody>
                    <tr>
                        <td class="col-md-9"><em>{{$product['item']['title']}}</em></h4></td>
                        <td class="col-md-1" style="text-align: center"> {{$product['qty']}} </td>
                        <td class="col-md-1 text-center">{{$product['price']}}</td>
                        <td class="col-md-1 text-center">{{$product['qty']*$product['price']}}</td>
                    </tr>

                    <tr>


                    </tr>
                    @endforeach
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td class="text-right"><h4><strong>Total: </strong></h4></td>
                        <td class="text-center text-danger"><h4><strong>${{$totalprice}}</strong></h4></td>
                    </tr>
                    </tbody>
                </table>
                <div>
                    <h1 style="text-align:center;">
                        Thank you for your order.
                    </h1>

                    <button type="button" onclick="myFunction()" class="btn btn-success col-sm-2 pull-right">Print Copy</button>

                </div>
            </div>


        </div>
    </div>
    @section('script')
        <script>
            function myFunction() {
                window.print();
            }
        </script>
    @endsection
    @endsection