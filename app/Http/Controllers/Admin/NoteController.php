<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Db;
use App\Models\Note;
use Illuminate\Support\Facades\Storage;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes=Db::table('notes')->get();
        return view('admin.note.index',compact('notes'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.note.create');
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
      
        Db::table('notes')->insert([
         "name"=>$request->name,
         "thumbnail"=>$profileImage
        ]);
        session()->flash('success','Class Created Sucesfully');
        return redirect()->route('class.index');
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
        $note=Db::table('notes')->find($id);
        return view('admin.note.edit',compact('note'));
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
        
          $note=Note::findorfail($id);
     
        $data=$request->only(['name']);
 
        
         if( $request->hasFile('image')){ 
            $image = $request->file('image');
            $destinationPath = 'public/storage/posts/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
             Storage::delete($note->thumbnail);
            $data['thumbnail'] = $profileImage;
           }
        
      $note->update($data);
        session()->flash('success','Class Updated Sucesfully');
        return redirect()->route('class.index');
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
        Db::table('notes')->where('id',$id)->delete();
        session()->flash('error','Class Deleted Sucesfully');
        return redirect()->route('class.index');
        //
    }
     public function zoom(){
      
        return view('admin.notebook.zoom');
    }

}
