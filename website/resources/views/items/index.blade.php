@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 ">
      <div class="card">
        <div class="card-header">Display all lost items</div>
        <div class="card-body">
          <table class="table table-striped">
            <thead>
              <tr>
                @auth
                @if(auth()->user()->type == "admin")
                <th>Item Num</th>
                @endif
                @endauth
                <th>Category</th>
                <th>Found At</th>
                <th>Colour</th>
                @auth
                <th colspan="4">Action</th>
                @endauth
              </tr>
            </thead>
            <tbody>
              @foreach($items as $Items)
              <tr>
                @auth
                @if(auth()->user()->type == "admin")
                <td>{{$Items['id']}}</td>
                @endif
                @endauth
                <td>{{$Items['category']}}</td>
                <td>{{$Items['foundTime']}}</td>
                <td>{{$Items['colour']}}</td>

                <td>

                <div class="btn-group">
                  @auth
                  <input type="button" value="Details" onclick="window.location.href='{{action('ItemsController@show', $Items['id'])}}'" />
                  @if(auth()->user()->type == "admin")
                    <input type="button" value="Edit" onclick="window.location.href='{{action('ItemsController@edit', $Items['id'])}}'" />
                    <form action="{{action('ItemsController@destroy', $Items['id'])}}"  method="post"> @csrf
                      <input name="_method" type="hidden" value="DELETE">
                      <button class="btn btn-danger" type="submit"> Delete</button>
                    </form>
                  @endif
                  @endauth
                </div>

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
