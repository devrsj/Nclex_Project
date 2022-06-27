<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PopupQuestion;
use App\Models\Answer;
use DB;

class PopupQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popups=PopupQuestion::all();
        return view('admin.popup.index',compact('popups'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.popup.create');
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
        $popup= PopupQuestion::create(['name' => $request->name]);
        $answer=Answer::create(['question_id' => $popup->id]);
        session()->flash('success','Popup question created succesfully');
        return redirect()->route('popupquestion.index');
        //
    }

    public function answer_store(Request $request,$id){

        Db::table('answers')->where('question_id',$id)->update([
           "option1"=>$request->option1,
           "option2"=>$request->option2,
           "option3"=>$request->option3,
           "option4"=>$request->option4,
           "correct_answer"=>$request->correct_answer
        ]);

        session()->flash('success','Popup question created succesfully');
        return redirect()->route('popupquestion.index');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $popup=PopupQuestion::find($id);
        $answer=Db::table('answers')->where('question_id',$id)->first();
        return view('admin.popup.show',compact('popup','answer'));
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
        $popup=PopupQuestion::find($id);
        return view('admin.popup.edit',compact('popup'));
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
        $popup=PopupQuestion::find($id);
        $popup->name=$request->name;
        $popup->save();
        session()->flash('success','Popup question updated succesfully');
        return redirect(route('popupquestion.index'));
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
        $popup=PopupQuestion::find($id);
        $popup->delete();
        session()->flash('error','popup question deleted succesfully');
        return redirect(route('popupquestion.index'));
        //
    }
}
