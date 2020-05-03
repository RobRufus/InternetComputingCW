<!-- inherite master template app.blade.php -->
@extends('layouts.app')

<!-- define the content section -->
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 ">
      <div class="card">
        <div class="card-header">Register a new Account</div>

        <!-- display the errors -->
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul> @foreach ($errors->all() as $error)
            <li>{{ $error }}</li> @endforeach
          </ul>
        </div><br /> @endif

        <!-- display the success status -->
        @if (\Session::has('success'))
        <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
        </div><br /> @endif

        <!-- define the form -->
        <div class="card-body">
          <form class="form-horizontal" method="POST" class="form-control"
          action="{{url('users') }}" enctype="multipart/form-data">
          @csrf
          <div class="col-md-8">
            <label >Username : </label>
            <input type="text" name="username" class="form-control"
            placeholder="username" />
          </div>
          <div class="col-md-8">
            <label>Password : </label>
              <input type="text" name="password" class="form-control"
              placeholder="password" />
          </div>
          <div class="col-md-8">
            <label>Email Address : </label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="EmailAddress" value="{{ old('email') }}" required autocomplete="email"  placeholder="email address">
              @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
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
