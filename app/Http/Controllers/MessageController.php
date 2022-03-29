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
            $msgSender = Message::with('user')->with('reciever')->where('user_id',$request->sender)
                            ->where('receiver_id',$request->reciver)
                            ->get();
            $msgReciever = Message::with('user')->with('reciever')->where('receiver_id',$request->sender)
                        ->where('user_id',$request->reciver)
                        ->get();
           
        return view('backend.pages.msg.index')->with('user',$user)->with('users',$users)->with('msgSender',$msgSender)->with('msgReciever',$msgReciever)->with('sender',$sender)->with('reciver',$reciver);
        }
        
        return view('backend.pages.msg.index')->with('user',$user)->with('users',$users);
    }
}
