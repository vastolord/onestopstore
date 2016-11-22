@extends('layouts.app')


@section('content')


<style>
    
.center-cropped {
  width: 300px;
  height: 160px;
  object-fit: cover; 
  background-position: center;
  background-repeat: no-repeat;
  overflow: hidden;
}

#myModal{

    z-index: 9999 !important;
}

.flash{

    width: 50%;
    margin: -32px auto;
}

</style>

    {{-- 


    @foreach ($product->chunk(3) as $chunk)
        <div class="row">
            @foreach ($chunk as $products)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="{{$products->imgpath}}" alt="...">
                        <div class="caption">
                            <h3>{{$products->title}}</h3>
                            <p class="description">{{$products->description}}</p>
                            <div class="price pull-left">{{$products->price}}</div>
                            <div class="clearfix"><a href="{{route('cart',['id'=>$products->id])}}" class="btn btn-success pull-right" role="button">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
 --}}




             {{-- bodycontainer --}}

<div class="row">
@include('layouts.searchII')
</div>
<div class="row container flash">
        @if(Session::has('waitforverification'))
                    <div class="alert alert-info" style="text-align:center;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{session('waitforverification')}}</strong>
                    </div>
        @endif
        @if(Session::has('loggedin'))
                    <div class="alert alert-success" style="text-align:center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{session('loggedin')}}</strong>
                    </div>
        @endif
        
        @if(Session::has('verifyprompt'))
                    <div class="alert alert-danger" style="text-align:center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{session('verifyprompt')}}</strong>
                    </div>
        @elseif(Session::has('verified'))
                    <div class="alert alert-success" style="text-align:center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{session('verified')}}</strong>
                    </div>
        @endif        
</div>
  

<div class="container-fluid">

    <div class="container">

  
@foreach ($product->chunk(3) as $chunk)
        <div class="row">
            @foreach ($chunk as $products)
                          {{-- item --}}
                          <div class="col-xs-12 col-sm-4">                      
                        <div class="panel panel-primary" style="border-color: #222;">
                                <a  style="color: #FFF;" href="{{route('product.detail',$products->id)}}">
                                <div class="panel-heading" style="background-color: #222; border-color: #222;">
                                    {{$products->title}}
                                </div>
                                <div class="panel-body align-center">
                                <img class="center-cropped img-responsive center-block" src="{{$products->imgpath}}">
                                </div></a>
                        
                        <div class="panel-footer text-muted">
                            <p class="description">{{$products->description}}</p>
                            <div class="price pull-left">Price: ৳ {{$products->price}}</div>
                            <div class="clearfix"><a href="{{route('cart.add',['id'=>$products->id])}}" class="btn btn-success pull-right" role="button">Add to cart</a>
                                </div>
                            </div>
                        </div>
                        </div>
                        {{-- item ends --}}


                  {{-- item --}}
                          <div class="col-xs-12 col-sm-4">                      
                        <div class="panel panel-primary" style="border-color: #222;">
                                <a  style="color: #FFF;" href="{{route('product.detail',$products->id)}}">
                                <div class="panel-heading" style="background-color: #222; border-color: #222;">
                                    {{$products->title}}
                                </div>
                                <div class="panel-body align-center">
                                <img class="center-cropped img-responsive center-block" src="{{$products->imgpath}}">
                                </div></a>
                        
                        <div class="panel-footer text-muted">
                            <p class="description">{{$products->description}}</p>
                            <div class="price pull-left">Price: ৳ {{$products->price}}</div>
                            <div class="clearfix"><a href="{{(Auth::guest())? route('login') : route('cart.add',['id'=>$products->id])}}" class="btn btn-success pull-right" role="button">Add to cart</a>
                                </div>
                            </div>
                        </div>
                        </div>
                        {{-- item ends --}}

            @endforeach

    {{-- {{$product->render()}} --}}
        </div>
        {{-- row-ends --}}
    @endforeach
    

</div>
</div>
{{-- body-container --}}














@stop