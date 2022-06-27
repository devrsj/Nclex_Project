<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Db;

class SubNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
         $subnotes=Db::table('sub_notes')->get();
        return view('admin.subnote.index',compact('subnotes'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        return view('admin.subnote.create');
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
        Db::table('sub_notes')->insert([
        "name"=>$request->name,
        "type"=>$request->type,
        "note_id"=>$request->note_id
        ]);
        session()->flash('success','Subclass added sucesfully');
        return redirect()->route('subclass.index');
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
        $subnote=Db::table('sub_notes')->find($id);
        return view('admin.subnote.edit',compact('subnote'));
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
        Db::table('sub_notes')->where('id',$id)->update([
            "name"=>$request->name,
            "note_id"=>$request->note_id
            ]);
            session()->flash('success','Subclass updated sucesfully');
            return redirect()->route('subclass.index');
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
        Db::table('sub_notes')->where('id',$id)->delete();
        session()->flash('error','Subclass deleted sucesfully');
        return redirect()->route('subclass.index');
        //
    }
}
