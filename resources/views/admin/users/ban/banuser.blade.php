@extends('layouts.admin')


@section('header')
Users
@stop


@section('content')

<style type="text/css">
  tbody {
    display:block;
    height:340px;
    overflow:auto;
    min-width: 800px;
}
thead, tbody tr {
    display:table;
    width:100%;
    table-layout:fixed;
}
thead {
    max-width: calc( 100% - 1em )
}
tr{
  height: 75px;
}

td {
    max-width: 100px;
    overflow: hidden;
    text-overflow: ellipsis;
}

td {
    max-width: 100px;
    overflow: hidden;
    text-overflow: ellipsis;
}

#ext{
    max-width: 100px;
    overflow: hidden;
    text-overflow: ellipsis;
}


#ext:hover{
  font-weight: bold;
  background-color: #D9D9D9;
  color: #000; 
  width:200px;
  text-overflow: inherit;
  overflow: visible;
  text-align: center;
  border-radius: 10px;

}

</style>







@if(Session::has('deleted_user'))
  {{-- <p class="bg-info">{{session('deleted_user')}}</p> --}}
  <a href="#" class="close" data-dismiss="alert alert-info" aria-label="close">&times;</a>
  <strong>{{session('deleted_user')}}</strong>
</div>
@elseif(Session::has('updated_user'))
  {{-- <p class="bg-success">{{session('updated_user')}}</p> --}}
    <a href="#" class="close" data-dismiss="alert alert-info" aria-label="close">&times;</a>
  <strong>{{session('updated_user')}}</strong>
</div>

@endif


<table class="table">
        <thead>
        <tr>
        <th width="50px">ID</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Role</th>
        <th>Status</th>
        <th>Email</th>
        <th>Created</th>
        <th>Updated</th>
        </tr>
        </thead>

        <tbody>

        @foreach($users as $user)
        <tr>
        <td width="50px">{{$user->id}}</td>
        <td><img height=40 src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}"></td>
        <td><a href="{{route('users.edit',$user->id)}}">{{$user->first_name." ".$user->last_name}}</a></td>
        <td>{{$user->role->name}}</td>
        <td>{{$user->is_active == 1 ? 'Active': 'Not Active'}}</td>
        <td id="ext">{{($user->email)}}</td>             
        <td>{{$user->created_at->diffForHumans()}}</td>             
        <td>{{$user->updated_at->diffForHumans()}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>

    @stop
