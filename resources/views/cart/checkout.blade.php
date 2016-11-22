
@extends('layouts.app')


@section('content')
        <div class="row">
           
            <h1>Checkout</h1>
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
               
                <div id="charge-error" class="alert alert-danger {{!Session::has('error') ? 'hidden' : ''}}">
                    {{Session::get('error')}}
                </div>
                <h4>Total Price: ${{$total}}</h4>
                <form action="{{route('pay')}}" method="post" id="payment-form">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            {{--<label for="name">Name:</label>--}}
                            <input type="hidden" value="{{Auth::user()->first_name}}" class="form-control" id="name" name="name" required>
                        </div>
                    </div>
                    {{--<div class="col-xs-12">
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                    </div>--}}
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="card-name">Card Holder Name:</label>
                            <input type="text" class="form-control" id="card-name"  required>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="card-number">Credit Card Number:</label>
                            <input type="text" class="form-control" id="card-number"  required>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="card-expiry-month">Expiry Month:</label>
                            <input type="text" class="form-control" id="card-expiry-month"  required>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="card-expiry-year">Expiry Year:</label>
                            <input type="text" class="form-control" id="card-expiry-year"  required>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="card-cvc">CVC:</label>
                            <input type="text" class="form-control" id="card-cvc"  required>
                        </div>
                    </div>
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-success">Buy Now</button>
                </div>
                </form>
            </div>
        </div>


@endsection

@section('script')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="{{URL::to('js/payment.js')}}"></script>
@endsection