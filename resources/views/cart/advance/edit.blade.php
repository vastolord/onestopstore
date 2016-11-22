@extends('layouts.app')


@section('content')
    <div class="row">

        {{--{!! Form::open(['method'=>'get','action'=>'AdvanceUser@update','files'=>'true','id'=>'payment-form']) !!}--}}
        {!! Form::model($user,['method'=>'PATCH','action'=>['AdvanceUser@update',$user->id],'files'=>'true']) !!}

        <div class="tab-content">
            <div class="tab-pane active" role="tabpanel" id="step1">
{{--                 <div class="col-md-12 well text-center">
                    <h3>Fill in your permanent shipping addresses edt</h3>
                </div>
 --}}

                <div class="row">
                    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                        <div class="col-xs-6">
                            <div class="form-group">
                                {{--<label for="firstname">First Name:</label>--}}
                                <input type="hidden" value="{{Auth::user()->first_name}}" class="form-control" id="firstname" name="firstname" required>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                {{--<label for="name">Last Name:</label>--}}
                                <input type="hidden" value="{{Auth::user()->last_name}}" class="form-control" id="lastname" name="lastname" required>
                                <input type="hidden" value="{{$user->id}}" class="form-control" id="id" name="id" required>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="street">Street:</label>
                                <input type="text" value="{{$user->street}}" class="form-control" id="street" name="street" required>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="country">Country:</label>
                                <input type="text" value="{{$user->country}}" class="form-control" id="country" name="country" required>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="province">Province:</label>
                                <input type="text" value="{{$user->province}}" class="form-control" id="province" name="province"  required>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="city">City:</label>
                                <input type="text" value="{{$user->city}}" class="form-control" id="city" name="city" required>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="postcode">Postcode:</label>
                                <input type="text" value="{{$user->postcode}}" class="form-control" id="postcode" name="postcode" required>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="phone">Phone number:</label>
                                <input type="text" value="{{$user->phone}}" class="form-control" id="phone" name="phone" required>
                            </div>
                        </div>
                        {{csrf_field()}}
                        <li><button type="submit" class="btn btn-primary next-step" onclick="">Save and continue</button></li>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!}

@endsection