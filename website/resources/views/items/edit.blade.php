@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 ">
      <div class="card">
        <div class="card-header">Edit and update Item's Information</div>
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
          <form class="form-horizontal" method="POST" action="{{ action('ItemsController@update',
          $items['id']) }} " enctype="multipart/form-data" >
          @method('PATCH')
          @csrf
          <div class="col-md-8">
            <label >Category</label>
            <select name="category" >
              <option value="pet">Pet</option>
              <option value="phone">Phone</option>
              <option value="jewelry">Jewelry</option>
            </select>
          </div>
            <div class="col-md-8">
            <label >Time Found</label>
            <input type="date" name="foundTime"
            placeholder="<?php echo date('d-m-y'); ?>" />
          </div>
          <div class="col-md-8">
            <label >Found By</label>
            <input type="text" name="foundUser"
            placeholder="Unknown" />
          </div>
          <div class="col-md-8">
            <label >Place Found</label>
            <textarea rows="4" cols="50" name="foundPlace" placeholder="where the item was found.">  </textarea>
          </div>
          <div class="col-md-8">
            <label >Item Colour</label>
            <select name="colour" >
              <option value="Black">Black</option>
              <option value="Grey">Grey</option>
              <option value="White">White</option>
              <option value="Red">Red</option>
              <option value="Orange">Orange</option>
              <option value="Yellow">Yellow</option>
              <option value="Green">Green</option>
              <option value="Blue">Blue</option>
              <option value="Purple">Purple</option>
              <option value="Pink">Pink</option>
              <option value="Brown">Brown</option>
            </select>
          </div>
          <div class="col-md-8">
            <label>Image</label>
            <input type="file" name="image"
            placeholder="Image file" />
          </div>
          <div class="col-md-8">
            <label >Item Description</label>
            <textarea rows="4" cols="50" name="description" placeholder="The item's identifying features">  </textarea>
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
