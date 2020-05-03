<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\itmreq;
use App\items;
use App\User;
use Illuminate\Support\Facades\Auth;

class ItmReqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itmreqs = Itmreq::all()->toArray();
        $itminfo = Items::all()->toArray();
        return view('itmreq.index', compact('itmreqs'), compact('itminfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create($value)
     {
         //echo $value;
         return view('itmreq.create')->with('passitemid', $value);
         //return View::make("itmreq/create")->with($data);
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // form validation
      $itmreq = $this->validate(request(), [
        'requestedByID' => 'required',
        'requestedItemID' => 'required',
        'request_reason' => 'required|regex:^[a-zA-Z0-9\s_\-]*$^',
      ]);

      // create an account object and set its values from the input
      $itmreq = new itmreq;
      $itmreq->requestedByID = Auth::id();
      $itmreq->requestedItemID= $request->input('requestedItemID');
      $itmreq->request_reason = $request->input('request_reason');
      $itmreq->request_status = 'processing';
      $itmreq->created_at = now();
      // save the user object
      $itmreq->save();
      // generate a redirect HTTP response with a success message
      return back()->with('success', 'Request has been Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo 1;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
     {

     }

     public function process($req)
     {
         $replace = new ItmReq;
         $replace->request_status = substr($req, 0, 8);
         $status = substr($req, 0, 8);
         $id = substr($req, 9, (strlen($req) -9));

         $itmrequest = Itmreq::find($id);
         $itmrequest->request_status = $status;
         $itmrequest->updated_at = now();
         $itmrequest->save();
         return redirect()->back()->with('success','database has been updated');

     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $itmreq = Itmreq::find($id);
      $itmreq->delete();
      return redirect()->back()->with('success','Request removed');
    }
}
