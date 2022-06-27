<?php

namespace App\Http\Controllers\Admin;

use App\Models\Office;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i=1;
        $offices=Office::all();
        return view('admin.office.index',compact('offices','i'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.office.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $office= Office::create(['city' => $request->city,
            "city_loction"=>$request->city_location,
            "number"=>$request->number,
            "email"=>$request->email,
            "google_map"=>$request->google_map,
            "weight"=>$request->weight,
            "status"=>$request->status
    ]);
        session()->flash('success','Office created succesfully');
        return redirect()->route('office.index');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $office=Office::find($id);
        return view('admin.office.edit',compact('office'));
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
        $office=Office::find($id);
        $office->city=$request->city;
        $office->city_loction=$request->city_location;
        $office->number=$request->number;
        $office->email=$request->email;
        $office->google_map=$request->google_map;
        $office->weight=$request->weight;
        $office->status=$request->status;
        $office->save();
        session()->flash('success','Office updated succesfully');
        return redirect(route('office.index'));
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $office=Office::find($id);
        $office->delete();
        session()->flash('error','Office deleted succesfully');
        return redirect(route('office.index'));
        //
        //
    }

    public function status($id){

      
        $media=Office::find($id);  
     if($media->status== 1){
         $media->status = 0;
     }else{
         $media->status =1;
     }
     session()->flash('success','status has been succesfully updated');
     $media->save();
         return redirect(route('office.index'));
   }
}
