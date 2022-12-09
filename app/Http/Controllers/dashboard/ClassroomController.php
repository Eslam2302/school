<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Level;
use App\Models\User;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
 
    public function index()
    {
        //
    }//end of index

    public function create()
    {
        $levels = Level::all();
        return view('dashboard.classrooms.create', compact('levels'));

    }// end of create

    public function store(Request $request)
    {
        
        $request->validate([
            'level_id'      => 'required',
            'class_number'  => 'required',
        ]);


        Classroom::create($request->all());
        $activity = Activity::all()->last();
        return redirect()->route('dashboard.users.index');


    }//end of store

    public function show(Classroom $classroom)
    {
        $users = User::where('class_id' , $classroom->id)->get();
        return view('dashboard.classrooms.show', compact('classroom','users'));
    }//end of edit

    public function edit(Classroom $classroom)
    {
        
    }//end of edit

    public function update(Request $request, Classroom $classroom)
    {
        //
    }//end of update

    public function destroy(Classroom $classroom)
    {
        //
    }//end of destroy
}
