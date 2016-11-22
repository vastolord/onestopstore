@extends('layouts.index')


@section('content')

Shopping cart
@endsection

@section('content')
    @if(Session::has('success'))
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <div id="charge-massage" class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            </div>
        </div>



        @endif
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








@stop