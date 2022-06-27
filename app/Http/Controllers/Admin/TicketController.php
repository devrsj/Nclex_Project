<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ticket;
use App\Notifications\NewTicket;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class TicketController extends Controller
{
    function __construct()
    {
       $this->middleware('permission:ticket-index', ['only' => ['index','show']]);
       $this->middleware('permission:ticket-create', ['only' => ['create','store']]);
       $this->middleware('permission:ticket-edit', ['only' => ['edit','update']]);
       $this->middleware('permission:ticket-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $tickets=Db::table('tickets')->get();
        if($tickets !=null){
        return view('admin.ticket.index',compact('tickets'));
        }else{
              session()->flash('success','No Tickets');
              return redirect()->back();
        }
       
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ticket.create');
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
             Db::table('tickets')->insert([
              "user_id"=>Auth()->user()->id,
              "ticket_code"=>random_int(100000, 999999),
              "problem"=>$request->problem,
              "description"=>$request->reply,
              "status"=>"Pending",
              ]);
          session()->flash('success','Ticket Created');
          return redirect()->route('ticket.view');
        //
    }
      public function view(){
        
        $ticketviews=Db::table('tickets')->where('user_id',Auth()->user()->id)->get();
        return view('admin.ticket.view',compact('ticketviews'));
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
        $ticket=Db::table('tickets')->find($id);
        return view('admin.ticket.edit',compact('ticket'));
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
      
      if($request->status=="Pending"){
        $reply=Db::table('ticket__replies')->insert([
           "user_id"=>$request->user_id,
           "ticket_code"=>$request->ticket_code,
            "ticket_id"=>$id,
            "description"=>$request->reply,
        ]);
    }

    if($request->status=="close"){
        $reply=Db::table('ticket__replies')->insert([
            "user_id"=>$request->user_id,
            "ticket_code"=>$request->ticket_code,
             "ticket_id"=>$request->ticket_id,
             "description"=>$request->reply,
         ]);
         Db::table('tickets')->where('id',$id)->update([
          "status"=>$request->status,
         ]);
    }
    session()->flash('success','Reply sucesfully Sent');
    return redirect()->back();


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
        //
    }

    public function most_view(Request $request){
      
        $most_views=Db::table('products')->where('is_admin',Auth()->user()->is_admin)->where('user_id',Auth()->user()->id)->orderBy('view','desc')->cursor();
        return view('admin.product.most_view',compact('most_views'));

    }

    public function tickets(Request $request){
      
        $ticket=new Ticket();
        $ticket->user_id="2";
        $ticket->save();
        $ticket->notify(new NewTicket($ticket));
        session()->flash('success','Ticket Succesfully Created');
        return redirect()->back();
    }

}
