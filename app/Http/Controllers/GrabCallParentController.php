<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\flcustomer;
use App\PostType;
use App\Products;
//use App\Console\Commands\GoogleSheetApiCommand;
//use App\Console\Commands\GoogleApiConsoleCommand;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Support\MessageBag;
use App\func_global;
use App\User;
use App\Notifications\ProductNotification;
use Illuminate\Support\Facades\Notification;

class GrabCallParentController extends Controller
{
	public function getDataGrabCall(Request $request){
		    $input = json_decode(file_get_contents('php://input'),true);
        //$_ticket = $input['ticket'];
        $input['option'] = array('formspread'=>0,'spreadsheetid'=>'1SO0kxbPNERLWzqUtxvWsgD2uGhKubs0dRH_U1S4BJ6s');
        return $this->ProcessDataGrabCall($request, $input);
    }
    public function ProcessDataGrabCall(Request $request, $input){
    	//$_GoogleSheetApiCommand = new GoogleSheetApiCommand();
      //$_GoogleSheetApiCommand = new GoogleApiConsoleCommand();
    	$_ticket = $input['data'];
  		$ip = $_ticket['ip'];
  		$phone = $_ticket['phone'];
  		$time = $_ticket['time'];
  		$url = $_ticket['url'];
  		$carrier = '';
  		if(isset($_ticket['type'])){
  			$carrier = $_ticket['type'];
  		}
  		$facebookName = '';
  		if(isset($_ticket['facebookName'])){
  			$facebookName = $_ticket['facebookName'];
  		}
  		$facebookUid = '';
  		if(isset($_ticket['facebookUid'])){
  			$facebookUid = $_ticket['facebookUid'];
  		}
  		
  		if(!isset($phone) || empty($phone)) {
  			return array('error'=> 1,'message'=>'phone field is empty');
  		}
		//insert data
		try{
			$flcustomer = new flcustomer(['ip'=>$ip, 'phone'=> $phone, 'carrier'=> $carrier, 'time' => $time, 'url' => $url, 'facebookName'=>$facebookName, 'facebookUid'=>$facebookUid]);
	        $flcustomer->save();
	        $idflcustomer = $flcustomer->idflcustomer;
	        $result = array();
	        if(isset($idflcustomer) && $idflcustomer > 0){
	        	//$result['sheet'] = $_GoogleSheetApiCommand->handle($request, $input);
            $result = $this->createcustompost($request, $input);
		        //$result['caresoft'] = $_GoogleSheetApiCommand->create_ticket_api($request, $input);
		        //$result['sms'] = $_GoogleSheetApiCommand->sendsmsbrandname($request,$input);
	        	//$result['crm'] = $this->savecrm($request, $input);
            //$result['original'];
            $res1 = $result->original;
            if(isset($res1['error']) && $res1['error'] == 0){
                $this->sendnotify();
            }
				    return response()->json($res1);
	        }
		} catch (\Illuminate\Database\QueryException $ex) {
            $errors = new MessageBag(['error' => $ex->getMessage()]);
            return array('error'=> 1, 'message'=>$errors);
        }
		//return response()->json(['grabcall'=>'success','idflcustomer'=>$idflcustomer]);
		return array('error'=> 0,'message'=>'success','idflcustomer'=>$idflcustomer);
    }
    public function sendnotify(){
        try{
            $user = User::all();
            $result = array('error'=>0);
            $name = 'test';
            Notification::send($user , new ProductNotification($name));
          }catch (\Illuminate\Database\QueryException $ex) {
            $errors = new MessageBag(['error' => $ex->getMessage()]);
            return array('error'=> 1, 'message'=>$errors);
        }
    }
    public function savecrm(Request $request, $input){
        $_ticket = $input['data'];
        $_tenkhach = 'Ban';
        $_issms = 1;
        if(isset($_ticket['facebookName']) && !empty($_ticket['facebookName'])){
            $_tenkhach = $_ticket['facebookName'];
        }
        $_phone = $_ticket['phone'];
        $_groupid = 1715;
        $result = array();
        if(isset($_ticket['url']) && !empty($_ticket['url'])){
             $url = $_ticket['url'];
             $parse = parse_url($url);
             $result['domain'] = $parse['host'];
             $_domain = $parse['host'];
             $_domain = preg_replace('/[ ](?=[ ])|[^-_,A-Za-z0-9 ]+/', '', $_domain);
             $_domain = strtolower($_domain); 
             $_slug_domain = preg_replace('/\s+/', '-', $_domain);
             //$result['slug'] = $_slug_domain;
             try{
                    $qr_exit_slug = DB::select('call ExistURLbySlug(?)',array($_slug_domain));
                    $rs_exit_slug = json_decode(json_encode($qr_exit_slug), true);
                    if(isset($rs_exit_slug)){
                        if(isset($rs_exit_slug[0]['idgroup']) && $rs_exit_slug[0]['idgroup'] > 0){
                            $_groupid = $rs_exit_slug[0]['idgroup'];
                        }
                        return $this->callcrm($_tenkhach, $_phone, $_groupid, $_issms);   
                    }
                } catch (\Illuminate\Database\QueryException $ex) {
                    $errors = new MessageBag(['error' => $ex->getMessage()]);
                   return response()->json($errors);
                }
        }
      //return response()->json($response);
    }
    public function callcrm($_tenkhach = 'guest', $_phone = '', $_groupid = 1700, $_issms = 1){
        try{

            $_token = "a6b629a375e993ac86bd1325dbf4840xa912461b33d69200c93e377500c5e334bd";
            $_tenkhach = urlencode($_tenkhach);
            $_phone = urlencode($_phone);
            $_groupid = urlencode($_groupid);
            $url_param = 'http://api.tickfulllife.com/apiKHs/putlead?tenKH='.$_tenkhach.'&phone='.$_phone.'&groupid='.$_groupid.'&token='.$_token.'&issms='.$_issms;
            /*$url_param = 'http://api.tickfulllife.com/apiKHs/putlead?tenKH='.$_tenkhach.'&phone='.$_phone.'&groupid='.$_groupid.'&issms='.$_issms.'&token='.$_token; */
              $curl = curl_init();
              curl_setopt_array($curl, array(
                CURLOPT_URL => $url_param,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 400,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_HTTPHEADER => array(
                  'Content-Length: 0',
                  'Content-Type: application/json',
                  'Accept: application/json'
                ),
              ));
            $result = curl_exec($curl);
            curl_close($curl);
            return json_decode($result,true);
        }
        catch (\Exception $ex)
        {
            $error = $ex->getMessage();
            //return json_decode($error,true);
            return response()->json($error);
        }
    }
   
