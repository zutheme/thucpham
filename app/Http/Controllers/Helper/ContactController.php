<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Comments;
use Validator;
use Illuminate\Support\MessageBag;
class ContactController extends Controller
{
    public function contact(){    	
		$input = json_decode(file_get_contents('php://input'),true);
		$iduser = Auth::id();
        if(!isset($iduser)){
            $iduser = 36;
        }        
		$_comment_author = $input['name'];
		$_comment_author_email = $input['email'];
		$_comment_author_url = $input['url'];
		$_comment_author_IP = $this->get_client_ip(); 
		$_comment_date_gmt = ''; 
		$_comment_content = $input['comment']; 
		$_comment_approved = 0; 
		$_comment_agent = $_SERVER['HTTP_USER_AGENT']; 
		$_comment_type = 'comment'; 
		$_comment_parent = 0; 
		$_user_id = $iduser; 
		$_comment_phone = $input['phone'];
		$_comment_address = $input['address'];
		$_comment = new Comments(['comment_post_ID'=> $_comment_post_ID, 'comment_author'=>$_comment_author, 'comment_author_email'=>$_comment_author_email, 'comment_author_url'=> $_comment_author_url, 'comment_author_IP'=>$_comment_author_IP, 'comment_date_gmt'=>$_comment_date_gmt, 'comment_content'=>$_comment_content, 'comment_approved'=>$_comment_approved, 'comment_agent'=>$_comment_agent, 'comment_type'=>$_comment_type, 'comment_parent'=>$_comment_parent, 'user_id'=>$_user_id, 'comment_phone'=>$_comment_phone, 'comment_address'=>$_comment_address, 'created_at'=>$_created_at, 'updated_at'=>$_updated_at]);
            $_comment->save();
            $comment_ID = $_comment->comment_ID;     
		//$qr_contact = DB::select('call ContactProcedure(?,?)',array($_idproduct,$_namestore));
		//$rs_contact = json_decode(json_encode($qr_contact), true);        
		return response()->json(array('comment_ID' =>$comment_ID)); 
	}
	public function get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
    public function getbrowser(){
    	//echo $_SERVER['HTTP_USER_AGENT'];
		$browser = get_browser();
		print_r($browser);
    }
}
