<?php

namespace App\Http\Controllers;

use App\Document;
use App\User;
use Illuminate\Http\Request;

use Brian2694\Toastr\Facades\Toastr;
use Gate;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1()
    {
        // if(!Gate::allows('isAdmin')){
        //     abort(401);
        // }
        $admindocs = Document::all();
        return view('admin.document.index1',compact('admindocs'));
    }

    public function index()
    {
        // if(!Gate::allows('isAdmin')){
        //     abort(401);
        // }
        $docs = Document::all();
        return view('admin.document.index',compact('docs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if(!Gate::allows('isAdmin')){
        //     abort(401);
        // }
        return view('admin.document.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if(!Gate::allows('isAdmin')){
        //     abort(401);
        // }
        $request -> validate([
            'document_type' => 'required',
            'document' => 'required',

    ]);
        $doc = new Document();
        $doc -> document_type = $request -> document_type;
        $doc -> user_id = auth()->user()->id;
        if($request->hasfile('document')){
            $file = $request->file('document');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file -> move('uploads/gallery/', $filename);
            $doc->document = $filename;
        }else{
            $doc->document = '';
        }



        // if($request->hasFile('document')){
        //     // Get filename with the extension
        //     $filenameWithExt = $request->file('document')->getClientOriginalName();
        //     // Get just filename
        //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //     // Get just ext
        //     $extension = $request->file('document')->getClientOriginalExtension();
        //     // Filename to store
        //     $fileNameToStore= $filename.'_'.time().'.'.$extension;
        //     // Upload Image
        //     $path = $request->file('document')->storeAs('public/document', $fileNameToStore);
        // } else {
        //     $fileNameToStore = 'noimage.jpg';
        // }



        
    //    $user -> password = bcrypt($request -> password);
//        $user -> status = $request -> status == 'active'?1:0;
        $doc -> save();
        Toastr::success('Document  successfully uploaded!','Success');
        return redirect()->route('documents');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // if(!Gate::allows('isAdmin')){
        //     abort(401);
        // }
        $document = Document::find($id);
        return view('admin.document.edit',compact('document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // if(!Gate::allows('isAdmin')){
        //     abort(401);
        // }
        $request -> validate([
            'document_type' => 'required',
            'document' => 'required',
        ]);
        $document = Document::find($id);
        $document -> document_type = $request -> document_type;
        $document -> user_id = auth()->user()->id;
        if($request->hasfile('document')){
            $file = $request->file('document');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file -> move('uploads/gallery/', $filename);
            $document->document = $filename;
        }else{
            $document->document = '';
        }
        $document -> save();
        Toastr::success('document successfully updated!','Success');
        return redirect()->route('documents');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // if(!Gate::allows('isAdmin')){
        //     abort(401);
        // }
        $document = Document::find($id);
        $document -> delete();
        Toastr::error('Document successfully deleted!','Deleted');
        return redirect()->route('documents');
    }
}
