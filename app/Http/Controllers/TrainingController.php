<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Training;

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)//destroy
    {
        //
    }

    
}
