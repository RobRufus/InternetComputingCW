@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 ">
      <div class="card">
        <div class="card-header">Display all users</div>
        <div class="card-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Account Type</th>
                <th>Email Address</th>
                <th colspan="3">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $Users)
              <tr>
                <td>{{$Users['id']}}</td>
                <td>{{$Users['username']}}</td>
                <td>{{$Users['password']}}</td>
                <td>{{$Users['account_type']}}</td>
                <td>{{$Users['EmailAddress']}}</td>

                <td>
                <form action="{{action('UsersController@show', $Users['id'])}}" method="post"> @csrf
                  <input type="button" value="Details" onclick="window.location.href='{{action('UsersController@show', $Users['id'])}}'" />
                </form>
                </td>


                <td>
                  <form action="{{action('UsersController@edit', $Users['id'])}}" method="post"> @csrf
                    <input type="button" value="Edit" onclick="window.location.href='{{action('UsersController@edit', $Users['id'])}}'" />
                  </form>
                <td>

                <form action="{{action('UsersController@destroy', $Users['id'])}}"
                method="post"> @csrf
                  <input name="_method" type="hidden" value="DELETE">
                  <button class="btn btn-danger" type="submit"> Delete</button>
                </form>

              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
