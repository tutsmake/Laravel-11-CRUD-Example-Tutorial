<?php
  
namespace App\Http\Controllers;
   
use App\Models\Note;
use Illuminate\Http\Request;
  
class NoteCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['notes'] = Note::orderBy('id','desc')->paginate(5);
    
        return view('notes.index', $data);
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $Note = new Note;
        $Note->title = $request->title;
        $Note->description = $request->description;
        $Note->save();
     
        return redirect()->route('notes.index')
                        ->with('success','Note has been created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Note  $Note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        return view('notes.show',compact('note'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Note  $Note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        return view('notes.edit',compact('note'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Note  $Note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        
        $Note = Note::find($id);
        $Note->title = $request->title;
        $Note->description = $request->description;
        $Note->save();
    
        return redirect()->route('notes.index')
                        ->with('success','Note Has Been updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Note  $Note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $note->delete();
    
        return redirect()->route('notes.index')
                        ->with('success','Note has been deleted successfully');
    }
}