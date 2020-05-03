@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 ">
      <div class="card">
        <div class="card-header">Information On A Specific Item</div>
        <div class="card-body">
          <table class="table table-striped" border="1" >
            @auth
            @if(auth()->user()->type == "admin")
              <tr> <td> <b>ID </th> <td> {{$items['id']}}</td></tr>
            @endif
            @endauth
            <tr> <th>Category </th> <td>{{$items->category}}</td></tr>
            <tr> <th>When Found </th> <td>{{$items->foundTime}}</td></tr>
            <tr> <td>Found By </th> <td>{{$items->foundUser}}</td></tr>
            <tr> <td>Where Found</th> <td>{{$items->foundPlace}}</td></tr>
            <tr> <td>Colour </th> <td>{{$items->colour}}</td></tr>
            @auth
            @if(auth()->user()->type == "admin")
              <tr> <th>Description </th> <td style="max-width:150px;" >{{$items->description}}</td></tr>
            @endif
            @endauth
            <tr> <td colspan='2' ><img style="width:100%;height:40%" src="{{ asset('storage/images/'.$items->image)}}"></td></tr>
          </table>

            <table><tr>

              <div class="btn-group">
                <input type="button" value="Back" onclick="window.location.href='{{action('ItemsController@index')}}'" />
                @auth
                <button type="button" onclick="window.location='{{ route("reqMake", $items['id']) }}'">Request</button>
                @if(auth()->user()->type == "admin")
                  <input type="button" value="Edit" onclick="window.location.href='{{action('ItemsController@edit', $items['id'])}}'" />
                  <form action="{{action('ItemsController@destroy', $items['id'])}}"  method="post"> @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit"> Delete</button>
                  </form>
                @endif
                @endauth
              </div>

          </tr></table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
