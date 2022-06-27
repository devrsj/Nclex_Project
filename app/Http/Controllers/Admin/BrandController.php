<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Db;
use Illuminate\Support\Str;
use Auth;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $brands=Db::table('brands')->where('is_admin',Auth()->user()->is_admin)->where('user_id',Auth()->user()->id)->cursor();
        return view('admin.brand.index',compact('brands'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
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

            if($request->hasFile('image')){
        $image = $request->file('image');
        $destinationPath = 'public/storage/posts/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
            }

        Db::table('brands')->insert([
            "user_id"=>Auth()->user()->id,
            "is_admin"=>Auth()->user()->is_admin,
            "name"=>$request->name,
            "image"=>$profileImage,
            "meta_title"=>$request->meta_title,
            "meta_description"=>$request->meta_description,
            "status"=>$request->status,
            "weight"=>$request->weight,
            "slug"=>preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.str::random(5)
          ]);

        session()->flash('success','Brand Updated Succesfully');
        return redirect()->route('brand.index');
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

        $brand=Db::table('brands')->find($id);
        return view('admin.brand.edit',compact('brand'));

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
         
        $brand=Brand::findorfail($id);
                
                 $this->validate($request,[
                 'slug'=>'required|alpha-dash|unique:brands,slug,'.$brand->id,
                ]);
                
                
                 $data=$request->only(['name',
                 'meta_title','meta_description','weight','slug']);
                 
            
                 if($request->hasFile('image')){
            $image = $request->file('image');
            $destinationPath = 'public/storage/posts/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
                
              Storage::delete($brand->image);
            $data['image'] =$profileImage;
        
            }

          


            $brand->update($data);
        session()->flash('success','Brand Updated Succesfully');
        return redirect()->route('brand.index');
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
        Db::table('brands')->where('id',$id)->delete();
        session()->flash('error','Brand Deleted Sucesfully');
        return redirect()->route('brand.index');
        //
    }

    public function status($id){
      
        $brand=Brand::find($id);  
        if($brand->status== 1){
            $brand->status = 0;
        }else{
            $brand->status =1;
        }
        session()->flash('success','status has been succesfully changed');
        $brand->save();
            return redirect(route('brand.index'));
      }




}