   public function createcustompost(Request $request, $input){
        $posttypes = PostType::all()->toArray();
        $_iduser = 0;
        $_idcustomer = 0;$_amount= 0; $_price=0;$_note =""; $_idstore = 225;$_axis_x=0;$_axis_y=0; $_axis_z=0; $message ="";
        $_idthumbnail = 1;$_idgallery = 2;$_description ='';$_namepro ='';$idcategory = 0; $report_more_can = '';  
        $func_global = new func_global();
        /*input*/
        $_ticket = $input['data'];
        $ip = $_ticket['ip'];
        $phone = $_ticket['phone'];
        $time = $_ticket['time'];
        $url = $_ticket['url'];
        $carrier = '';
        if(isset($_ticket['type'])){
          $carrier = $_ticket['type'];
        }
        $facebookName = '';
        if(isset($_ticket['facebookName'])){
          $facebookName = $_ticket['facebookName'];
        }
        $facebookUid = '';
        if(isset($_ticket['facebookUid'])){
          $facebookUid = $_ticket['facebookUid'];
        }
        /*end input*/
        if(isset($_ticket['url']) && !empty($_ticket['url'])){
             $url = $_ticket['url'];
             $parse = parse_url($url);
             $result['domain'] = $parse['host'];
             $_domain = $parse['host'];
             $_domain = preg_replace('/[ ](?=[ ])|[^-_,A-Za-z0-9 ]+/', '', $_domain);
             $_domain = strtolower($_domain); 
             $_slug_domain = preg_replace('/\s+/', '-', $_domain);
             //$result['slug'] = $_slug_domain;
             try{
                    $qr_exit_slug = DB::select('call getidcatebyslug(?)',array($_slug_domain));
                    $rs_exit_slug = json_decode(json_encode($qr_exit_slug), true);
                    if(isset($rs_exit_slug)){
                        $idcategory = $rs_exit_slug[0]['idcategory'];
                    }
                } catch (\Illuminate\Database\QueryException $ex) {
                    $errors = new MessageBag(['error' => $ex->getMessage()]);
                   return response()->json($errors);
                }
        }
        try {
              $_namepro = $phone;
              $title_strip = $func_global->stripVN($_namepro);
              $title_strip = preg_replace('/[ ](?=[ ])|[^-_,A-Za-z0-9 ]+/', '', $title_strip);
              $title_strip = strtolower($title_strip); 
              $_slug = preg_replace('/\s+/', '-', $title_strip);
              $_description = $url;
              $_sku_category = 0;
              $_sku_product = 0;
              $_id_post_type = 22;
              $_id_status_type = 19;
              $_price_import = 0;
              $_price = 0;
              $_short_desc = '';
              $_amount = 0;
              $_quality_sale = 0;
              $_idsize = null;
              $_idcolor = null;
              $_idcrosstype = 0;
              $_idparentcross = 0;
              $_catnametype = 'post'; $_shortname = 'import'; $_prev_id = 0;
              
              $posttype = Posttype::find($_id_post_type);
              if (isset($posttype)) {
                  $_catnametype = $posttype->nametype;
              }
              $_link = $url;
              $_feature = 0;
              $_template = '';
              $_keyword = '';
              $seo_desc = '';
              $_idyoutube = '';
              $exit_idproduct = 0;
              $qr_exit_slug = DB::select('call ExistSlugSurveyProcedure(?,?)',array($_slug,0));
              $rs_exit_slug = json_decode(json_encode($qr_exit_slug), true);
              if(isset($rs_exit_slug)){
                  $exit_idproduct = $rs_exit_slug[0]['found'];
                  if($exit_idproduct > 0){
                    $_slug = $_slug.'-'.rand(10,100);
                    $_id_post_type = 25;
                    $_idcrosstype = 6;
                    $_idparentcross = $exit_idproduct;
                  }
              }
              $product = new Products(['namepro'=> $_namepro,'sku_category'=>$_sku_category, 'sku_product'=>$_sku_product, 'slug'=> $_slug,'short_desc'=> $_short_desc,'description'=>$_description,'idsize'=>$_idsize,'idcolor'=>$_idcolor, 'id_post_type'=>$_id_post_type, 'idstatus_type'=>$_id_status_type, 'link'=>$_link, 'feature'=>$_feature, 'template'=>$_template, 'seo_desc'=>$seo_desc, 'keyword'=>$_keyword, 'idyoutube'=>$_idyoutube, 'post_author'=>$_iduser]);
              $product->save();
              $idproduct = $product->idproduct;

              $_list_idcat = "(".$idproduct.",".$idcategory.")";
              $prodbelongcate = DB::select('call ProductBelongCategoryProcedure(?)',array($_list_idcat));
              $rs_prodbelongcate = json_decode(json_encode($prodbelongcate), true);
             
              DB::select('call NothumbnailProcedure(?,?,?)',array($idproduct, 1 , 1));
              $qr_insertproduct = DB::select('call InitImportPostProcedure(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array($idproduct, $_idcustomer,$_iduser, $_idcrosstype, $_idparentcross, $_amount,$_price_import,$_price,$_quality_sale,$_note,$_axis_x,$_axis_y,$_axis_z,$_id_status_type,$_catnametype,$_idstore, $_prev_id));
              $rs_insertproduct = json_decode(json_encode($qr_insertproduct), true);
              if(isset($rs_insertproduct)){
                  $_last_id = $rs_insertproduct[0]['last_id'];
              }
			   /*insert new scan*/
			     if($exit_idproduct == 0){
      				 $_slug = $_slug.'-'.rand(10,100);
               $_id_post_type = 25;
               $_idcrosstype = 6;
               $_idparentcross = $idproduct;
      				 $product = new Products(['namepro'=> $_namepro,'sku_category'=>$_sku_category, 'sku_product'=>$_sku_product, 'slug'=> $_slug,'short_desc'=> $_short_desc,'description'=>$_description,'idsize'=>$_idsize,'idcolor'=>$_idcolor, 'id_post_type'=>$_id_post_type, 'idstatus_type'=>$_id_status_type, 'link'=>$_link, 'feature'=>$_feature, 'template'=>$_template, 'seo_desc'=>$seo_desc, 'keyword'=>$_keyword, 'idyoutube'=>$_idyoutube, 'post_author'=>$_iduser]);
      				 $product->save();
      				 $idproduct = $product->idproduct;
      				 $_list_idcat = "(".$idproduct.",".$idcategory.")";
      				 $prodbelongcate = DB::select('call ProductBelongCategoryProcedure(?)',array($_list_idcat));
      				 $rs_prodbelongcate = json_decode(json_encode($prodbelongcate), true);
      				 
      				 DB::select('call NothumbnailProcedure(?,?,?)',array($idproduct, 1 , 1));
      				 $qr_insertproduct = DB::select('call InitImportPostProcedure(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array($idproduct, $_idcustomer,$_iduser, $_idcrosstype, $_idparentcross, $_amount,$_price_import,$_price,$_quality_sale,$_note,$_axis_x,$_axis_y,$_axis_z,$_id_status_type,$_catnametype,$_idstore, $_prev_id));
      				 $rs_insertproduct = json_decode(json_encode($qr_insertproduct), true);
      				 if(isset($rs_insertproduct)){
      					  $_last_id = $rs_insertproduct[0]['last_id'];
      				 }
      				 $report_more_can = 'new scan: '.$_last_id;
    			 }
        } catch (\Illuminate\Database\QueryException $ex) {
            $errors = new MessageBag(['error' => $ex->getMessage()]);
            return response()->json(array('error'=>1,'message'=>$errors));
        }
        $message = "success ".$_list_idcat.'-'.$_id_post_type.'-'.$_id_status_type.'- last_id: '.$_last_id.'- exist: '.$exit_idproduct.' '.$report_more_can;
        return response()->json(array('error'=>0,'message'=>$message,'cate'=>$rs_prodbelongcate,'init'=>$rs_insertproduct));
    }
}
