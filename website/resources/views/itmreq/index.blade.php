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
                <th>User <br> Num</th>
                <th>Item <br> Num</th>
                <th>Reasoning Behind Request</th>
                <th>Item Description</th>
                <th>Status</th>
                <th colspan="4">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($itmreqs as $Itmreq)
                @foreach($itminfo as $Items)
                  <?php if($Items['id'] == $Itmreq['requestedItemID']) {$showDesc = $Items['description'];}  ?>
                @endforeach
              <tr>
                <td>{{$Itmreq['requestedByID']}}</td>
                <td>{{$Itmreq['requestedItemID']}}</td>
                <td>{{$Itmreq['request_reason']}}</td>
                <td>{{$showDesc}}</td>
                <td>{{$Itmreq['request_status']}}</td>

                <td>

                  <div class="btn-group">
                    <?php $appdec = "approved~" . $Itmreq['id']; ?>
                    <button type="button" onclick="window.location='{{ route("reqProcess", $appdec) }}'">Approve</button>

                    <?php $appdec = "declined~" . $Itmreq['id']; ?>
                    <button type="button" onclick="window.location='{{ route("reqProcess", $appdec) }}'">Decline</button>

                    <button type="button" onclick="window.location='{{ route("reqRemove", $Itmreq['id']) }}'" class="btn btn-danger" >Remove</button>

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
