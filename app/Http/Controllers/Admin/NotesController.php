<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Db;
use App\Models\User;
use Image;
use Illuminate\Support\Facades\Storage;
use App\Models\SubClass;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notebooks=Db::table('sub_classes')->get();
     
       
        return view('admin.notes.index',compact('notebooks'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notes.create');
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
        if($request->hasFile('file')){
        $image = $request->file('file');
        $destinationPath = 'public/storage/posts/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        }

        Db::table('sub_classes')->insert([
            "note_id"=>$request->note_id,
            "name"=>$request->name,
            "file"=>$profileImage,
           ]);

           session()->flash('success','Notes Created Sucesfully');
           return redirect()->route('notes.index');
        //
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
        $notebook=Db::table('sub_classes')->find($id);
        return view('admin.notes.show',compact('notebook'));
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
        $notebook=Db::table('sub_classes')->find($id);
        
        return view('admin.notes.edit',compact('notebook'));
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
        $notebook=SubClass::find($id);

       
        $data=$request->only(['note_id','name']);
       
        if($request->hasFile('file')){
           
            $image = $request->file('file');
            $destinationPath = 'public/storage/posts/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
           Storage::delete($notebook->file);
            $data['file'] = $profileImage;
            $notebook->file=$data['file'];
            $notebook->save();
            }

            $notebook->update($data);
           session()->flash('success','Notes Updated Sucesfully');
           return redirect()->route('notes.index');
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
        Db::table('sub_classes')->where('id',$id)->delete();
        session()->flash('error','Notes Deleted Sucesfully');
        return redirect()->route('notes.index');
        //
    }

    public function unverify_user(){
       
        $users=Db::table('users')->where('is_admin','s')->simplePaginate(9);
        return view('admin.users.unverify',compact('users'));
    }

    public function verify_user($id){
        
        $user=User::find($id);  
        if($user->status== 1){
            $user->status = 0;
        }else{
            $user->status =1;
        }
        session()->flash('success','status has been succesfully updated');
        $user->save();
            return redirect()->back();
    }


}
