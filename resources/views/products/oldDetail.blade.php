@extends('layouts.app')

@section('content')
{{-- <link href="../css/font-awesome.min.css" rel="stylesheet" > --}}
{{-- <link href="../css/bootstrap.min.css" rel="stylesheet"> --}}
 <meta charset="utf-8">
 <meta content="IE=edge" http-equiv="X-UA-Compatible">
 <meta content="width=device-width, initial-scale=1" name="viewport">
 {{-- <link href="../css/styles.css" rel="stylesheet"> --}}
        {{-- <link href="../css/app.css" rel="stylesheet"> --}}
{{-- <link rel="stylesheet" href="{{url('/css/w3.css')}}"> --}}
<style type="text/css">
	/*********************************************
    			Call Bootstrap
*********************************************/


/*********************************************
        		Theme Elements
*********************************************/

.gold{
	color: #FFBF00 !important; 
}

/*********************************************
					PRODUCTS
*********************************************/

.product{
	border: 1px solid #dddddd !important;
	height: 321px !important;
}
/*
.product>img{
	max-width: 230px !important;
}*/

#item-display{
	max-width: 230px !important;

}

.product-rating{
	font-size: 20px !important;
	margin-bottom: 25px !important;
}

.product-title{
	font-size: 20px !important;
}

.product-desc{
	font-size: 14px !important;
}

.product-price{
	font-size: 22px !important;
}

.product-stock{
	color: #74DF00 !important;
	font-size: 20px !important;
	margin-top: 10px !important;
}

.product-nostock{
	color: #D53732 !important;
	font-size: 20px !important;
	margin-top: 10px !important;
}

.product-info{
		margin-top: 50px !important;
}

/*********************************************
					VIEW
*********************************************/

.content-wrapper {
	max-width: 1140px !important;
	background: #fff !important;
	margin: 0 auto !important;
	margin-top: 25px !important;
	margin-bottom: 10px !important;
	border: 0px !important;
	border-radius: 0px !important;
}

/*.container-fluid{
	max-width: 1140px !important;
	margin: 0 auto !important;
}
*/

.view-wrapper {
	float: right !important;
	max-width: 70% !important;
	margin-top: 25px !important;
}

.container {
	padding-left: 0px !important;
	padding-right: 0px !important;
	max-width: 100% !important;
}

/*********************************************
				ITEM 
*********************************************/

.service1-items {
	padding: 0px 0 0px 0 !important;
	float: left !important;
	position: relative !important;
	overflow: hidden !important;
	max-width: 100% !important;
	height: 321px !important;
	width: 130px !important;
}

.service1-item {
	height: 107px !important;
	width: 120px !important;
	display: block !important;
	float: left !important;
	position: relative !important;
	padding-right: 20px !important;
	border-right: 1px solid #DDD !important;
	border-top: 1px solid #DDD !important;
	border-bottom: 1px solid #DDD !important;
}

.service1-item > img {
	max-height: 110px !important;
	max-width: 110px !important;
	opacity: 0.6 !important;
	transition: all .2s ease-in !important;
	-o-transition: all .2s ease-in !important;
	-moz-transition: all .2s ease-in !important;
	-webkit-transition: all .2s ease-in !important;
}

.service1-item > img:hover {
	cursor: pointer !important;
	opacity: 1 !important;
}

.service-image-left {
	padding-right: 50px !important;
}

.service-image-right {
	padding-left: 50px !important;
}

.service-image-left > center > img,.service-image-right > center > img{
	max-height: 155px !important;
}

.thumbnail:hover {
    position:relative;
    top:25px;
    left:35px;
    max-width:500px;
    height:auto;
    display:block;
    z-index:999;
}

</style>

