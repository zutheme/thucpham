<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\flcustomer;
use App\PostType;
use App\Products;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Support\MessageBag;
use App\func_global;
use App\User;
use App\Notifications\ProductNotification;
use Illuminate\Support\Facades\Notification;

class VoipController extends Controller
{
    public function getdatavoip(Request $request){
    	$input = json_decode(file_get_contents('php://input'),true);
    	$_extend = $input['extend'];
    	$_state = $input['state'];
	    $_phone = $input['phone'];
	    $_callid = $input['callid'];
	    $_type = $input['type'];
    	$result = array('extend'=>$_extend, 'state' =>$_state, 'phone' => $_phone, 'callid'=>$_callid, 'type'=>$_type);
		return response()->json($result);
    }
}
