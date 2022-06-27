<?php

namespace App\Http\Controllers\admin;

use App\Models\Branch;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Support\Str;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i=1;
        $branches=Branch::all();
        return view('admin.branch.index',compact('branches','i'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.branch.create');
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

        $this->validate($request,[
            'image'=>'required'
           ]);

        $image = $request->file('image');
        $destinationPath = 'public/storage/posts/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);

            Branch::create([
           "image"=> $profileImage,
           "weight"=>$request->weight,
           "status"=>$request->status 

        ]);
        session()->flash('success','Branch added  succesfully');
            return redirect(route('branch.index'));
        
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
      
           $branch=Branch::findorfail($id);
           return view('admin.branch.edit',compact('branch'));



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
        $branch=Branch::find($id);
        $data=$request->only(['weight','status']);
        if($request->hasfile('image')){
            $image0 = $request->file('image');
           $destinationPath0= 'public/storage/posts/';
           $filename0 = date('YmdHis') . "." . $image0->getClientOriginalExtension();
           $image0->move($destinationPath0, $filename0);
       
           Storage::delete($branch->image);
            $data['image'] = $filename0;
            }

            $branch->update($data);
        session()->flash('success','Branch  sucesfully updated');
        return redirect( route('branch.index') );
 
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
        $branch=Branch::findorfail($id);
        $branch->delete();
        session()->flash('error','Branch  sucesfully deleted');
        return redirect(route('branch.index'));
        //
    }


    public function status($id){
        $blog=Branch::find($id);
     if($blog->status== 1){
         $blog->status = 0;
     }else{
         $blog->status =1;
     }
     session()->flash('success','status has been succesfully updated');
     $blog->save();
         return redirect(route('branch.index'));
   }


}
