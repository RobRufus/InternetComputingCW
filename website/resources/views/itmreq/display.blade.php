@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Dashboard</div>
        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
          @endif
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Account Type</th>
                <th>Email Address</th>
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
