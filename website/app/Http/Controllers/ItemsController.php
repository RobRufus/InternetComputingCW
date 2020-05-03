<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\items;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $items = Items::all()->toArray();
      return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
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
      $item = $this->validate(request(), [
        'category' => 'required',
        'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
        'description' => 'required|regex:^[a-zA-Z0-9\s_\-]*$^',
        'foundUser' => 'required|regex:^[a-zA-Z0-9\s_\-]*$^',
        'foundPlace' => 'required|regex:^[a-zA-Z0-9\s_\-]*$^',
      ]);

      //Handles the uploading of the image
      if ($request->hasFile('image')){
        //Gets the filename with the extension
        $fileNameWithExt = $request->file('image')->getClientOriginalName();
        //just gets the filename
        $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        //Just gets the extension
        $extension = $request->file('image')->getClientOriginalExtension();
        //Gets the filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        //Uploads the image
        $path = $request->file('image')->storeAs('public', $fileNameToStore);
      }
      else {
        $fileNameToStore = 'noimage.jpg';
      }
      // create a found item record object and set its values from the input
      $item = new Items();
      $item->category = $request->input('category');
      $item->foundTime = $request->input('foundTime');
      $item->foundUser = $request->input('foundUser');
      $item->foundPlace = $request->input('foundPlace');
      $item->colour = $request->input('colour');
      $item->description = $request->input('description');
      $item->created_at = now();
      $item->image = $fileNameToStore;
      // save the Item object
      $item->save();
      // generate a redirect HTTP response with a success message
      return back()->with('success', 'Item has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $items = Items::find($id);
      return view('items.show',compact('items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $items = Items::find($id);
      return view('items.edit',compact('items'));
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
       $items = Items::find($id);
       $this->validate(request(), [
         'category' => 'required',
         'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
       ]);
       //Handles the uploading of the image
       if ($request->hasFile('image')){
         //Gets the filename with the extension
         $fileNameWithExt = $request->file('image')->getClientOriginalName();
         //just gets the filename
         $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
         //Just gets the extension
         $extension = $request->file('image')->getClientOriginalExtension();
         //Gets the filename to store
         $fileNameToStore = $filename.'_'.time().'.'.$extension;
         //Uploads the image
         $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
       } else {
         $fileNameToStore = 'noimage.jpg';
       }
       //create a new item recort=d to replace the item in the database
       $items->category = $request->input('category');
       $items->foundTime = $request->input('foundTime');
       $items->foundUser = $request->input('foundUser');
       $items->foundPlace = $request->input('foundPlace');
       $items->colour = $request->input('colour');
       $items->description = $request->input('description');
       $items->updated_at = now();
       $items->image = $fileNameToStore;
       $items->save();
       return redirect('items')->with('success','Lost items database has been updated');

     }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $items = Items::find($id);
      $items->delete();
      return redirect('items')->with('success','The item has been removed');
    }
}
