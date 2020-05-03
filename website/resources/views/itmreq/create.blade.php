<!-- inherite master template app.blade.php -->
@extends('layouts.app')
<head><style>#txtarea { width: 100%; padding: 4px; margin: 5px; }</style></head>
<!-- define the content section -->
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 ">
      <div class="card">
        <div class="card-header">Request Item</div>

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
          action="{{ action('ItmReqController@store') }}" enctype="multipart/form-data">
          @csrf

          <div class="col-md-12">
            <label >Reason for request : </label><br>
            <textarea id="txtarea"rows="4" cols="50" name="request_reason" placeholder="identify yourself as the owner">  </textarea>
          </div>

          <div class="col-md-8">
            <input type="hidden" name="requestedItemID" placeholder="" size="{{strlen($passitemid)}}" value="{{ $passitemid }}" readonly/>
          </div>

          <div class="col-md-8">
            <input type="hidden" name="requestedByID" placeholder="" size="{{strlen($passitemid)}}" value="{{ Auth::id() }}" readonly/>
          </div>

          <div name="request_status" value="processing"> </div>
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
