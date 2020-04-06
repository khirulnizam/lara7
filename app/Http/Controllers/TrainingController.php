<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Training;
//add Storage facade
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class TrainingController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }//end construct

    public function index(Request $request)
    {
        if($request->get('keyword')!=null){
            //search based on keyword
            $keyword=$request->get('keyword');
            $trainings = Training::where('title', 'LIKE', '%'.$keyword.'%')
                ->paginate(5);
        }
        //display all record
        else{
            $trainings = Training::paginate(5);//SELECT * FROM trainings
        }
        
        return view ('trainings.index')->with(compact('trainings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //display form create
        return view('trainings.create');//create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $training=new Training();
        $training->title=$request->get('title');
        $training->description=$request->get('description');
        $training->trainer=$request->get('trainer');

        //file uploaded?
        if($request->hasFile('attachment')){
            $this->validate($request,
                ['attachment'=>'mimes:jpeg,jpg,png,bmp,gif|max:2048',],
                $errors=[
                    'required'=>'The :attribute field is required.',
                    'mimes'=>'Only jpeg, jpg, png, bmp, gif with max filesize 2MB'
                ]
            );//end validation

            //regenerate filename
            //example 2020-04-06-Laravel101.png
            $filename=date('Y-m-d').'-'.$request->get('title').'.'.$request->attachment->getClientOriginalExtension();
            //store image file to web server
            Storage::disk('public')->put($filename,
                File::get($request->attachment));
            //fetch filename to save to db
            $training->filename=$filename;

        }//end file upload process

        $training->save();

        //redirect to index
        return redirect('/trainings');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $training=Training::find($id);
        return view ('trainings.show')->with(compact('training'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //call form update
        $training=Training::find($id);
        return view('trainings.edit')->with(compact('training')); //call form edit
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
        //save edited record
        $training=Training::find($id);
        $training->update(
                $request->only('title','description',
                    'trainer')
            );
        //redirect to index
        return redirect('/trainings')->with('success',
            'Training record has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)// delete/destroy
    {
        //delete record based on id
        $training=Training::find($id);
        $training->delete();
        return redirect ('/trainings')->with('success',
            "Record id: $id has been deleted");
    }

    
}
