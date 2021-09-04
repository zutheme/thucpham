<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\voipcall;
use Illuminate\Support\MessageBag;
use App\Products;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Posts;
use App\Impposts;
use App\PostType;
use App\category;
use App\status_type;
use App\func_global;

class CallVoipController extends Controller {
    public function getdatavoip(Request $request){
		return $this->createphone($request);
    	/*$input = json_decode(file_get_contents('php://input'),true);
		$_content = json_encode($input);
		if(isset($input['extend'])){
			$_extend = $input['extend'];
		}
		if(isset($input['state'])){
			$_state = $input['state'];
		}
		if(isset($input['phone'])){
			$_phone = $input['phone'];
		}
		if(isset($input['linkedid'])){
			 $_linkedid = $input['linkedid'];
		}
		if(isset($input['type'])){
			 $_type = $input['type'];
		}
		$_idproduct = 0;
	    if(isset($input)){
			$_content = json_encode($input);
			$voipcall = new voipcall(['linkedid'=> $_linkedid, 'idproduct'=> $_idproduct,'extend'=> $_extend,'state'=>$_state, 'phone'=>$_phone, 'type'=> $_type, 'content'=>$_content]);
			$voipcall->save();
			$idvoip = $voipcall->idvoip;
			$result = array('status'=>'success','idvoip'=>$idvoip,'content'=>$_content);
			return response()->json($result);
		}else{
			return response()->json(array('success'=>'chua truyen tham so'));
		}*/
    }
	public function testlog(Request $request){
		$qr_log = DB::select('call alllogProcedure()');
        $rs_log = json_decode(json_encode($qr_log),true);
		return view('teamilk.home-log',compact('rs_log'))->with('error','');
		//return response()->json($rs_log);
    }
	public function createphone(Request $request){
        
        $posttypes = PostType::all()->toArray();
        $_iduser = 36;
        $_idcustomer = 0;$_amount= 0; $_price=0;$_note =""; $_idstore = 225;$_axis_x=0;$_axis_y=0; $_axis_z=0; $message ="";
        $_idthumbnail = 1;$_idgallery = 2;$_description ='';$_namepro ='';$idcategory = 0; $report_more_can = ''; 
        $name = ''; $email = ''; $phone = ''; $address = ''; $time = ''; $sex = 0; $branch = ''; $url = ''; $note = '';
        $ip = ""; $facebookName = ""; $facebookUid = ""; $firstname = ""; $middlename = "" ; $lastname ="";
        $func_global = new func_global();
        $input = json_decode(file_get_contents('php://input'),true);
		$_extend = 562;
		if(isset($input['extend'])){
			$_extend = $input['extend'];
		}
		$state = '';
		if(isset($input['state'])){
			$state = $input['state'];
		}
		$_linkedid = '';
		if(isset($input['linkedid'])){
			$_linkedid = $input['linkedid'];
		}
		$_phone = '';
		if(isset($input['phone'])){
			$_phone = $input['phone'];
		}
		$_iddirect = 1;
		$type = 'inbound';
		if(isset($input['type'])){
			 $type = $input['type'];
		}
		if($type == 'outbound'){
			$_iddirect = 2;
		}
		
		$_id_status_type = 13;
		if($state =='Cdr'){
			$datacdr = $input['cdr'];
			if($_iddirect == 2){
				$phone = $datacdr['destination'];
			}else{
				$phone = $datacdr['source'];
			}
			$statusphone = $datacdr['disposition'];
			switch ($statusphone) {
			  case "NO ANSWER":
				$_id_status_type = 13;
				break;
			  case "ANSWERED":
				$_id_status_type = 12;
				break;
		      case "BUSY":
				$_id_status_type = 25;
				break;
			  default:
				$_id_status_type = 13;
			}
		}else{
			$phone = $input['phone'];
			$_id_status_type = 24;
			switch ($state) {
			  case "Hangup":
				$_id_status_type = 21;
				break;
			  case "Up":
				$_id_status_type = 22;
				break;
			  case "Ring":
				$_id_status_type = 23;
				break;
			  default:
				$_id_status_type = 24;
			}
		}
		
		if(isset($input['linkedid'])){
			 $linkedid = $input['linkedid'];
		}
		$lphone = strlen($phone);
		if($lphone < 10){
			$phone = '0'.$phone;
		}else{
			$regEx = '/(0[1-9])+([0-9]{8})$/';
			preg_match_all($regEx, $phone, $matches);
			if(!isset($matches)||!isset($phone)) return response()->json(array('error'=>1,'message'=>'no number phone'));
			//$phone = $matches[0];
			$phone = implode("|",$matches[0]);
		}
		//return response()->json(array('error'=>1,'message'=>$phone));
        try {
			  if($idcategory == 0){
				 $idcategory = 251;
			  }
              $_description = $url;
              $_sku_category = 0;
              $_sku_product = 0;
              $_id_post_type = 4;
              $_price_import = 0;
              $_price = 0;
              $_short_desc = '';
              $_amount = 0;
              $_quality_sale = 0;
              $_idsize = null;
              $_idcolor = null;
              $_idcrosstype = 0;
              $_idparentcross = 0;
              $_catnametype = 'post';  $_prev_id = 0;
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
              $qr_exit_slug = DB::select('call randomslugprocedure()');
              $rs_exit_slug = json_decode(json_encode($qr_exit_slug));
              if(isset($rs_exit_slug)){
                 foreach ($rs_exit_slug as $row) {
                      $_slug = $row->slug;
                      $_namepro = $_slug;
                  } 
              }
              $qr_idclient = DB::select('call ExistsClientProcedure(?)',array($phone));
              $rs_idclient = json_decode(json_encode($qr_idclient));
              $report_more_can = '';
              $idclient = 0;
			  
              if(isset($rs_idclient)){
                  foreach ($rs_idclient as $row) {
                      $idclient = $row->idclient;
                      $_idparentcross = $row->idparentcross;
                      if($_idparentcross > 0){
                        /*exist product*/
                        $_id_post_type = 4;
                        $_idcrosstype = 6;
						$_idstatusprocess = 7;
						$qr_exist_voicecall = DB::select('call ExistVoiceCallBylinkedidProcedure(?)', array($_linkedid));
                        $rs_exist_voicecall = json_decode(json_encode($qr_exist_voicecall));
						$voip_idproduct = 0;
						if(isset($rs_exist_voicecall)){
						  foreach ($rs_exist_voicecall as $row) {
							  $voip_idproduct = $row->idproduct;
							}
						 }
						if($voip_idproduct > 0){
							/*insert voip*/
							$_content = json_encode($input);
							$voipcall = new voipcall(['linkedid'=> $_linkedid, 'idproduct'=>$voip_idproduct,'extend'=> $_extend,'state'=>$state, 'phone'=>$phone, 'type'=> $type, 'content'=>$_content]);
							$voipcall->save();
							$idvoip = $voipcall->idvoip;
							/*end voip*/
							/*update voip*/
							$qr_updatevoiceCall = DB::select('call UpdateProductVoiceCallProcedure(?,?,?)', array($voip_idproduct , $idvoip, $_id_status_type));
							$rs_updatevoiceCall = json_decode(json_encode($qr_updatevoiceCall), true);
							$report_more_can = 'exist voip_idproduct'.$voip_idproduct;
						}else{
							$product = new Products(['namepro'=> $_namepro,'sku_category'=>$_sku_category, 'sku_product'=>$_sku_product, 'slug'=> $_slug,'short_desc'=> $_short_desc,'description'=>$_description,'idsize'=>$_idsize,'idcolor'=>$_idcolor, 'id_post_type'=>$_id_post_type, 'idstatus_type'=>$_id_status_type, 'link'=>$_link, 'feature'=>$_feature, 'template'=>$_template, 'seo_desc'=>$seo_desc, 'keyword'=>$_keyword, 'idyoutube'=>$_idyoutube, 'post_author'=>$_iduser, 'idstatusprocess'=>$_idstatusprocess, 'iddirect'=>$_iddirect]);
							$product->save();
							$idproduct = $product->idproduct;
							$_list_idcat = "(".$idproduct.",".$idcategory.")";
							$prodbelongcate = DB::select('call ProductBelongCategoryProcedure(?)',array($_list_idcat));
							$rs_prodbelongcate = json_decode(json_encode($prodbelongcate), true);
							DB::select('call NothumbnailProcedure(?,?,?)',array($idproduct, 1 , 1));
							$qr_insertproduct = DB::select('call InitImportCustomPostProcedure(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array($idproduct, $_idcustomer, $_iduser, $_idcrosstype, $_idparentcross, $_amount, $_price_import, $_price, $_quality_sale, $_note, $_idstore, $_axis_x, $_axis_y, $_axis_z, $_id_status_type, $_catnametype, $_prev_id, $idclient));
							$rs_insertproduct = json_decode(json_encode($qr_insertproduct), true);
							if(isset($rs_insertproduct)){
								$_last_id = $rs_insertproduct[0]['last_id'];
							}
							/*insert voip*/
							$_content = json_encode($input);
							$voipcall = new voipcall(['linkedid'=> $_linkedid, 'idproduct'=>$idproduct,'extend'=> $_extend,'state'=>$state, 'phone'=>$phone, 'type'=> $type, 'content'=>$_content]);
							$voipcall->save();
							$idvoip = $voipcall->idvoip;
							/*end voip*/
							/*update voip*/
							$qr_updatevoiceCall = DB::select('call UpdateProductVoiceCallProcedure(?,?,?)', array($idproduct , $idvoip, $_id_status_type));
							$rs_updatevoiceCall = json_decode(json_encode($qr_updatevoiceCall), true);
							$report_more_can = 'new call'.$idproduct;
						}
						/*end exist product*/
					  }else{
                         $_idcrosstype = 0;
                        /*create new*/
                         $_slug = $_slug.'-'.rand(10,100);
                         $_id_post_type = 22;
                         $_idparentcross = 0;
						 $_idstatusprocess = 7;
						 //$_id_status_type = 19;
                         $product = new Products(['namepro'=> $_namepro,'sku_category'=>$_sku_category, 'sku_product'=>$_sku_product, 'slug'=> $_slug,'short_desc'=> $_short_desc,'description'=>$_description,'idsize'=>$_idsize,'idcolor'=>$_idcolor, 'id_post_type'=>$_id_post_type, 'idstatus_type'=>$_id_status_type, 'link'=>$_link, 'feature'=>$_feature, 'template'=>$_template, 'seo_desc'=>$seo_desc, 'keyword'=>$_keyword, 'idyoutube'=>$_idyoutube, 'post_author'=>$_iduser, 'idstatusprocess'=>$_idstatusprocess, 'iddirect'=>$_iddirect]);
                         $product->save();
                         $idproduct = $product->idproduct;
                         if($idproduct > 0){
                             $qr_idclient = DB::select('call NewClientProcedure(?,?,?,?,?,?,?,?,?,?)',array($firstname, $middlename, $lastname, $phone, $email, $address, $sex, $facebookName, $facebookUid, $idproduct));
                             $rs_idclient = json_decode(json_encode($qr_idclient));
                             $idclient = 0;
                              if(isset($rs_idclient)){
                                  foreach ($rs_idclient as $row) {
                                      $idclient = $row->idclient;
                                      $_idparentcross = $row->idparentcross;
                                  }
                              }
                             $_list_idcat = "(".$idproduct.",".$idcategory.")";
                             $prodbelongcate = DB::select('call ProductBelongCategoryProcedure(?)',array($_list_idcat));
                             $rs_prodbelongcate = json_decode(json_encode($prodbelongcate), true);
                             
                             DB::select('call NothumbnailProcedure(?,?,?)',array($idproduct, 1 , 1));

                             $qr_insertproduct = DB::select('call InitImportCustomPostProcedure(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array($idproduct, $_idcustomer, $_iduser, $_idcrosstype, $_idparentcross, $_amount, $_price_import, $_price, $_quality_sale, $_note, $_idstore, $_axis_x, $_axis_y, $_axis_z, $_id_status_type, $_catnametype, $_prev_id, $idclient));
                             $rs_insertproduct = json_decode(json_encode($qr_insertproduct), true);
                             
                             if(isset($rs_insertproduct)){
                                $_last_id = $rs_insertproduct[0]['last_id'];
                             }
                            /*end create new*/
                            /*insert timeline*/
                             $_idcrosstype = 6;
                             $_id_post_type = 4;
                             $_slug = $_slug.'-'.rand(10,100);
                             $_idparentcross = $idproduct;

                             $product = new Products(['namepro'=> $_namepro,'sku_category'=>$_sku_category, 'sku_product'=>$_sku_product, 'slug'=> $_slug,'short_desc'=> $_short_desc,'description'=>$_description,'idsize'=>$_idsize,'idcolor'=>$_idcolor, 'id_post_type'=>$_id_post_type, 'idstatus_type'=>$_id_status_type, 'link'=>$_link, 'feature'=>$_feature, 'template'=>$_template, 'seo_desc'=>$seo_desc, 'keyword'=>$_keyword, 'idyoutube'=>$_idyoutube, 'post_author'=>$_iduser]);
                             $product->save();
                             $idproduct = $product->idproduct;
                             $_list_idcat = "(".$idproduct.",".$idcategory.")";
                             $prodbelongcate = DB::select('call ProductBelongCategoryProcedure(?)',array($_list_idcat));
                             $rs_prodbelongcate = json_decode(json_encode($prodbelongcate), true);
                             
                             DB::select('call NothumbnailProcedure(?,?,?)',array($idproduct, 1 , 1));

                             $qr_insertproduct = DB::select('call InitImportCustomPostProcedure(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array($idproduct, $_idcustomer, $_iduser, $_idcrosstype, $_idparentcross, $_amount, $_price_import, $_price, $_quality_sale, $_note, $_idstore, $_axis_x, $_axis_y, $_axis_z, $_id_status_type, $_catnametype, $_prev_id, $idclient));
                             if(isset($rs_insertproduct)){
                                $_last_id = $rs_insertproduct[0]['last_id'];
                             }
							  /*insert voip*/
							$_content = json_encode($input);
							$voipcall = new voipcall(['linkedid'=> $_linkedid, 'idproduct'=> $idproduct,'extend'=> $_extend,'state'=>$state, 'phone'=>$_phone, 'type'=> $type, 'content'=>$_content]);
							$voipcall->save();
							$idvoip = $voipcall->idvoip;
							/*update*/
							/*update voip*/
							$qr_updatevoiceCall = DB::select('call UpdateProductVoiceCallProcedure(?,?)', array($idproduct , $idvoip));
							$rs_updatevoiceCall = json_decode(json_encode($qr_updateVoiceCall), true);
                            $report_more_can = 'new scan: '.$_last_id.', new client:'.$idclient.',idproduct:'.$idproduct.', idparentcross:'.$_idparentcross.', type:'.$type.', iddirect:'.$_iddirect;
                            /*end insert timeline*/
                        }
						return response()->json(array('error'=>0,'message'=>$report_more_can));
                      }
                      
                  }  
              }
    
        } catch (\Illuminate\Database\QueryException $ex) {
            $errors = new MessageBag(['error' => $ex->getMessage()]);
            return response()->json(array('error'=>1,'message'=>$errors));
            //return false;
        }
        $message = $report_more_can;
        return response()->json(array('error'=>0,'message'=>$message));
    }
}