<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Events\MessageSent;
use App\Message;
use App\User;
use Auth;

class ChatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.viewchats.index');
    }

    public function fetchMessages()
    {
        //return Message::with('user')->get();
        if (Auth::user())
        {
            //$user = Auth::user();
            $_iduser = Auth::id();
            //$qr_listmessage = DB::select('call listmessageProcedure(?)',array($_iduser));
            $qr_listmessage = DB::select('call LatestMessageProcedure()');
            $rs_listmessage = json_decode(json_encode($qr_listmessage));
            $result = array();
            $i = 0;
            foreach ($rs_listmessage as $message) {
                $result[$i]['message'] = $message->message;
                $result[$i]['user']['name'] = $message->name;
                $i++;
            }
            return $result;
        }
    }

    public function sendMessage(Request $request)
    {
        // if (Auth::user())
        // {
        //     $user = Auth::user();
        //     $_iduser = Auth::id();
        //     $_message = $request->message;
        //     $qr_sendmessage = DB::select('call SendmessageProcedure(?,?)',array($_iduser , $_message ));
        //     $rs_sendmessage = json_decode(json_encode($qr_sendmessage));
        //     $messages = new Message;
        //     $messages->message = $_message;
        //     //$users = new User;
        //     //$users->id = $_iduser;
        //     broadcast(new MessageSent($user, $messages))->toOthers();
        //     return ['status' => 'Message Sent!'];
        // }
        $message = auth()->user()->message()->create([
            'message' => $request->message
        ]);
        broadcast(new MessageSent(auth()->user(), $message))->toOthers();
        //broadcast(new MessageSent($message->load('user')))->toOthers();
        return ['status' => 'Message Sent!']; 
    }
}
