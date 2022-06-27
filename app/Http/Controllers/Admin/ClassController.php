<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Db;
use App\Models\OnlineClass;
use Illuminate\Support\Facades\Storage;


class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $notes=Db::table('online_classes')->get();
        return view('admin.class.index',compact('notes'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.class.create');
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
         $profileImage="";
     
           if( $request->hasFile('image')){ 
            $image = $request->file('image');
            $destinationPath = 'public/storage/posts/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            }
  
  
        Db::table('online_classes')->insert([
          "name"=>$request->name,
          "thumbnail"=>$profileImage
        ]);
        session()->flash('success','note updated succesfully');
        return redirect()->route('note.index');
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
        $note=Db::table('online_classes')->find($id);
        return view('admin.class.edit',compact('note'));
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
       
          $class=OnlineClass::findorfail($id);
        $data=$request->only(['name']);
 
        
         if( $request->hasFile('image')){ 
            $image = $request->file('image');
            $destinationPath = 'public/storage/posts/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
             Storage::delete($class->thumbnail);
            $data['thumbnail'] = $profileImage;
           }
        
         $class->update($data);
        session()->flash('success','note updated succesfully');
        return redirect()->route('note.index');
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
        Db::table('online_classes')->where('id',$id)->delete();
        session()->flash('error','note updated succesfully');
        return redirect()->route('note.index');
        //
    }
}
