<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Image;

class PageController extends Controller
{

    function __construct(){ 
    $this->middleware('permission:page-index', ['only' => ['index','show']]);
    $this->middleware('permission:page-create', ['only' => ['create','store']]);
    $this->middleware('permission:page-edit', ['only' => ['edit','update']]);
    $this->middleware('permission:page-delete', ['only' => ['destroy']]);
    $this->middleware('permission:page-status', ['only' => ['status']]);
      }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i=1;
        return view('admin.page.index',compact('i'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.create');
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


         if($request->hasFile('banner') && $request->hasFile('image')==null ){
            $image0 = $request->file('banner');
            $destinationPath0= 'public/storage/posts/';
            $filename0 = date('YmdHis') . "." . $image0->getClientOriginalExtension();
            $image0->move($destinationPath0, $filename0);

            Page::create([
            "name" => $request->name,
            "position"=> $request->position_type,
            "type"=> $request->page_type,
            "description" => $request->description,
            "link" => $request->link,
            "short_description"=>$request->short_description,
            "parent_id"=> $request->parent_id,
            "banner" =>$filename0,
            "weight"=> $request->weight,
            "status" => $request->status,
            "video_url"=>$request->video_url,
            "branch"=>$request->branch,
            "team_member"=> $request->team_member,
            "customer_section"=> $request->customer_section,
            "category"=>$request->category,
            "meta_title"=> $request->meta_title,
            "meta_description" => $request->meta_description,
            "meta_keyword" => $request->meta_keyword,
            'slug' =>preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.str::random(5)
       ]);
       }else if($request->hasFile('image') && $request->hasFile('banner')==null){
        
            $image = $request->file('image');
            $destinationPath = 'public/storage/posts/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
       
        
        
        Page::create([
            "name" => $request->name,
            "position"=> $request->position_type,
            "type"=> $request->page_type,
            "description" => $request->description,
            "link" => $request->link,
            "short_description"=>$request->short_description,
            "parent_id"=> $request->parent_id,
            "banner" =>$request->banner,
            "icon"=>$profileImage,
            "weight"=> $request->weight,
            "status" => $request->status,
            "video_url"=>$request->video_url,
            "branch"=>$request->branch,
            "team_member"=> $request->team_member,
            "customer_section"=> $request->customer_section,
            "category"=>$request->category,
            "meta_title"=> $request->meta_title,
            "meta_description" => $request->meta_description,
            "meta_keyword" => $request->meta_keyword,
            'slug' =>preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.str::random(5)
        ]);

       }elseif($request->hasFile('image') && $request->hasFile('banner')){

    
            $image = $request->file('image');
            $destinationPath = 'public/storage/posts/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        
        $image1 = $request->file('banner');
        $destinationPath1 = 'public/storage/posts/';
    $profileImage1 = date('YmdHis') . "." . $image1->getClientOriginalExtension();
    $image1->move($destinationPath1, $profileImage1);
    
         
        Page::create([
            "name" => $request->name,
            "position"=> $request->position_type,
            "type"=> $request->page_type,
            "description" => $request->description,
            "link" => $request->link,
            "short_description"=>$request->short_description,
            "parent_id"=> $request->parent_id,
            "banner" =>$profileImage1,
            "icon"=>$profileImage,
            "weight"=> $request->weight,
            "status" => $request->status,
            "video_url"=>$request->video_url,
            "branch"=>$request->branch,
            "team_member"=> $request->team_member,
            "customer_section"=> $request->customer_section,
            "category"=>$request->category,
            "meta_title"=> $request->meta_title,
            "meta_description" => $request->meta_description,
            "meta_keyword" => $request->meta_keyword,
            'slug' =>preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.str::random(5)
        ]);
       }else{          
        Page::create([
            "name" => $request->name,
            "position"=> $request->position_type,
            "type"=> $request->page_type,
            "description" => $request->description,
            "link" => $request->link,
            "short_description"=>$request->short_description,
            "parent_id"=> $request->parent_id,
            "banner" =>null,
            "icon"=>null,
            "weight"=> $request->weight,
            "status" => $request->status,
            "video_url"=>$request->video_url,
            "branch"=>$request->branch,
            "team_member"=> $request->team_member,
            "customer_section"=> $request->customer_section,
            "category"=>$request->category,
            "meta_title"=> $request->meta_title,
            "meta_description" => $request->meta_description,
            "meta_keyword" => $request->meta_keyword,
            'slug' =>preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.str::random(5)
  ]);
        
       }
       
      



           session()->flash('success','pages created successfully.');
            return redirect( route('page.index') );

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return view('admin.page.show',compact('page'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('admin.page.edit',compact('page'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Page $page)
    {
    
          $this->validate($request,[
         'slug'=>'required|alpha-dash|unique:pages,slug,'.$page->id,
      ]);
        
        $data=$request->only(['name','position','type','short_description','description','link','parent_id','weight','status',
        'meta_title','meta_description','meta_keyword']);

        $page->branch=$request->branch;
        $page->team_member=$request->team_member;
        $page->customer_section=$request->customer_section;
        $page->category=$request->category;
        $page->video_url=$request->video_url;
           $page->slug=$request->slug;
           $page->save();

    
              if($request->hasfile('banner')){
                $image = $request->file('banner');
                $destinationPath = 'public/storage/posts/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            Storage::delete($page->banner);
             $data['banner'] = $profileImage;
             }

             if($request->hasfile('image')){
                $image = $request->file('image');
                $destinationPath = 'public/storage/posts/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
     
            $image->move($destinationPath, $profileImage);
            Storage::delete($page->icon);
             $data['icon'] = $profileImage;
             }

             $page->update($data);
             session()->flash('success','page upated successfully.');
               return redirect(route('page.index'));


        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        
        $page->delete();
        session()->flash('error','pages deleted successfully.');
               return redirect( route('page.index') );
        //
    }

      public function status($id){

        $page=Page::find($id);
        if($page->status== 1){
            $page->status = 0;
        }else{
            $page->status =1;
        }
        session()->flash('success','status has been succesfully updated');
        $page->save();
            return redirect(route('page.index'));
      }

}
