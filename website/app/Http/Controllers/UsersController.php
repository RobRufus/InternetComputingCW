<?php

namespace App\Http\Controllers;

use Gate;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::all()->toArray();
      return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Users.create');
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
      $user = $this->validate(request(), [
        'username' => 'required|regex:/^[a-z0-9_]{1,16}?$/',
        'EmailAddress' => 'required|email|unique:users',
        'password' => 'required|regex:/^[a-z0-9_\-]{3,16}?$/',
      ]);

      // create an account object and set its values from the input
      $user = new Users;
      $user->username = $request->input('username');
      $user->password = $request->input('password');
      $user->EmailAddress = $request->input('EmailAddress');
      $user->created_at = now();
      // save the user object
      $user->save();
      // generate a redirect HTTP response with a success message
      return back()->with('success', 'User has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $users = Users::find($id);
      return view('users.show',compact('users'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $users = Users::find($id);
      return view('users.edit',compact('users'));
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
      $users = Users::find($id);
      $this->validate(request(), [
        'username' => 'required',
        'password' => 'required',
        'account_type' => 'required',
      ]);
      $users->username = $request->input('username');
      $users->password = $request->input('password');
      $users->account_type = $request->input('account_type');
      $users->EmailAddress = $request->input('EmailAddress');
      $users->updated_at = now();
      $users->save();
      return redirect('users')->with('success','Users table has been updated');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $users = Users::find($id);
      $users->delete();
      return redirect('users')->with('success','The account has been deleted');
    }

    public function display()
    {
      $userQuery = Users::all();
      if (Gate::denies('displayall'))
      {
        $userQuery=$userQuery->where('id', auth()->user()->id);
      }

      return view('/display', array('users'=>$usersQuery));
    }

}
