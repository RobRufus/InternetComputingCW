@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 ">
      <div class="card">
        <div class="card-header">Edit and update the User account</div>
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div><br />
        @endif
        @if (\Session::has('success'))
        <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
        </div><br />
        @endif
        <div class="card-body">
          <form class="form-horizontal" method="POST" action="{{ action('UsersController@update',
          $users['id']) }} " enctype="multipart/form-data" >
          @method('PATCH')
          @csrf
          <div class="col-md-8">
            <label >Username</label>
            <input type="text" name="username"
            placeholder="username" />
          </div>
          <div class="col-md-8">
            <label>Password</label>
              <input type="text" name="password"
              placeholder="password" />
          </div>
            <div class="col-md-8">
            <label >Account Type</label>
            <select name="account_type" >
              <option value="public">Public</option>
              <option value="registered">Registered</option>
              <option value="admin">Admin</option>
            </select>
          </div>
          <div class="col-md-8">
            <label>Email Address</label>
              <input type="text" name="EmailAddress"
              placeholder="EmailAddress" />
          </div>
          <div class="col-md-6 col-md-offset-4">
            <input type="submit" class="btn btn-primary" />
            <input type="reset" class="btn btn-primary" />
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
