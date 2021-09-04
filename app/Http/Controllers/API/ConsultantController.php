<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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

class ConsultantController extends Controller
{
   public function createconsultant(Request $request){
        
        $posttypes = PostType::all()->toArray();
        $_iduser = 36;
        $_idcustomer = 0;$_amount= 0; $_price=0;$_note =""; $_idstore = 225;$_axis_x=0;$_axis_y=0; $_axis_z=0; $message ="";
        $_idthumbnail = 1;$_idgallery = 2;$_description ='';$_namepro ='';$idcategory = 0; $report_more_can = ''; 
        $name = ''; $email = ''; $phone = ''; $address = ''; $time = ''; $sex = 0; $branch = ''; $url = ''; $note = '';
        $ip = ""; $type = ""; $facebookName = ""; $facebookUid = ""; $firstname = ""; $middlename = "" ; $lastname ="";
        $func_global = new func_global();
        $input = json_decode(file_get_contents('php://input'),true);
        //$_option = $input['option'];
        $_ticket = $input['data'];
        if(isset($_ticket['name'])){
          $firstname = $_ticket['name'];
        }
        if(isset($_ticket['email'])){
          $email = $_ticket['email'];
        }
        if(isset($_ticket['phone'])){
          $phone = $_ticket['phone'];
        }
        if(isset($_ticket['address'])){
          $address = $_ticket['address'];
        }
        if(isset($_ticket['time'])){
          $time = $_ticket['time'];
        }
        if(isset($_ticket['sex']) && !empty($_ticket['sex'])){
          $sex = $_ticket['sex'];
        } 
        if(isset($_ticket['branch'])){
          $branch = $_ticket['branch'];
        }
        if(isset($_ticket['note'])){
          $note = $_ticket['note'];
        }
        if(isset($_ticket['ip'])){
          $ip = $_ticket['ip'];
        }
        if(isset($_ticket['type'])){
          $type = $_ticket['type'];
        }
        if(isset($_ticket['facebookName'])){
          $facebookName = $_ticket['facebookName'];
        }
        if(isset($_ticket['facebookUid'])){
          $facebookUid = $_ticket['facebookUid'];
        }
        /*end input*/
        if(isset($_ticket['url']) && !empty($_ticket['url'])){
             $url = $_ticket['url'];
             $parse = parse_url($url);
             $_domain = $parse['host'];
             $_domain = preg_replace('/[ ](?=[ ])|[^-_,A-Za-z0-9 ]+/', '', $_domain);
             $_domain = strtolower($_domain); 
             $_slug_domain = preg_replace('/\s+/', '-', $_domain);
             try{
                    $qr_exit_slug = DB::select('call getidcatebyslug(?)',array($_slug_domain));
                    $rs_exit_slug = json_decode(json_encode($qr_exit_slug));
          
                    if(isset($rs_exit_slug)){
            
            foreach ($rs_exit_slug as $item){
              $idcategory = $item->idcategory;
            }
                    }
          
                } catch (\Illuminate\Database\QueryException $ex) {
                    $errors = new MessageBag(['error' => $ex->getMessage()]);
                   return response()->json(array('error'=>1,'message'=>$errors));
                }
        }
    
        try {
        
        if($idcategory == 0){
          $idcategory = 251;
        }
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
              //$qr_idclient = DB::select('call NewClientProcedure(?,?,?,?,?,?,?,?,?,?)',array($firstname, $middle, $lastname, $phone, $email, $address, $sex, $facebookName, $facebookUid, $idproduct));
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
                        if(isset($_ticket['idposttype'])){
                            $_id_post_type = $_ticket['idposttype'];
                        }else{
                            $_id_post_type = 25;
                        }
                        $_idcrosstype = 6;
						 $_idstatusprocess = 7; $_iddirect = 1;
                        $product = new Products(['namepro'=> $_namepro,'sku_category'=>$_sku_category, 'sku_product'=>$_sku_product, 'slug'=> $_slug,'short_desc'=> $_short_desc,'description'=>$_description,'idsize'=>$_idsize,'idcolor'=>$_idcolor, 'id_post_type'=>$_id_post_type, 'idstatus_type'=>$_id_status_type, 'link'=>$_link, 'feature'=>$_feature, 'template'=>$_template, 'seo_desc'=>$seo_desc, 'keyword'=>$_keyword, 'idyoutube'=>$_idyoutube, 'post_author'=>$_iduser, 'idstatusprocess'=>$_idstatusprocess, 'iddirect'=>$_iddirect] );
                        
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
                        /*end exist product*/
                      }else{
                         $_idcrosstype = 0;
                        /*create new*/
                         $_slug = $_slug.'-'.rand(10,100);
                         $_id_post_type = 22;
                         $_idparentcross = 0;
						 $_idstatusprocess = 7; $_iddirect = 1;
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
                             if(isset($_ticket['idposttype'])){
                                $_id_post_type = $_ticket['idposttype'];
                            }else{
                                $_id_post_type = 25;
                            }
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
                             $report_more_can = 'new scan: '.$_last_id.', new client:'.$idclient.',idproduct:'.$idproduct;
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
        $message = "success ".$_list_idcat.'-'.$_id_post_type.'-'.$_id_status_type.'- last_id: '.$_last_id.', '.$report_more_can;
        return response()->json(array('error'=>0,'message'=>$message));
    }
}
