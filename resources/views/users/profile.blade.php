@extends('layouts.authapp')


@section('content')


<style type="text/css">
  .user-row {
    margin-bottom: 14px;
}

.user-row:last-child {
    margin-bottom: 0;
}

.dropdown-user {
    margin: 13px 0;
    padding: 5px;
    height: 100%;
}

.dropdown-user:hover {
    cursor: pointer;
}

.table-user-information > tbody > tr {
    border-top: 1px solid rgb(221, 221, 221);
}

.table-user-information > tbody > tr:first-child {
    border-top: 0;
}


.table-user-information > tbody > tr > td {
    border-top: 0;
}
.toppad
{margin-top:20px;
}
</style>

<div class="container">
  
      @if(Session::has('password_changed'))
                    <div class="alert alert-success" style="text-align:center;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{session('password_changed')}}</strong>
                    </div>
        @endif
        @if(Session::has('info_saved'))
                    <div class="alert alert-success" style="text-align:center;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{session('info_saved')}}</strong>
                    </div>
        @endif


      <div class="row">
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
           {{-- <a href="edit.html" >Edit Profile</a> --}}

        {{-- <a href="{{url('/logout')}}" >Logout</a> --}}
       <br>
{{-- <p class=" text-info">{{Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now())->format('d-M-Y')}}</p> --}}
      </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><a href="{{route('users.info.create')}}">{{Auth::user()->name()}}</a></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> 

                <img alt="User Pic" src={{Auth::user()->photo? Auth::user()->photo->file : "http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" }} class="img-circle img-responsive"> 
                {{-- <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive">  --}}

                </div>
                
                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>DEPARTMENT:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      {{-- <tr>
                        <td>Department:</td>
                        <td>Programming</td>
                      </tr>
                      <tr>
                        <td>Hire date:</td>
                        <td>06/23/2013</td>
                      </tr> --}}
                      <tr>
                        <td>Full Name</td>
                        <td>{{Auth::user()->name()}}</td>
                      </tr>
                      
                      <tr>
                        <td>Date of Birth</td>
                        <td>{{Auth::user()->advanced ? Carbon::createFromFormat('Y-m-d', Auth::user()->advanced->birthday)->format('d-M-Y') : "Not Set" }}</td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td>Gender</td>
                        <td>{{Auth::user()->advanced ? Auth::user()->advanced->gender: "Not Set"}}</td>
                      </tr>
                      
                      <tr>
                        <td>Address</td>
                        <td>{{Auth::user()->advanced ? Auth::user()->advanced->street . ", ". Auth::user()->advanced->city : "Not Set" }}</td>
                      </tr>
                      
                      <tr>
                        <td>Country</td>
                        <td>{{Auth::user()->advanced ? Auth::user()->advanced->country->name : "Not Set" }}</td>
                      </tr>

                      <tr>
                        <td>Email</td>
                        <td>{{Auth::user()->email}}</a></td>
                      </tr>
                        <td>Phone Number</td>
                        <td>{{Auth::user()->advanced ? Auth::user()->advanced->phone : "Not Set"}}
                        </td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                  {{-- <a href="#" class="btn btn-primary">My Sales Performance</a> --}}
                  {{-- <a href="#" class="btn btn-primary">Team Sales Performance</a> --}}
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        {{-- <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a> --}}
                        
                            <a href="{{route('users.info.create')}}" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i> Edit Info</a>
                        @if(Session::has('checkout'))
                        <span class="pull-right">
                            <a href="{{route('checkout')}}" data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-success">Proceed to Checkout <i class="glyphicon glyphicon-arrow-right"></i></a>
                        </span>
                        @endif
                    </div>
            
          </div>
        </div>
      </div>
    </div>

@endsection