<?php

namespace App\Http\Controllers\Admin;


use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Image;

use File;


class TagController extends Controller
{
      function __construct()
      {
          $this->middleware('permission:blog_tag-index', ['only' => ['index','show']]);
          $this->middleware('permission:blog_tag-create', ['only' => ['create','store']]);
          $this->middleware('permission:blog_tag-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:blog_tag-delete', ['only' => ['destroy']]);
          $this->middleware('permission:blog_tag-status', ['only' => ['status']]);
      }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tag.index');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
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


    if($request->hasFile('banner')){
        $image = $request->file('banner');
        $destinationPath = 'public/storage/posts/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        
        $tag= new Tag;
        $tag->name=$request->name;
        $tag->weight=$request->weight;
        $tag->banner= $profileImage;
        $tag->slug=preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.str::random(5);
        $tag->save();

    }else{

$tag= new Tag;
        $tag->name=$request->name;
        $tag->weight=$request->weight;
        $tag->slug=preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.str::random(5);
        $tag->save();

    }

   session()->flash('success','Tag data sucesfully added');
   return redirect( route('tag.index') );
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
        $tag=Tag::find($id);
        return view('admin.tag.edit',compact('tag'));
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
        $tag=Tag::find($id);
           
          

        if($request->hasFile('banner')){
            $image = $request->file('banner');
            $destinationPath = 'public/storage/posts/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            
    

        $tag->name=$request->name;
        $tag->banner=$profileImage;
        $tag->weight=$request->weight;
        $tag->slug=Str::slug($request->name,'-');
        $tag->save();
         }else{
         
         $tag->name=$request->name;
        $tag->weight=$request->weight;
        $tag->slug=Str::slug($request->name,'-');
        $tag->save();

    }

   session()->flash('success','Tag data sucesfully updated');
   return redirect( route('tag.index') );


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

        $tag=Tag::find($id);

       if($tag->blogs()->count() > 0 ){

            session()->flash('warn','Tags cannot deleted because it associated with some blogs so delete some blogs which is associated it');
            return redirect()->route('tag.index');
        }else{
        $tag->delete();


        session()->flash('error','Tags sucessfuly deleted');
        return redirect()->route('tag.index');


        }

}


}
