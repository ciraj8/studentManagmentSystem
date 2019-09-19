<?php

namespace App\Http\Controllers;
use App\Message;
use App\User;
use App\UserMessage;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class MessageController extends Controller
{
    // public function index1()
    // {
    //     // if(!Gate::allows('isAdmin')){
    //     //     abort(401);
    //     // }
    //     $adminmessages = Message::orderBy('created_at', 'DESC')->get();
    //     return view('admin.message.index1',compact('adminmessages'));
    // }
    public function index()
    {
        // if(!Gate::allows('isAdmin')){
        //     abort(401);
        // }
        $messages = Message::orderBy('created_at', 'DESC')->get();
        return view('admin.message.index',compact('messages'));
    }

    public function create()
    {
        // if(!Gate::allows('isAdmin')){
        //     abort(401);
        // }
        return view('admin.message.create');
    }

    public function store(Request $request)
    {
        // if(!Gate::allows('isAdmin')){
        //     abort(401);
        // }
        $request -> validate([
            'message' => 'required',
            

    ]);
        $message = new Message();
        $message -> message = $request -> message;
        $message -> user_id = auth()->user()->id;
        $message -> save();
        Toastr::success('message send  successfully','Success');
        return redirect()->route('message');
    }

    // public function replycreate($id)
    // {
    //     // if(!Gate::allows('isAdmin')){
    //     //     abort(401);
    //     // }
    //     $reply = Message::find($id);
    //     return view('admin.message.reply',compact('reply'));
    // }

    public function replycreate()
    {
        // if(!Gate::allows('isAdmin')){
        //     abort(401);
        // }
        return view('admin.message.reply');
    }
    public function replystore(Request $request)
    {
        // if(!Gate::allows('isAdmin')){
        //     abort(401);
        // }
        $request -> validate([
            'reply' => 'required',
            

    ]);
        $usermessage = new UserMessage();
        $usermessage -> reply = $request -> reply;
        $usermessage -> user_id = auth()->user()->id;
        $usermessage -> save();
        Toastr::success('message send  successfully','Success');
        return redirect()->route('message');
    }
    
}
