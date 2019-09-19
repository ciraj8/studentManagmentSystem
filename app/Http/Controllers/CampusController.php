<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campus;
use Brian2694\Toastr\Facades\Toastr;
use Gate;

class CampusController extends Controller
{
    public function index()
    {
        $campuses = Campus::latest()->paginate(5);
  
        return view('admin.campuses.index',compact('campuses'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.campuses.create');
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
            'campus_name' => 'required',
            
        ]);
  
        Campus::create($request->all());
        Toastr::success('Campus successfully Added!','Success');

        return redirect()->route('campuses');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\course  $course
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // if(!Gate::allows('isAdmin')){
        //     abort(401);
        // }
        $campus = Campus::find($id);
        return view('admin.campuses.edit',compact('campus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // if(!Gate::allows('isAdmin')){
        //     abort(401);
        // }
        $request -> validate([
            'campus_name' => 'required',
        ]);
        $course = Campus::find($id);
        $course -> campus_name = $request -> campus_name;
        $course -> save();
        Toastr::success('Campus successfully updated!','Success');
        return redirect()->route('campuses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\course  $course
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // if(!Gate::allows('isAdmin')){
        //     abort(401);
        // }
        $campus = Campus::find($id);
        $campus -> delete();
        Toastr::error('Campus successfully deleted!','Deleted');
        return redirect()->route('campuses');
    }
}
