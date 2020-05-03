@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 ">
      <div class="card">
        <div class="card-header">Display all Users</div>
        <div class="card-body">
          <table class="table table-striped" border="1" >
            <tr> <td> <b>ID </th> <td> {{$users['id']}}</td></tr>
            <tr> <th>Username </th> <td>{{$users->username}}</td></tr>
            <tr> <th>Password </th> <td>{{$users->password}}</td></tr>
            <tr> <td>Account Type </th> <td>{{$users->account_type}}</td></tr>
            <tr> <th>Email Address </th> <td>{{$users->EmailAddress}}</td></tr>
            </table>
            <table><tr>

              <form action="{{action('UsersController@index')}}" method="post"> @csrf
                <input type="button" value="Back" onclick="window.location.href='{{action('UsersController@index')}}'" />
              </form>

              <form action="{{action('UsersController@edit', $users['id'])}}" method="post"> @csrf
                <input type="button" value="Edit" onclick="window.location.href='{{action('UsersController@edit', $users['id'])}}'" />
              </form>

              <form action="{{action('UsersController@destroy', $users['id'])}}" method="post"> @csrf
                <input name="_method" type="hidden" value="DELETE">
                <button class="btn btn-danger" type="submit">Delete</button>
              </form>

          </tr></table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
