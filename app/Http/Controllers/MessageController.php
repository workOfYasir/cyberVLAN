<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        $users = User::all();
        $sender = $request->sender;
        $reciver = $request->reciver;
        if(isset($request->sender)){
            $allmessages=Message::with('user')->with('reciever')->where('user_id',$request->reciver)->where('receiver_id',$request->sender)->orWhere('user_id',$request->sender)->where('receiver_id',$request->reciver)->orderBy('id','desc')->get();
            $reciver =$request->reciver;
            $sender =$request->sender;
          
        return view('backend.pages.msg.index')->with('user',$user)->with('users',$users)->with('allmessages',$allmessages)->with('sender',$sender)->with('reciver',$reciver);
        }
        
        return view('backend.pages.msg.index')->with('user',$user)->with('users',$users);
    }
    public function dynamicId($sender_id){

$recievers = Message::where('user_id',$sender_id)->with('reciever')->groupBy('user_id')->get();

        // $recievers=Message::where('receiver_id',$sender_id)->orWhere('user_id',$sender_id)->orderBy('id','desc')->get();
        return $recievers;
    }
}