<div class="container-fluid">
    <div class="content-wrapper">

    	<div row>
    	        @if(Session::has('reviewdeleted'))
                    <div class="alert alert-info" style="text-align:center;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{session('reviewdeleted')}}</strong>
                    </div>
        		@endif
    	</div>	
		<div class="item-container">	
			<div class="container">	
				<div class="col-md-12">
					<div class="product col-md-3 service-image-left">
                    
						<center>
							<img id="item-display" class="thumbnail" src="{{$product->imgpath}}" alt="">
						</center>
					</div>
					
					<div class="container service1-items col-sm-2 col-md-2 pull-left">
						<center>
							<a id="item-1" class="service1-item">
								<img src="{{$product->imgpath}}" alt="">
							</a>
							<a id="item-2" class="service1-item">
								<img src="http://www.corsair.com/Media/catalog/product/g/s/gs600_psu_sideview_blue_2.png" alt="">
							</a>
							<a id="item-3" class="service1-item">
								<img src="http://www.corsair.com/Media/catalog/product/g/s/gs600_psu_sideview_blue_2.png" alt="">
							</a>
						</center>
					</div>
				
				<div class="col-md-7">
					<div class="product-title">{{$product->title}}</div>
					<div class="product-desc">{{str_limit($product->description,25)}}</div>
					{{-- <div class="product-rating"><i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star-o"></i> </div> --}}
					<hr>
					{{-- onSale functions --}}
					@if($product->onSale())

					<p> <strong><h3><span class="label label-default label-success">Sale!  <span class="badge" style="background-color: #00033F;"> {{$product->sale->amount*100}}%
					</span></span></h3></strong>
					</p>
					
					<p>
					<div class="col-md-3">
					Sale Price: <div class="product-price"><h3><span class="label label-default label-success">৳ {{$product->salePrice()}}</span></h3>
					</div>
					</div>
					<div class="pull-left col-md-3">
					<span>
					Actual Price: <h3><span class="label label-default label-default">৳ {{$product->price}}
					</span>
					</h3>
					</div>
					</p>
					<div class="col-md-6">
					<p>Sale Ends on: <h4><span class="label label-default label-warning">{{$product->sale->ending_date}}</span></h4></p></div>
					{{-- onSale functions --}}

					@else
					Product Price: <div class="product-price"><h3><span class="label label-default label-success">৳ {{$product->price}}</span></h3></div>
					@endif
					<hr>
					
					@if($product->inStock())
					<p>
					<div class="product-stock">In Stock</div> <span>{{$product->stock}} units</span></p>
					<div class="row">
					<span><input type="number" style="width:50px;" value=1 min=0 max={{$product->stock}}></span></div>
					
					@else
					<p>
					
					<table>
						<tr><td style="width:200px;">
							<div class="product-nostock">No Stock</div>
						</td>
						<td>
					<span><input type="number" style="width:50px;" value=0  min=0 max=0 disabled="true"></span>
							
						</td>
						</tr>

					</table>


					<div class="row">
					</div>
					</p>
					
					@endif
					
					<hr>
					<div class="btn-group cart">
						<button type="button" class="btn btn-success">
							Add to cart 
						</button>
					</div>
				{{-- 	<div class="btn-group wishlist">
						<button type="button" class="btn btn-danger">
							Add to wishlist 
						</button>
					</div> --}}
					
				</div>



				</div>
				
				{{-- here	 --}}

				{{-- here --}}
			</div> 
		</div>
		<div class="container-fluid">		
			<div class="col-md-12 product-info">
					<ul id="myTab" class="nav nav-tabs nav_tabs">
						
						<li class="active"><a href="#service-one" data-toggle="tab">DESCRIPTION</a></li>
						{{-- <li><a href="#service-two" data-toggle="tab">PRODUCT INFO</a></li> --}}
						<li><a href="#service-three" data-toggle="tab">REVIEWS</a></li>
						
					</ul>
				<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade in active" id="service-one">
						 
							<section class="container product-info">
								{{$product->description}}
							</section>
										  
						</div>

				{{-- 	<div class="tab-pane fade" id="service-two">
						
						<section class="container">
								
						</section>
						
					</div> --}}


<style type="text/css">
	
.panel-shadow {
    box-shadow: rgba(0, 0, 0, 0.3) 7px 7px 7px;
}
.panel-white {
  border: 1px solid #dddddd;
}
.panel-white  .panel-heading {
  color: #333;
  background-color: #fff;
  border-color: #ddd;
}
.panel-white  .panel-footer {
  background-color: #fff;
  border-color: #ddd;
}

.post .post-heading {
  height: 95px;
  padding: 20px 15px;
}
.post .post-heading .avatar {
  width: 60px;
  height: 60px;
  display: block;
  margin-right: 15px;
}
.post .post-heading .meta .title {
  margin-bottom: 0;
}
.post .post-heading .meta .title a {
  color: black;
}
.post .post-heading .meta .title a:hover {
  color: #aaaaaa;
}
.post .post-heading .meta .time {
  margin-top: 8px;
  color: #999;
}
.post .post-image .image {
  width: 100%;
  height: auto;
}
.post .post-description {
  padding: 15px;
}
.post .post-description p {
  font-size: 14px;
}
.post .post-description .stats {
  margin-top: 20px;
}
.post .post-description .stats .stat-item {
  display: inline-block;
  margin-right: 15px;
}
.post .post-description .stats .stat-item .icon {
  margin-right: 8px;
}
.post .post-footer {
  border-top: 1px solid #ddd;
  padding: 15px;
}
.post .post-footer .input-group-addon a {
  color: #454545;
}
.post .post-footer .comments-list {
  padding: 0;
  margin-top: 20px;
  list-style-type: none;
}
.post .post-footer .comments-list .comment {
  display: block;
  width: 100%;
  margin: 20px 0;
}
.post .post-footer .comments-list .comment .avatar {
  width: 35px;
  height: 35px;
}
.post .post-footer .comments-list .comment .comment-heading {
  display: block;
  width: 100%;
}
.post .post-footer .comments-list .comment .comment-heading .user {
  font-size: 14px;
  font-weight: bold;
  display: inline;
  margin-top: 0;
  margin-right: 10px;
}
.post .post-footer .comments-list .comment .comment-heading .time {
  font-size: 12px;
  color: #aaa;
  margin-top: 0;
  display: inline;
}
.post .post-footer .comments-list .comment .comment-body {
  margin-left: 50px;
}
.post .post-footer .comments-list .comment > .comments-list {
  margin-left: 50px;
}

.xclose{
background-color: transparent;
border-color: transparent;
color:grey;
}

.xclose:hover{
color:black;
background-color: transparent;
border-color: transparent;
}

.xclose:active{

color:black;
background-color: grey;
border-color: transparent;

}



</style>







<div class="tab-pane fade" id="service-three">
						<section class="container">
						@if($product->feedbacks)
							@foreach($product->feedbacks->sortByDesc('created_at') as $feedback)
							
							



<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <div class="panel panel-white post panel-shadow">
                <div class="post-heading">
                    <div class="pull-left image">
                        {{-- <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image"> --}}
                        <img src="{{$feedback->user->photo? $feedback->user->photo->file : url('http://bootdey.com/img/Content/user_1.jpg')}}" class="img-circle avatar" alt="user profile image">
                    </div>
                    
                    @if(!Auth::guest() && Auth::user()->id==$feedback->user->id)
                    <div class="pull-right">
                        {!!Form::open(['method'=>'DELETE','route'=>['feedback.delete',$feedback->id]])!!}
                    	{{-- <a class="close" type ="submit">&times;</a> --}}
					{!!Form::submit('&times;',['style'=>'','class'=>'btn btn-primary xclose'])!!}
						{!!Form::close()!!}
                    </div>
                    @endif

                    <div class="pull-left meta">
                        <div class="title h5">
                            <a href="#"><b>{{$feedback->user->name()}}</b></a>
                            made a review.
                        </div>
                        <h6 class="text-muted time">{{$feedback->created_at? $feedback->created_at->diffForHumans() : 'Time unknown'}}</h6>
                    </div>
                </div> 
                <div class="post-description"> 
                    <p>{{$feedback->comment}}</p>
                    <div class="stats">
                {{--         <a href="#" class="btn btn-default stat-item">
                            <i class="fa fa-thumbs-up icon"></i>2
                        </a>
                        <a href="#" class="btn btn-default stat-item">
                            <i class="fa fa-thumbs-down icon"></i>12
                        </a> --}}
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>

						
							@endforeach
						
						@endif

<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <div class="panel panel-white post panel-shadow">
                <div class="post-heading">
                    {{-- <div class="pull-left image">
                        <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image">
                    </div> --}}
                    <div class="pull-left meta">
                        <div class="title h4">
                            <a href="#"><b>Add a review</b></a>
                        </div>

                       {{--  <h6 class="text-muted time">{{$feedback->created_at? $feedback->created_at->diffForHumans() : 'Time unknown'}}</h6> --}}
                    </div>
                </div> 
                <div class="post-description"> 
                	{!!Form::open(['method'=>'POST','route'=>['feedback.add',$product->id]])!!}

                    <p>{!!Form::label('comment','Tell us about the product:')!!}
					{!!Form::textarea('comment',null,['class'=>'form-control','rows'=>4, 'placeholder'=>'Type your review here..'])!!}
					</p>
					{!!Form::submit('Add Review',['class'=>'btn btn-primary'])!!}
                    {!!Form::close()!!}

                    <div class="stats">
                {{--         <a href="#" class="btn btn-default stat-item">
                            <i class="fa fa-thumbs-up icon"></i>2
                        </a>
                        <a href="#" class="btn btn-default stat-item">
                            <i class="fa fa-thumbs-down icon"></i>12
                        </a> --}}
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>



						</section>

				<hr>
			</div>
		</div>
	</div>
</div>

@if($recprod)
@foreach($recprod as $product)
{{$product->title}}
@endforeach
@else {{'none'}}
@endif


@stop