<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Db;
use App\Models\NoteBook;
use Illuminate\Support\Facades\Storage;

class NoteBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notebooks=Db::table('note_books')->get();
        return view('admin.notebook.index',compact('notebooks'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notebook.create');
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
        if($request->hasFile('file')){
        $image = $request->file('file');
        $destinationPath = 'public/storage/posts/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        }

        Db::table('note_books')->insert([
            "note_id"=>$request->note_id,
            "subnote_id"=>$request->subnote_id,
            "title"=>$request->title,
            "file"=>$profileImage,
            "type"=>$request->type
           ]);

           session()->flash('success','Classes Created Sucesfully');
           return redirect()->route('classes.index');
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
        $notebook=Db::table('note_books')->find($id);
        return view('admin.notebook.show',compact('notebook'));
        
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
        $notebook=Db::table('note_books')->find($id);
        return view('admin.notebook.edit',compact('notebook'));
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
        $notebook=NoteBook::find($id);

       
        $data=$request->only(['note_id','subnote_id','title']);
       
        if($request->hasFile('file')){
           
           
            $image = $request->file('file');
            $destinationPath = 'public/storage/posts/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
           Storage::delete($notebook->file);
            $data['file'] = $profileImage;
            
            $notebook->file=$data['file'];
            $notebook->save();
            }

            $notebook->update($data);
           session()->flash('success','Classes Updated Sucesfully');
           return redirect()->route('classes.index');
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
        
        Db::table('note_books')->where('id',$id)->delete();
        session()->flash('success','Classes Deleted Sucesfully');
        return redirect()->route('classes.index');
        //
    }
    public function note(){
  $notecategories=Db::table('notes')->simplePaginate(10);
return view('admin.notebook.note',compact('notecategories'));
    }

       public function class(){
    $classcategories=Db::table('online_classes')->simplePaginate(10);
    return view('admin.notebook.class',compact('classcategories'));
    }

    public function note_id($id){
        $noteids=Db::table('sub_notes')->where('note_id',$id)->simplePaginate(10);  
        return view('admin.notebook.subnote',compact('noteids'));
    }

    public function class_id($id){
       
        $classids=Db::table('sub_classes')->where('note_id',$id)->simplePaginate(10);  
        return view('admin.notebook.subclass',compact('classids','id'));
    }

    public function search_note(Request $request){
      
        $id=$request->id;
        $search=$request->search;
        $searchs=Db::table('sub_classes')->where('name','LIKE','%'.$search.'%')->where('note_id',$id)->Paginate(10);
        return view('admin.notebook.subclass',compact('searchs','id','search'));
    }

    public function search_user(Request $request){
      
       
        $search=$request->search;
        $searchs=Db::table('users')->where('name','LIKE','%'.$search.'%')->Paginate(10);
        return view('admin.users.unverify',compact('searchs','search'));
    }

    

    public function subnote_id($id){
        $notes=Db::table('note_books')->where('subnote_id',$id)->simplePaginate(10);  
        return view('admin.notebook.notes',compact('notes','id'));
    }
    public function search_class(Request $request){
      
        $id=$request->id;
        $search=$request->search;
        $searchs=NoteBook::where('title','LIKE','%'.$search.'%')->where('subnote_id',$id)->Paginate(10);
        return view('admin.notebook.notes',compact('searchs','id','search'));
    }

   
    public function pdf($id){
        
        $pdf=Db::table('sub_classes')->find($id);
        return view('admin.notebook.pdf',compact('pdf'));
    }

   
    public function subclass($id){
    
        $output = "";
        $subcategories=Db::table('sub_notes')->where('note_id',$id)->get();
      
        if($subcategories->count() > 0){
            $output .='<option valu="0">select sub under category</option>';
            foreach($subcategories as $subundercategory){
                $output .= 
    '<option value="'.$subundercategory->id.'">'.$subundercategory->name.'</option>';
            }
        }else{
        $output .='<option value="">No subundercategory found</option>';
        }
        return Response($output);
     }
 

}
