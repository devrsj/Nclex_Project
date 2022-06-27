<?php

namespace App\Http\Controllers\Admin;
use Carbon\Carbon;
use App\Models\Page;
use App\Models\Blog;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Order;
use App\Models\People;
use App\Models\Contact;
use App\Models\User;
use App\Models\Address;
use App\Models\Shipment;
use App\Models\ShipmentBooking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class HomeController extends Controller
{
  function __construct(){
    $this->middleware('permission:book-event',['only' => ['event_index']]);
  }
    public function index(){
      $data['visitors']=Db::table('site_users')->count();
        $data['tagcount']=DB::table('tags')->count();     
        $data['peoplecount']=DB::table('people')->count();
         $data['pagecount']=DB::table('pages')->count();
         $data['blogcount']=DB::table('blogs')->count();
         $data['usercount']=DB::table('users')->count();
         $data['contactcount']=DB::table('contacts')->count();    
         $data['site']=Db::table('constructions')->first();
          $data['classcount']=DB::table('note_books')->count();    
         $data['notecount']=Db::table('sub_classes')->count();
       $data['logins']=User::where('last_login_at','!=',null)->where('is_admin','!=','a')->orderBy('last_login_at','desc')->limit(3)->cursor();
          return view('admin.index')->with($data);
     
    }

      public function show()
    {   
      return view('admin.profile.index')->with('user',auth()->user());
        //
    }
    public function changeprofile()
    {

     return view('admin.profile.edit')->with('user',auth()->user());
       
        //
    }


      public function updateprofile(Request $request,User $user){
        $user->name=$request->name;
        $user->email=$request->email;
        $user->number=$request->phone;
        $user->company_name=$request->company_name;
        $user->save();
        $address = Address::where('user_id',$user->id)->first();
        $address->city=$request->city;
        $address->street=$request->street;
        $address->country=$request->country;
        $address->postal_code=$request->postal_code;
        $address->save();

        session()->flash('success','User information updated sucesfully updated');
        return redirect()->back();

    }
    
    
    public function  cache(){
        dd('gt');
        
    }
    
    public function event_index(){
     
        $events=Db::table('events')->cursor();
        return view('admin.booking_event.index',compact('events'));
    }


 public function event_destroy($id){
     
        $event=Db::table('events')->where('id',$id)->delete();
        session()->flash('success','Event Deleted Succesfully');
        return redirect()->back();
    }

    //
}
