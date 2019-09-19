<?php

namespace App\Http\Controllers;

use App\course;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Gate;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = course::latest()->paginate(5);
  
        return view('admin.courses.index',compact('courses'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courses.create');
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
            'course_name' => 'required',
            
        ]);
  
        course::create($request->all());
        Toastr::success('Course successfully Added!','Success');

        return redirect()->route('courses');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(course $course)
    {
        //
    }

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
        $course = course::find($id);
        return view('admin.courses.edit',compact('course'));
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
            'course_name' => 'required',
        ]);
        $course = course::find($id);
        $course -> course_name = $request -> course_name;
        $course -> save();
        Toastr::success('Course successfully updated!','Success');
        return redirect()->route('courses');
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
        $course = course::find($id);
        $course -> delete();
        Toastr::error('Course successfully deleted!','Deleted');
        return redirect()->route('courses');
    }
}
