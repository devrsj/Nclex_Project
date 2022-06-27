<?php

namespace App\Http\Controllers\Admin;

use App\Models\People;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class PeopleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:people-index', ['only' => ['index','show']]);
        $this->middleware('permission:people-create', ['only' => ['create','store']]);
        $this->middleware('permission:people-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:people-delete', ['only' => ['destroy']]);
        $this->middleware('permission:people-status', ['only' => ['status']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.people.index');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.people.create');
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
                       
                        People::create([   
                        "name" => $request->name,
                        "post" => $request->post,
                        "description" => $request->description,
                      "status" => $request->status,
                       "image" => $profileImage,
                       "weight" => $request->weight
                      ]);

                      session()->flash('success','Recent passer sucesfully added');
                      return redirect(route('people.index'));
                }
            

                
              

                      
        //
    

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
        $people=People::find($id);
        return view('admin.people.edit',compact('people'));
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
        $people=People::findorfail($id);
        $data=$request->only(['name','post','description','weight','status']);
        $video_url=$request->video_url;

        if($request->hasFile('image')){

            $image = $request->file('image');
            $destinationPath = 'public/storage/posts/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            Storage::delete($people->image);
            $data['image'] =  $profileImage;    
        }
            


        $people->update($data);
        session()->flash('success','Recent passer sucesfully updated');
        return redirect(route('people.index'));
        //
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
        
        $people=People::findorfail($id);
        $people->delete();
        session()->flash('error','Recent passer sucesfully deleted');
        return redirect(route('people.index'));
        //
    }


    public function status($id){
      
        $people=People::find($id);  
        if($people->status== 1){
            $people->status = 0;
        }else{
            $people->status =1;
        }
        session()->flash('success','Status has been succesfully changed');
        $people->save();
            return redirect(route('people.index'));
      }

}
