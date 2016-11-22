<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            {{config('app.name')}}
        </title>
        <meta charset="utf-8">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/styles.css" rel="stylesheet">
        {{-- <link href="css/app.css" rel="stylesheet"> --}}
        <link href="/css/font-awesome.min.css" rel="stylesheet" >
        <link href="{{asset('/css/appstyle.css')}}" rel="stylesheet" >

            <!-- Scripts -->
        <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
        </script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        {{-- <script src="/js/jquery-2.1.4.min.js"></script> --}}
        {{-- <script src="/js/bootstrap.js"></script> --}}
        {{-- <script src="/js/bootstrap.min.js"></script> --}}
        {{-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
         <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
   
    {{-- [if lt IE 9]> --}}
      <script src="{{asset('http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js')}}"></script>
      <script src="{{asset('http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.2.0/respond.js')}}"></script>
    {{-- <![endif] --}}
  

  <style>
                                /* Remove the navbar's default rounded borders and increase the bottom margin */
   
   
  .center {
    margin: 0 auto;
    width: 80%;
  }
  .container
  {
 
  padding: 15px;
  }

  
  .navbar {
      box-shadow: 0px 1px 2px #888888;
      margin-bottom: 50px;
      border-radius: 0;
    }
  
    /* Remove the jumbotron's default bottom margin */
     .jumbotron {
      height: 30vw;
      min-width: 300px;
      padding: 0;
      margin-bottom: 0;
      max-height:200px;
    }
  
   .affix {
      top: 0;
      width: 100%;
    z-index: 9998 !important;
  }
    .affix ~ .container-fluid {
     position: relative;
     top: 102px;
  }
.nav-wrapper
{
    min-height:50px !important;
}


.osslogo{
    max-height: 40px;
    overflow: visible;
    margin-top: -8px;
    padding-top: 0;
    padding-bottom:0;
    padding-left:25px; 
}


    /* Add a gray background color and some padding to the footer */
    footer {

      box-shadow: -20px 1px 2px #888888;
      background-color: #222;
      padding: 25px;
      height: 50px;
    }
   
.parent {
  position: relative;
}
.child {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
}




.car-shadow{

height: 30vw;
min-width: 300px;
padding: 0;
margin-bottom: 0;
max-height:200px;
opacity: 1;
background-image: url("/brick-wall-dark.png");
background-repeat: repeat;
z-index: 11 !important;
}


.divider-vertical {
height: 50px;
margin: 0 9px;
border-left: 1px solid #444;
border-right: 1px solid #444;
}


/*dropdown*/

.dropdown-submenu {
    position: relative;
}

.dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -6px;
    margin-left: -1px;
    -webkit-border-radius: 0 6px 6px 6px;
    -moz-border-radius: 0 6px 6px;
    border-radius: 0 6px 6px 6px;
}

.dropdown-submenu:hover>.dropdown-menu {
    display: block;
}

.dropdown-submenu>a:after {
    display: block;
    content: " ";
    float: right;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
    border-width: 5px 0 5px 5px;
    border-left-color: #ccc;
    margin-top: 5px;
    margin-right: -10px;
}

.dropdown-submenu:hover>a:after {
    border-left-color: #fff;
}

.dropdown-submenu.pull-left {
    float: none;
}

.dropdown-submenu.pull-left>.dropdown-menu {
    left: -100%;
    margin-left: 10px;
    -webkit-border-radius: 6px 0 6px 6px;
    -moz-border-radius: 6px 0 6px 6px;
    border-radius: 6px 0 6px 6px;
}
/*dropdown*/


    </style>
    
    </head>
    

    <body>


@if($errors->any())
<script>
    $(document).ready(function() {
    $('#myModal').modal('show');
    });
</script>
@endif



{{-- @php
// echo $cat;
// return $cat;
// $cat= App\Category::all()->sortBy('name');
@endphp --}}


    {{-- Jumbotron --}}
    <div class="jumbotron">

      {{-- Carousel --}}
      <div class="carousel slide carousel-fade" id="featured" data-ride="carousel">
        
        {{-- Carousel Images URL --}}
         <ol class="carousel-indicators">
            <li data-target="#featured" data-slide-to="0"></li>
            <li data-target="#featured" data-slide-to="1" class="active"></li>
            <li data-target="#featured" data-slide-to="2"></li>
        </ol>           

        {{-- Carousel Caption --}}
        <div class="carousel-caption text-centered">
          <h1>One-Stop Shop</h1>

        </div>

        <div class="carousel-inner">
                <div class="item">
                    <div class="car-shadow">
                    <img alt="Sparrow n Butterfly"  class="img-responsive images-carousel" src="/a.jpg">   
                    </div>
                </div>
                <div class="item active">
                   <div class="car-shadow">
                   <img alt="Cherry Blossom" class="img-responsive images-carousel" src="/b.jpg" >
                   </div>
                </div>
                
                <div class="item">
                    <div class="car-shadow">
                    <img alt="City Lights" class="img-responsive images-carousel" src="/c.jpg" >
                    </div>
                </div>
        </div>
        {{-- Carousel Inner Ends --}}

            {{-- Carousel Control Starts--}}
            <a class="left carousel-control" href="#featured" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
            </a>

            <a class="right carousel-control" href="#featured" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
            </a> 
            {{-- Carousel Control Ends--}}

        </div>  
        {{-- Div Carousel Ends--}}

    </div>
    {{-- Div Jumbotron Ends--}}


            {{-- NavBar --}}
            <div class="nav-wrapper">
            <nav class="navbar navbar-inverse" data-smart-affix="198px">
                
                <div class="container-fluid">
                    <div class="navbar-header navbar-left pull-left">
                        <a class="navbar-brand osslogo" href="/">
                            <img src="/OSS-logo.png">
                        </a>

                    </div>

                {{-- showbar --}}

       <div class="navbar-header navbar-right pull-right">
        <ul class="nav pull-left">
        <li class="s-bar pull-left">
        {{-- @include('layouts.mobilesearch') --}}
       </li>               

        </ul>


      <button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>


{{-- showbar-end--}}



                    <div class="visible-xs-block clearfix"></div>
                                           

                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav navbar-left">
                            {{-- <li>
                                <a href="/">
                                    Home
                                </a>
                            </li> --}}

{{--                             <li>
                                <a href="/">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                </a>
                            </li> --}}

                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="glyphicon glyphicon-th-list">
                                    </span>
                                    Products
                                    <span class="caret">
                                    </span> </a>
                              <ul class="dropdown-menu multi-level">
                        <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories</a>
                            <ul class="dropdown-menu">
                                
                                @foreach($cat as $category)
                                <li><a href="{{route('bycategory',$category->name)}}">{{$category->name}}</a></li>
                                @endforeach{{-- 
                                <li><a href="#">Food</a></li>
                                <li><a href="#">Cook</a></li> --}}
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Brands</a>
                            <ul class="dropdown-menu">
                              
                                @foreach($bnd as $brand)
                                <li><a href="{{route('bybrand', $brand->brand)}}">{{$brand->brand}}</a></li>
                                @endforeach
                                
                                {{-- <li><a href="#">Toshiba</a></li> --}}
                                
                            </ul>
                        </li>
                    </ul>
                            </li>

                            <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sale <span class="caret">
                                    </span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('onsale')}}">Ongoing</a></li>
                                {{-- <li><a href="#">Previous</a></li> --}}
                            </ul>
                            </li>
                            <li>
                                <a href="#">
                                    About Us
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Contact
                                </a>
                            </li>
                        </ul>
                    
                        {{-- temp --}}

                        {{-- temp --}}


                <ul class="nav navbar-nav navbar-right">
{{--                     <li>
                    @include('layouts.searchbar')
                    </li>
 --}}
                             <!-- Authentication Links -->

                            {{-- Non-Subscribers'-NavOptions --}}

                         @if (Auth::guest())

                            <li><a href="{{route('cart.show')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Shopping Cart
                            <span class="badge">{{Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span></a></li>

                            <li><a id="loginhref" name="login_link">@lang('auth.login')</a></li>
                            <li><a href="{{ url('/register') }}">@lang('auth.register')</a></li>


                            
                            {{-- Subscribers'-Admins-Nav-Options --}}
                            @else
                            @if(Auth::user()->hasRole()=="Subscriber")
                            {{-- cart-start --}}
                            <li><a href="{{route('cart.show')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Shopping Cart
                            <span class="badge">{{Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span></a></li>
                            
                            @endif
                            {{-- cart-end --}}
                            <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="fa fa-user" aria-hidden="true"></span>
                                {{ Auth::user()->first_name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                {{-- User Conditions --}}
                                @if(Auth::user()->hasRole()=='Subscriber')

{{--                                     <li>
                                    <a href="{{ url('/#') }}">
                                        <span class="fa fa-sticky-note-o" aria-hidden="true"></span> Shortlist
                                    </a>
                                    </li>

                                    <li>
                                    <a href="{{ url('/#') }}">
                                        <span class="fa fa-history" aria-hidden="true"></span> History
                                    </a>
                                    </li> --}}
                                    
                                    <li>
                                    <a href="{{ route('users.info') }}">
                                        <span class="fa fa-info-circle" aria-hidden="true"></span> User Info
                                    </a>
                                    </li>
                                    

                                    <li>
                                    <a href="{{ route('password.change') }}">
                                        <i class="fa fa-key" aria-hidden="true"></i> Change Password
                                    </a>
                                    </li>


                                    @elseif(Auth::user()->hasRole()=='Manager')
                                    <li>
                                    <a href="{{ route('manager.index') }}">
                                        <span class="fa fa-tachometer" aria-hidden="true"></span> Dashboard
                                    </a>
                                    </li>

                                    @elseif(Auth::user()->hasRole()=='Administrator')
                                    <li>
                                    <a href="{{ route('admin.index') }}">
                                        <span class="fa fa-sticky-note-o" aria-hidden="true"></span> Dashboard
                                    </a>
                                    </li>
                                @endif                                    

                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        <span class="glyphicon glyphicon-log-out"></span> Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;<span class="glyphicon glyphicon-log-out"></span>">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                            {{-- User Conditions --}}
                        </li>
                        @endif

                    <!--<li><a href="#"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>-->
                            <!--<li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>-->
                        
                        </ul>
                        {{-- Right Navbar Outer UL --}}


                    </div>
                </div>
            </nav>
            </div>
            {{-- Nav-Ends --}}



@yield('content')

{{-- modal --}}

{{-- <div class="container"> --}}
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">@lang('auth.login')</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" method="POST" action="{{url('/login')}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" id="fnl">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
        </div>


        <div class="modal-footer">

        <div class="row">
        <div class="col-md-6 col-md-offset-3">
        {{-- Don't have an account?  --}}
        @lang('auth.donthaveaccount') 
        <a href="{{ url('/register') }}">@lang('auth.createone').</a>
        </div>

        <div class="col-md-3">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>

        </div>
      </div>
      
    </div>
  </div>
  
{{-- </div> --}}



{{-- Modal End --}}

{{-- <script>
       $(document).ready(function () {
        $('.dropdown-toggle').dropdown();
    });
</script> --}}

{{-- <script> --}}
    {{-- $('.dropdown-toggle').dropdown(); --}}
{{-- </script> --}}
{{-- <script src="{{asset('js/script.js')}}"></script> --}}
<script src="{{asset('js/libs.js')}}"></script>
{{-- <script src="{{asset('js/app.js')}}"></script> --}}

                    
<div class=container-fluid><br><br><br></div>
<footer class="footer navbar-fixed-bottom">
                       
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 parent"><span class="child">Join Us</span></div>
    <div class="col-md-6"><span class="pull-right text-right text-muted">© 2016 One-Stop Shop All rights reserved.</span></div>
  </div>
</div>

    @yield('footer')
</footer>

    @yield('script')

</body>

</html>
