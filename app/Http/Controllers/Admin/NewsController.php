<?php

namespace App\Http\Controllers\admin;

use App\Models\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use Illuminate\Support\Facades\Storage;
use Db;

class NewsController extends Controller
{
  function __construct()
    {
        $this->middleware('permission:news-index', ['only' => ['index','show']]);
        $this->middleware('permission:news-create', ['only' => ['create','store']]);
        $this->middleware('permission:news-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:news-delete', ['only' => ['destroy']]);
        $this->middleware('permission:news-status', ['only' => ['status']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news=Db::table('news')->get();
        return view('admin.news.index',compact('news'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
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
        $images=[];

        if($request->hasFile('banner')){
          $image = $request->file('banner');
          $destinationPath = 'public/storage/posts/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        }

        if($request->hasFile('image')){
            $image1 = $request->file('image');
            $destinationPath1 = 'public/storage/posts/';
          $profileImage1 = date('YmdHis') . "." . $image1->getClientOriginalExtension();
          $image1->move($destinationPath1, $profileImage1);
          }
        
        if($files=$request->file('upload_files')){
          foreach($files as $file){
            $destinationPath = 'public/storage/posts/';
              $name=date('YmdHis') . "." .$file->getClientOriginalName();
              $file->move($destinationPath,$name);
              $images[]=$name;
          }
        }
        
        Db::table('news')->insert([
          "name"=>$request->name,
          "image"=>$profileImage1,
          "banner"=>$profileImage,
          "multiple_image"=>json_encode($images),
          "description"=>$request->description,
          "location"=>$request->location,
          "date"=>$request->date,
          "time"=>$request->time,
          "google_map"=>$request->google_map,
          "meta_title"=>$request->meta_title,
          "meta_description"=>$request->meta_description,
          "status"=>$request->status,
          "weight"=>$request->weight,
          "slug"=>preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.str::random(5)
        ]);
  
        session()->flash('success','News & Event sucesfully added');
        return redirect( route('news.index') );

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

        $new=News::findorfail($id);
        return view('admin.news.edit',compact('new'));
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
        $new=News::findorfail($id);
       

 $data=$request->only(['name','description','weight','location','date','time','google_map','meta_title','meta_description','status','slug']);
 

 $new->meta_description=$request->meta_description;
 $new->save();

      $images=[];

if($request->hasFile('banner')){
$image = $request->file('banner');
$destinationPath = 'public/storage/posts/';
$profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
$image->move($destinationPath, $profileImage);
Storage::delete($new->banner);
$data['banner'] = $profileImage;
}

if($request->hasFile('image')){
    $image1 = $request->file('image');
    $destinationPath1 = 'public/storage/posts/';
  $profileImage1 = date('YmdHis') . "." . $image1->getClientOriginalExtension();
  $image1->move($destinationPath1, $profileImage1);
  Storage::delete($new->image);
$data['image'] = $profileImage1;
  }

if($files=$request->file('upload_files')){
foreach($files as $file){
$destinationPath = 'public/storage/posts/';
$name=date('YmdHis') . "." .$file->getClientOriginalName();
$file->move($destinationPath,$name);
$images[]=$name;
Storage::delete($new->multiple_image);
$data['multiple_image'] = json_encode($images);
}
}
$new->update($data);
session()->flash('success','News & Event Sucesfully Updated');
return redirect( route('news.index') );
        
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
        $media=News::find($id);
        Storage::delete($media->image);
        Storage::delete($media->multiple_image);
        $media->delete();
     
        session()->flash('error','News & Event deleted successfully.');
      return redirect( route('news.index'));
        //
    }

       public function status($id){

        $media=News::find($id);  
     if($media->status== 1){
         $media->status = 0;
     }else{
         $media->status =1;
     }
     session()->flash('success','status has been succesfully updated');
     $media->save();
         return redirect(route('news.index'));
   }



}
