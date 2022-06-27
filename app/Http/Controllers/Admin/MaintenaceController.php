<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Maintenance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class MaintenaceController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:maintenace-index', ['only' => ['index','show']]);
        $this->middleware('permission:maintenace-create', ['only' => ['create','store']]);
        $this->middleware('permission:maintenace-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:maintenace-delete', ['only' => ['destroy']]);
        $this->middleware('permission:maintenace-status', ['only' => ['status']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
    $maintenances=Db::table('maintenances')->get();
    return view('admin.maintenace.index',compact('maintenances'));
        //
    }

    public function chat_index(){
        
         if(Auth()->user()->is_admin=="v"){   
            $user=User::where('id',1)->first();
            return view('admin.chat.create',compact('user'));
        }else{
        $i=1;
        $vendors=Db::table('users')->where('is_admin','v')->where('status',1)->cursor();
        return view('admin.chat.index',compact('vendors','i'));
        }
    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.maintenace.create');
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

        DB::table('maintenances')->insert([
            'ip_address' =>  $request->ip_address,
            'status' =>  $request->status,
        ]);

        session()->flash('success','Ip address added successfully');
        return redirect()->route('maintenace.index');
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
        $maintenace=Db::table('maintenances')->find($id);
        return view('admin.maintenace.edit',compact('maintenace'));
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
        $maintenace = DB::table('maintenances')
              ->where('id',$id)
              ->update(['ip_address' => $request->ip_address,
                          'status'=>$request->status]);
        //

        session()->flash('success','Ip address updated successfully');
        return redirect()->route('maintenace.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $db=Db::table('maintenances')->where('id',$id)->delete();
        session()->flash('error','Ip address deleted successfully');
        return redirect()->route('maintenace.index');
        //
    }

       public function chat($id){

        $user=User::where('id',$id)->first();

        return view('admin.chat.create',compact('user'));

    }

   public function status($id){
    $maintenace=Maintenance::findorfail($id);
    if($maintenace->status== 1){
        $maintenace->status = 0;
    }else{
        $maintenace->status =1;
    }
    session()->flash('success','status has been succesfully updated');
    $maintenace->save();
        return redirect(route('maintenace.index'));
   }

}
