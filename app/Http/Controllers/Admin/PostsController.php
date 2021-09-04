<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Products;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Posts;
use App\Impposts;
use App\PostType;
use App\category;
use App\status_type;
use App\files;
use App\size;
use App\color;
use File;
use App\func_global;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $main_menu ='';
    public $main_tag = '';
    public function index(Request $request)
    {
       try {
            $_filter = $request->get('filter');
            $_start_date = session()->get('start_date');
            $_end_date = session()->get('end_date');
            if(!isset($_start_date)){
                $_start_date = date('Y-m-d H:i:s',strtotime("-360 days"));
                $request->session()->put('start_date', $_start_date); 
            }
            if(!isset($_end_date)){
                $_end_date = date('Y-m-d H:i:s',strtotime("1 days"));
                $request->session()->put('end_date', $_end_date);
            }  
            $_idstore = $request->get('idstore');
            //$_idcategory = $request->get('idcategory');
            $posttype = $request->get('posttype');
            $_id_post_type = $request->get('sel_id_post_type');
            if(!isset($_id_post_type)) {
               $_id_post_type = 3;
             }
            $_id_status_type = $request->get('sel_id_status');
            //$request->session()->put('idcategory', $_idcategory);
            $request->session()->put('idstore', $_idstore);
            $request->session()->put('id_post_type', $_id_post_type);
            //$request->session()->forget('filter');
            if(!isset($_idstore)){
                $_idstore = 31;
                session()->put('idstore',  $_idstore);
            }
            $qr_category = DB::select('call ListParentCatByTypeProcedure(?)',array('post'));
            $categories = json_decode(json_encode($qr_category), true);
            $list_checks = $request->input('list_check');
            $_idcategory = 0;
            $_list_idcat ='';
            if($list_checks){
                foreach ($list_checks as $item) {
                  //$iditem = explode("-",$item);
                  $idcategory = $item;
                  $_list_idcat .= "(".$idcategory."),";
                }
                $_list_idcat = rtrim($_list_idcat,", ");
            }else{
                foreach ($categories as $key => $item) { 
                     $_list_idcat .= "(".$item['idcategory']."),";
                  }
                 $_list_idcat = rtrim($_list_idcat,", ");
            }   
            // if(!isset($_idcategory)){
            //     $_idcategory=0;
            //     session()->put('idcategory',  $_idcategory);
            // }
            if(!isset($_id_post_type)){
                $_id_post_type=3;
                session()->put('id_post_type',  $_id_post_type);
            }
            if(!isset($_id_status_type)){
                $_id_status_type=4;
                session()->put('id_status_type',  $_id_status_type);
            }
            $statustypes = status_type::all()->toArray();
            $post_types = PostType::all()->toArray();
            //$qr_category = DB::select('call ListParentCatByTypeProcedure(?)',array('post'));
           // $categories = json_decode(json_encode($qr_category), true);
            $errors = $_start_date.',end_date'.$_end_date.', list_idcat:'.$_list_idcat.',id_post_type:'.$_id_post_type.',id_status_type'.$_id_status_type;
            //$result = DB::select('call ListAllProductProcedure(?,?,?,?,?,?)',array($_start_date,$_end_date, $_idcategory, $_id_post_type, $_id_status_type,$_idstore));
             $result = DB::select('call ReportProductProcedure(?,?,?,?,?,?)',array('', $_id_post_type, $_id_status_type, $_idstore, $_start_date, $_end_date));
            $products = json_decode(json_encode($result), true);     
            return view('admin.post.index',compact('products','errors','post_types','categories'))->with('error',$errors);

        } catch (\Illuminate\Database\QueryException $ex) {
            $errors = new MessageBag(['error' => $ex->getMessage()]);
            return redirect()->route('admin.post.index')->with('error',$errors);
        }
    }
    public function listpostbytype(Request $request, $posttype)
    {
         try {
            $_filter = $request->get('filter');
            $_start_date = $request->get('_start_date');
            $_end_date = $request->get('_end_date');
            if(!isset($_start_date)){
                $_start_date = date('Y-m-d H:i:s',strtotime("-360 days"));
            }
            $request->session()->put('start_date', $_start_date);
            if(!isset($_end_date)){
                $_end_date = date('Y-m-d H:i:s',strtotime("1 days"));
            }
            $request->session()->put('end_date', $_end_date);  
            
            //$_idcategory = $request->get('idcategory');
            $_id_post_type = $request->get('sel_id_post_type');
            if(!isset($_id_post_type)){
                 $qr_posttype = DB::select('call findidposttypebynameProcedure(?)',array($posttype));
                 $rs_idposttype = json_decode(json_encode($qr_posttype), true);
                 $_id_post_type = $rs_idposttype[0]['idposttype'];
            }else{
                $qr_posttype = DB::select('call getposttypebyid(?)',array($_id_post_type));
                $rs_idposttype = json_decode(json_encode($qr_posttype), true);
                $posttype = $rs_idposttype[0]['posttype'];
            }
            $_idstore = $request->get('sel_id_store');
            if(!isset($_idstore)||$_idstore==0){
                if($_id_post_type==22){
                    $_idstore = 225;
                }else{
                    $_idstore = 31;
                } 
            }
            $_id_status_type = $request->get('sel_id_status');
             if(!isset($_id_status_type)) {
                if ($_id_post_type==22){
                     $_id_status_type = 19;
                }else{
					$_id_status_type = 4;
				}
             }
             /*check tag*/
             $lst_tag = '';
             $input_tag = $request->input('tag_check');
             if(isset($input_tag)){
                foreach ($input_tag as $value) {
                     $lst_tag .= "(".$value."),";
                 }
             }
             $lst_tag = rtrim($lst_tag,", ");
             /*end check tag*/
            //$request->session()->put('idcategory', $_idcategory);
            $request->session()->put('idstore', $_idstore);
            $request->session()->put('id_post_type', $_id_post_type);
            $request->session()->put('id_status_type', $_id_status_type);
            //$request->session()->forget('filter');
            
            $qr_category = DB::select('call ListParentCatByIdcatetypeProcedure(?)',array($_id_post_type));
            $categories = json_decode(json_encode($qr_category), true);

            $qr_all_category = DB::select('call LstallCatbycatetypeProcedure(?)',array($posttype));
            $rs_all_category = json_decode(json_encode($qr_all_category), true);

            $qr_status = DB::select('call LstParentStatusProcedure()');
            $statustypes = json_decode(json_encode($qr_status), true);

            $list_checks = $request->input('list_check');
            $_idcategory = 0;
            $_list_idcat ='';
            if(isset($list_checks)){
                foreach ($list_checks as $item) {
                  $idcategory = $item;
                  $_list_idcat .= "(".$idcategory."),";
                }
                $_list_idcat = rtrim($_list_idcat,", ");
            }else{
                foreach ($rs_all_category as $key => $item) { 
                    $_list_idcat .= "(".$item['idcategory']."),";
                 }
                 $_list_idcat = rtrim($_list_idcat,", ");
            }   
            $request->session()->put('list_idcat', $_list_idcat);
            $qr_status = DB::select('call ListStatusbyIdposttype(?)', array($_id_post_type));
            $statustypes = json_decode(json_encode($qr_status), true);

            $qr_store = DB::select('call ListParentStoreByTypeProcedure(?,?)',array('store', $posttype));
            $rs_store = json_decode(json_encode($qr_store), true);

            $post_types = PostType::all()->toArray();
            $errors = 'start_date: '.$_start_date.', end_date:'.$_end_date.', list_idcat:'.$_list_idcat.', id_post_type:'.$_id_post_type.', id_status_type:'.$_id_status_type.', _idstore:'.$_idstore.', tag: '.$lst_tag;
           
            if ($_id_post_type == 22){
                $result = DB::select('call ReportSurveyTagProcedure(?,?,?,?,?,?,?)',array($_list_idcat, $_id_post_type, $_id_status_type, $_idstore, $_start_date, $_end_date, $lst_tag));
                $products = json_decode(json_encode($result), true);
            }elseif($_id_post_type == 5 || $_id_post_type == 6 || $_id_post_type == 7 || $_id_post_type == 23 || $_id_post_type == 1){
				$result = DB::select('call ReportCustompPostlatestProcedure(?,?,?,?,?,?,?)',array($_list_idcat, $_id_post_type, $_id_status_type, $_idstore, $_start_date, $_end_date, $lst_tag));
                $products = json_decode(json_encode($result), true);	
			}elseif($_id_post_type == 4){
				$result = DB::select('call ReportCustompPhonelatestProcedure(?,?,?,?,?,?,?)',array($_list_idcat, $_id_post_type, $_id_status_type, $_idstore, $_start_date, $_end_date, $lst_tag));
                $products = json_decode(json_encode($result),true);
			}else{
                 $result = DB::select('call ReportProductProcedure(?,?,?,?,?,?)',array($_list_idcat, $_id_post_type, $_id_status_type, $_idstore, $_start_date, $_end_date));
                 $products = json_decode(json_encode($result), true);
            }
    
            $qr_parent_cate = DB::select('call ListParentCatByTypeProcedure(?)',array($posttype));
            $parent_cate = json_decode(json_encode($qr_parent_cate), true);

            $str = $this->ListAllCateByTypeId($posttype,0);
            if($posttype=='post'){
            $qr_cross_type = DB::select('call SelCrossTypeProcedure');
            $sel_cross_type = json_decode(json_encode($qr_cross_type), true);
            }elseif($posttype=='survey'){
                $qr_cross_type = DB::select('call SelPostTypeProcedure(?)',array(4));
                $sel_cross_type = json_decode(json_encode($qr_cross_type), true);
            }else{
                $qr_cross_type = DB::select('call SelCrossTypeProcedure');
                $sel_cross_type = json_decode(json_encode($qr_cross_type), true);
            }
            /*tag*/
            $cate_selected[0]['idcategory'] = 0;
            $str_tag = $this->all_category('tag',$cate_selected );
            $qr_catetag = DB::select('call ListParentCatByTypeProcedure(?)',array('tag'));
            $rs_catetag = json_decode(json_encode($qr_catetag), true);
            /*end tag*/
            return view('admin.post.index',compact('rs_catetag','products','errors','post_types','categories','posttype','_id_post_type','statustypes','rs_store','sel_cross_type'))->with('error',$errors);
        } catch (\Illuminate\Database\QueryException $ex) {
            $errors = new MessageBag(['error' => $ex->getMessage()]);
            return redirect()->route('admin.post.index')->with('error',$errors);
        }
    }
	public function latestpostbytype(Request $request, $posttype)
    {
         try {
            $_filter = $request->get('filter');
            $_start_date = $request->get('_start_date');
            $_end_date = $request->get('_end_date');
            if(!isset($_start_date)){
                //$_start_date = date('Y-m-d H:i:s',strtotime("-360 days"));
				$_start_date = date('Y-m-d H:i',strtotime("-360 days"));
            }
            $request->session()->put('start_date', $_start_date);
            if(!isset($_end_date)){
                //$_end_date = date('Y-m-d H:i:s',strtotime("1 days"));
				$_end_date = date('Y-m-d H:i',strtotime("1 days"));
            }
            $request->session()->put('end_date', $_end_date);  
            $_id_post_type = $request->get('sel_id_post_type');
            if(!isset($_id_post_type)){
				if(isset($posttype)){
					$qr_posttype = DB::select('call findidposttypebynameProcedure(?)',array($posttype));
					$rs_idposttype = json_decode(json_encode($qr_posttype), true);
					$_id_post_type = $rs_idposttype[0]['idposttype'];
				}else{
					$_id_post_type = 22;
				}
            }else{
                $qr_posttype = DB::select('call getposttypebyid(?)',array($_id_post_type));
                $rs_idposttype = json_decode(json_encode($qr_posttype), true);
                $posttype = $rs_idposttype[0]['posttype'];
            }
            $_idstore = $request->get('sel_id_store');
            if(!isset($_idstore)||$_idstore==0){
                if($_id_post_type == 28 ||$_id_post_type == 27 || $_id_post_type == 4 || $_id_post_type == 5 || $_id_post_type == 6 || $_id_post_type == 7 || $_id_post_type == 23 || $_id_post_type == 1){
                    $_idstore = 225;
                }else{
                    $_idstore = 31;
                } 
            }
            $_id_status_type = $request->get('sel_id_status');
             if(!isset($_id_status_type)||$_id_status_type == 0) {
                if($_id_post_type == 3||$_id_post_type == 10||$_id_post_type == 12){
                    $_id_status_type = 4;
                }elseif($_id_post_type == 27 || $_id_post_type == 4 || $_id_post_type == 5 || $_id_post_type == 6 || $_id_post_type == 7 || $_id_post_type == 23 || $_id_post_type == 1){
                     $_id_status_type = 19;
                }
             }
			 $_id_status_type1 = $_id_status_type;
			 $_idstatusprocess = $request->get('sel_statusprocess');
			 if(!isset($_idstatusprocess)){
				 $_idstatusprocess = 7;
			 }
             /*check tag*/
             $lst_tag = '';
             $input_tag = $request->input('tag_check');
             if(isset($input_tag)){
                foreach ($input_tag as $value) {
                     $lst_tag .= "(".$value."),";
                 }
             }
             $lst_tag = rtrim($lst_tag,", ");
             /*end check tag*/
            $request->session()->put('idstore', $_idstore);
            $request->session()->put('id_post_type', $_id_post_type);
            $request->session()->put('id_status_type', $_id_status_type);
 
			if($_id_post_type == 28 || $_id_post_type == 27 || $_id_post_type == 4 || $_id_post_type == 5 || $_id_post_type == 6 || $_id_post_type == 7 || $_id_post_type == 23 || $_id_post_type == 1){
				$qr_category = DB::select('call ListParentCatByIdcatetypeProcedure(?)',array(22));
				$categories = json_decode(json_encode($qr_category), true);
			}else{
				$qr_category = DB::select('call ListParentCatByIdcatetypeProcedure(?)',array($_id_post_type));
				$categories = json_decode(json_encode($qr_category), true);
			}
  
            $qr_all_category = DB::select('call LstallCatbycatetypeProcedure(?)',array($posttype));
            $rs_all_category = json_decode(json_encode($qr_all_category), true);

            //$qr_status = DB::select('call LstParentStatusProcedure()');
            //$statustypes = json_decode(json_encode($qr_status), true);
			
			$qr_status_process = DB::select('call StatusProcessbyIdgroup(?)', array('1'));
			$rs_status_process = json_decode(json_encode($qr_status_process), true);

            $list_checks = $request->input('list_check');
            $_idcategory = 0;
            $_list_idcat ='';
            if(isset($list_checks)){
                foreach ($list_checks as $item) {
                  $idcategory = $item;
                  $_list_idcat .= "(".$idcategory."),";
                }
                $_list_idcat = rtrim($_list_idcat,", ");
            }else{
                foreach ($rs_all_category as $key => $item) { 
                    $_list_idcat .= "(".$item['idcategory']."),";
                 }
                 $_list_idcat = rtrim($_list_idcat,", ");
            }   
            $request->session()->put('list_idcat', $_list_idcat);
			
			if($_id_post_type == 10 ){
				$qr_status = DB::select('call ListStatusbyIdposttype(?)', array(3));
				$statustypes = json_decode(json_encode($qr_status), true);
			}else{
				$qr_status = DB::select('call ListStatusbyIdposttype(?)', array($_id_post_type));
				$statustypes = json_decode(json_encode($qr_status), true);
			}
            $qr_store = DB::select('call ListParentStoreByTypeProcedure(?,?)',array('store', $posttype));
            $rs_store = json_decode(json_encode($qr_store), true);
            $post_types = PostType::all()->toArray();
            $errors = 'start_date: '.$_start_date.', end_date:'.$_end_date.', list_idcat:'.$_list_idcat.', id_post_type:'.$_id_post_type.', id_status_type:'.$_id_status_type.', _idstore:'.$_idstore.', tag: '.$lst_tag.', idstatusprocess:'.$_idstatusprocess.', id_status_type:'.$_id_status_type;
			if ($_id_post_type == 22){
                $result = DB::select('call ReportSurveyTagProcedure(?,?,?,?,?,?,?)',array($_list_idcat, $_id_post_type, $_id_status_type, $_idstore, $_start_date, $_end_date, $lst_tag));
                $products = json_decode(json_encode($result), true);
            }elseif($_id_post_type == 27 || $_id_post_type == 5 || $_id_post_type == 6 || $_id_post_type == 7 || $_id_post_type == 23 || $_id_post_type == 1){
				//$result = DB::select('call ReportCustompPostlatestProcedure(?,?,?,?,?,?,?)',array($_list_idcat, $_id_post_type, $_id_status_type, $_idstore, $_start_date, $_end_date, $lst_tag));
				$result = DB::select('call ReportCustompPostLatestStatusProcedure(?,?,?,?,?,?,?,?,?)',array($_list_idcat, $_id_post_type, $_id_status_type, $_idstore, $_start_date, $_end_date, $lst_tag, $_idstatusprocess, $_id_status_type));
				$products = json_decode(json_encode($result), true);	
			}elseif($_id_post_type == 4){
				$result = DB::select('call ReportCustompPhonelatestProcedure(?,?,?,?,?,?,?)',array($_list_idcat, $_id_post_type, $_id_status_type, $_idstore, $_start_date, $_end_date, $lst_tag));
                $products = json_decode(json_encode($result),true);
			}
			elseif($_id_post_type == 28){
				$result = DB::select('call ReportCustompPhonelatestProcedure(?,?,?,?,?,?,?)',array($_list_idcat, $_id_post_type, $_id_status_type, $_idstore, $_start_date, $_end_date, $lst_tag));
                $products = json_decode(json_encode($result),true);
			}
			else{
                 $result = DB::select('call ReportProductProcedure(?,?,?,?,?,?)',array($_list_idcat, $_id_post_type, $_id_status_type, $_idstore, $_start_date, $_end_date));
                 $products = json_decode(json_encode($result), true);
            }
    
            $qr_parent_cate = DB::select('call ListParentCatByTypeProcedure(?)',array($posttype));
            $parent_cate = json_decode(json_encode($qr_parent_cate), true);

            $str = $this->ListAllCateByTypeId($posttype,0);
            if($posttype=='post'){
            $qr_cross_type = DB::select('call SelCrossTypeProcedure');
            $sel_cross_type = json_decode(json_encode($qr_cross_type), true);
            }elseif($posttype=='survey'){
                $qr_cross_type = DB::select('call SelPostTypeProcedure(?)',array(4));
                $sel_cross_type = json_decode(json_encode($qr_cross_type), true);
            }else{
                $qr_cross_type = DB::select('call SelCrossTypeProcedure');
                $sel_cross_type = json_decode(json_encode($qr_cross_type), true);
            }
            /*tag*/
            $cate_selected[0]['idcategory'] = 0;
            $str_tag = $this->all_category('tag',$cate_selected );
            $qr_catetag = DB::select('call ListParentCatByTypeProcedure(?)',array('tag'));
            $rs_catetag = json_decode(json_encode($qr_catetag), true);
            /*end tag*/
            return view('admin.post.index',compact('rs_status_process','rs_catetag','products','errors','post_types','categories','posttype','_id_post_type','statustypes','rs_store','sel_cross_type'))->with('error',$errors);
        } catch (\Illuminate\Database\QueryException $ex) {
            $errors = new MessageBag(['error' => $ex->getMessage()]);
            return redirect()->route('admin.post.index')->with('error',$errors);
        }
    }
    public function listpost(Request $request, $posttype)
    {
        
            $_filter = $request->get('filter');
            $_start_date = session()->get('start_date');
            $_end_date = session()->get('end_date');
            if(!isset($_start_date)){
                $_start_date = date('Y-m-d H:i:s',strtotime("-360 days"));
                $request->session()->put('start_date', $_start_date); 
            }
            if(!isset($_end_date)){
                $_end_date = date('Y-m-d H:i:s',strtotime("1 days"));
                $request->session()->put('end_date', $_end_date);
            }  
            $_idstore = $request->get('idstore');
            //$_idcategory = $request->get('idcategory');
            //$posttype = $request->get('posttype');
            $_id_post_type = $request->get('sel_id_post_type');
            if(!isset($_id_post_type)) {
               $_id_post_type = 3;
             }
            $_id_status_type = $request->get('sel_id_status');
            //$request->session()->put('idcategory', $_idcategory);
            $request->session()->put('idstore', $_idstore);
            $request->session()->put('id_post_type', $_id_post_type);
            //$request->session()->forget('filter');
            if(!isset($_idstore)){
                $_idstore = 31;
                session()->put('idstore',  $_idstore);
            }
            try {
                //DB::select('exec my_stored_procedure(?,?,..)',array($Param1,$param2));
                $qr_category = DB::select('call ListParentCatByTypeProcedure(?)',array($posttype));
                $categories = json_decode(json_encode($qr_category), true);
                } catch (\Illuminate\Database\QueryException $ex) {
                    $errors = new MessageBag(['error' => $ex->getMessage()]);
                    return redirect()->route('admin.post.index')->with('error',$errors);
            }
            $list_checks = $request->input('list_check');
            $_idcategory = 0;
            $_list_idcat ='';
            if($list_checks){
                foreach ($list_checks as $item) {
                  //$iditem = explode("-",$item);
                  $idcategory = $item;
                  $_list_idcat .= "(".$idcategory."),";
                }
                $_list_idcat = rtrim($_list_idcat,", ");
            }else{
                foreach ($categories as $key => $item) { 
                     $_list_idcat .= "(".$item['idcategory']."),";
                  }
                 $_list_idcat = rtrim($_list_idcat,", ");
            }   
            // if(!isset($_idcategory)){
            //     $_idcategory=0;
            //     session()->put('idcategory',  $_idcategory);
            // }
            if(!isset($_id_post_type)){
                session()->put('id_post_type',  3);
            }
            if(!isset($_id_status_type)){
                session()->put('id_status_type',  4);
            }
            //$statustypes = status_type::all()->toArray();
            $post_types = PostType::all()->toArray();
            
            $qr_status = DB::select('call LstParentStatusProcedure()');
            $statustypes = json_decode(json_encode($qr_status), true);
           
            $errors = $_start_date.',end_date'.$_end_date.', list_idcat:'.$_list_idcat.',id_post_type:'.$_id_post_type.',id_status_type'.$_id_status_type;
           
            try {
                $result = DB::select('call ReportProductProcedure(?,?,?,?,?,?)',array($_list_idcat, $_id_post_type, $_id_status_type, $_idstore, $_start_date, $_end_date));
                $products = json_decode(json_encode($result), true);   
            }
            catch (\Illuminate\Database\QueryException $ex) {
                    $errors = new MessageBag(['error' => $ex->getMessage()]);
                    return redirect()->route('admin.post.index')->with('error',$errors);
            }
            return view('admin.post.index',compact('products','statustypes','errors','post_types','categories','_id_status_type'))->with('error',$errors);

       
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        $_iduser = Auth::id();
		$iddirect = $request->iddirect;
		if(!isset($iddirect)) $iddirect = 1;
        $idcrosstype = $request->idcrosstype;
        if(!isset($idcrosstype)) $idcrosstype = 0;
        $idparent = $request->idparent;
        if(!isset($idparent)) $idparent = 0;
        $idposttype = $request->idposttype;
        if(isset($idposttype)){
            $cattype = PostType::find($idposttype);
            $_namecattype = $cattype->nametype;
        }else{
            $_namecattype="post";
        }
        $parent_tilte = '';
        if($idparent > 0){
            $qr_parent_title = DB::select('call SelParentPhoneProcedure(?)', array($idparent));
            $rs_parent_title = json_decode(json_encode($qr_parent_title));
            if(isset($rs_parent_title)){
                foreach ($rs_parent_title as $row) {
                    $parent_tilte = $row->phone;
                }
                 
            }
        }
        $cate_selected[0]['idcategory'] = 0; 
        $str = '';
        $statustypes = status_type::all()->toArray();
        $posttypes = PostType::all()->toArray();

       if($idposttype == 28 || $idposttype == 27 || $idposttype == 4 || $idposttype == 5 || $idposttype == 6 || $idposttype == 7 || $idposttype == 23 || $idposttype == 1){
				$qr_category = DB::select('call ListParentCatByIdcatetypeProcedure(?)',array(22));
				$categories = json_decode(json_encode($qr_category), true);
		}else{
			$qr_category = DB::select('call ListParentCatByIdcatetypeProcedure(?)',array($idposttype));
			$categories = json_decode(json_encode($qr_category), true);
		}
       
        if($_namecattype=='post'){
            $qr_cross_type = DB::select('call SelCrossTypeProcedure');
            $sel_cross_type = json_decode(json_encode($qr_cross_type), true);
        }elseif($_namecattype=='survey'){
            $qr_cross_type = DB::select('call SelPostTypeProcedure(?)',array(4));
            $sel_cross_type = json_decode(json_encode($qr_cross_type), true);
        }else{
            $qr_cross_type = DB::select('call SelCrossTypeProcedure');
            $sel_cross_type = json_decode(json_encode($qr_cross_type), true);
        }
		if($idposttype==15||$idposttype==3||$idposttype==10||$idposttype==12||$idposttype==14||$idposttype==17||$idposttype==19||$idposttype==21){
			$qr_status = DB::select('call ListStatusbyIdposttype(?)', array(3));
			$statustypes = json_decode(json_encode($qr_status), true);
		}else{
			$qr_status = DB::select('call ListStatusbyIdposttype(?)', array($idposttype));
			$statustypes = json_decode(json_encode($qr_status), true);
		}
		$qr_status_process = DB::select('call StatusProcessbyIdgroup(?)', array('1'));
        $rs_status_process = json_decode(json_encode($qr_status_process), true);
		
        $qr_latest_id = DB::select('call GetlatestIdProcedure()');
        $rs_latest_id = json_decode(json_encode($qr_latest_id), true); 
        
        /*tag*/
        $cate_selected[0]['idcategory'] = 0;
        $str_tag = $this->all_category('tag',$cate_selected );
        $qr_catetag = DB::select('call ListParentCatByTypeProcedure(?)',array('tag'));
        $rs_catetags = json_decode(json_encode($qr_catetag), true);
        /*end tag*/
        $rs_tags = array();
        $product = array();
		$rs_store = array();
        if($idparent > 0 && $iddirect == 2){
            $qr_tags = DB::select('call TagsbyIdproductProcedure(?)',array($idparent));
            $rs_tags = json_decode(json_encode($qr_tags));
            $qr_product = DB::select('call EditDetailPhoneByIdcrosstypeProcedure(?,?)',array($idparent, 0));
            $product = json_decode(json_encode($qr_product), true);
			$qr_store = DB::select('call ListParentStoreByTypeProcedure(?,?)',array('store', $_namecattype));
			$rs_store = json_decode(json_encode($qr_store), true);
        }elseif($idparent > 0){
			$qr_tags = DB::select('call TagsbyIdproductProcedure(?)',array($idparent));
            $rs_tags = json_decode(json_encode($qr_tags));
            $qr_product = DB::select('call EditDetailPhoneByIdcrosstypeProcedure(?,?)',array($idparent, 0));
            $product = json_decode(json_encode($qr_product), true);
		}
		
        return view('admin.post.create',compact('rs_store','rs_status_process','str_tag','product','rs_tags','rs_catetags','posttypes','categories','statustypes','str','idposttype','idparent','idcrosstype','sel_cross_type','idposttype','_namecattype','rs_latest_id','parent_tilte'));
    }
	public function CreateInteractive(Request $request){
		try{
			$input = json_decode(file_get_contents('php://input'),true);
			$phone = $input['phone'];
			$sip = $input['sip'];
			$idposttype = $input['idposttype'];
			$idparent = $input['idparent'];
			$idcrosstype = $input['idcrosstype'];
			//$response = array('phone'=>$phone, 'sip'=>$sip, 'idposttype'=>$idposttype, 'idparent'=>$idparent , 'idcrosstype'=>$idcrosstype);
			//return response()->json($response);
			
            return response()->json($response);
        }
        catch (\Exception $ex)
        {
            $error = $ex->getMessage();
            //return json_decode($error,true);
            return response()->json($error);
        }
	}
    public function createby(Request $request, $posttype)
    {
        $_namecattype="post";
        $_idposttype = 3;
        if(isset($posttype)){
            $qr_idposttypeby = DB::select('call idposttypeby(?)',array($posttype));
            $rs_idposttypeby = json_decode(json_encode($qr_idposttypeby), true);
            if(isset($rs_idposttypeby)){
                //$_idposttype = $rs_idposttypeby[0]['idposttype'];
                if(isset($rs_idposttypeby[0]['idposttype'])){
                    $_idposttype = $rs_idposttypeby[0]['idposttype'];
                    $_namecattype = $posttype;
                }else {
                     //return redirect()->route('admin.post.index')->with('error',$errors);
                }   
            }
        }
        //$qr_cateselected = DB::select('call SelCateSelectedProcedure(?)',array($idproduct));
        //$cate_selected = json_decode(json_encode($qr_cateselected), true);
        $cate_selected[0]['idcategory']=0;
        $str = $this->all_category($_namecattype,$cate_selected);
        $statustypes = status_type::all()->toArray();
        $posttypes = PostType::all()->toArray();
        //$qr_size = DB::select('call SelAllSizeProcedure');
        //$size = json_decode(json_encode($qr_size), true);
        //$qr_color = DB::select('call SelAllColorProcedure');
        //$color = json_decode(json_encode($qr_color), true);
        //$_namecattype = "post";
        $result = DB::select('call ListParentCatByTypeProcedure(?)',array($_namecattype));
        $categories = json_decode(json_encode($result), true);
        $qr_cross_type = DB::select('call SelCrossTypeProcedure');
        $sel_cross_type = json_decode(json_encode($qr_cross_type), true);
        return view('admin.post.create',compact('posttypes','categories','statustypes','str','sel_cross_type','_namecattype','_idposttype'));
    }

    public function createcrossby(Request $request, $posttype, $idcrossproduct)
    {
        $_namecattype="post";
        $_idposttype = 3;
        if(isset($posttype)){
            $qr_idposttypeby = DB::select('call idposttypeby(?)',array($posttype));
            $rs_idposttypeby = json_decode(json_encode($qr_idposttypeby), true);
            if(isset($rs_idposttypeby)){
                //$_idposttype = $rs_idposttypeby[0]['idposttype'];
                if(isset($rs_idposttypeby[0]['idposttype'])){
                    $_idposttype = $rs_idposttypeby[0]['idposttype'];
                    $_namecattype = $posttype;
                }else {
                     //return redirect()->route('admin.post.index')->with('error',$errors);
                }   
            }
        }
        //$qr_cateselected = DB::select('call SelCateSelectedProcedure(?)',array($idproduct));
        //$cate_selected = json_decode(json_encode($qr_cateselected), true);
        $cate_selected[0]['idcategory']=0;
        $str = $this->all_category($_namecattype,$cate_selected);
        $statustypes = status_type::all()->toArray();
        $posttypes = PostType::all()->toArray();
        //$qr_size = DB::select('call SelAllSizeProcedure');
        //$size = json_decode(json_encode($qr_size), true);
        //$qr_color = DB::select('call SelAllColorProcedure');
        //$color = json_decode(json_encode($qr_color), true);
        //$_namecattype = "post";
        $result = DB::select('call ListParentCatByTypeProcedure(?)',array($_namecattype));
        $categories = json_decode(json_encode($result), true);
        $qr_cross_type = DB::select('call SelCrossTypeProcedure');
        $sel_cross_type = json_decode(json_encode($qr_cross_type), true);
        return view('admin.post.create',compact('posttypes','categories','statustypes','str','idcrossproduct','idcrosstype','sel_cross_type','_namecattype','_idposttype'));
        //return view('admin.post.create',compact('posttypes','categories','statustypes','str','sel_cross_type','_namecattype','_idposttype'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posttypes = PostType::all()->toArray();
        $_iduser = Auth::id();
		$_id_post_type = $request->get('sel_idposttype');
        $_idcustomer = 0;$_amount= 0; $_price=0;$_note =""; $_idstore= 31;$_axis_x=0;$_axis_y=0; $_axis_z=0; $message ="";
        $_idthumbnail = 1;$_idgallery = 2;
        
        $func_global = new func_global();
        try {
			//if($_id_post_type ==22){
                $_phone = $request->get('phone');
				if(isset($_phone) && !empty($_phone)){
					$qr_idclient = DB::select('call ExistsClientProcedure(?)',array($_phone));
					$rs_idclient = json_decode(json_encode($qr_idclient));
					if(isset($rs_idclient)){
					  foreach ($rs_idclient as $row) {
						  $idclient = $row->idclient;
						  $_idparent_survey = $row->idparentcross;
						  if($_idparent_survey > 0){
							  return redirect()->action('Admin\PostsController@edit',$_idparent_survey)->with('success',$idclient);
						  }
					  }
					}
				}
			//}
            $_namepro = $request->get('title');
            if(!isset($_namepro)){
                $qr_get_latestid = DB::select('call GetlatestIdProcedure()');
                $rs_get_latestid = json_decode(json_encode($qr_get_latestid), true);
                $latestid = $rs_get_latestid[0]['idproduct']+1;
                $_namepro = 'p-'.$latestid;
            }
            $title_strip = $func_global->stripVN($_namepro);
            $title_strip = preg_replace('/[ ](?=[ ])|[^-_,A-Za-z0-9 ]+/', '', $title_strip);
            $title_strip = strtolower($title_strip); 
            $_slug = preg_replace('/\s+/', '-', $title_strip);
            $_description = $request->get('body');
           
            $_sku_category = $request->get('sku_category');
            $_sku_product = $request->get('sku_product');
            $_id_post_type = $request->get('sel_idposttype');
            $_id_status_type = $request->get('sel_idstatustype');
			
            $_price_import = $request->get('price_import');
            $_price = $request->get('price');
            $_short_desc = $request->get('short_desc');
            $_link = $request->get('link');
            $_amount = $request->get('amount');
            $_quality_sale = $request->get('quality_sale');
            $_idsize = $request->get('size');
            $_idsize = null;
            $_idcolor = $request->get('color');
            $_idcolor = null;
            $_catnametype = 'post'; $_shortname = 'import'; $_prev_id = 0;
            $posttype = Posttype::find($_id_post_type);
            if (isset($posttype)) {
                $_catnametype = $posttype->nametype;
            }
            $_link = $request->get('link');
            $_feature = $request->get('feature');
            $_template = $request->get('template');
            $_keyword = $request->get('keyword');
            $seo_desc = $request->get('seo_desc');
            $_idyoutube = $request->get('idyoutube');

            $_idcrosstype = $request->idcrosstype;
            if(!isset($_idcrosstype)) $_idcrosstype = 0;
            $_idparent = $request->idparent;
            if(!isset($_idparent)) $_idparent = 0;
			if($_id_post_type == 22 || $_id_post_type == 28 && !isset($_description)){
				$_description = $_slug;
				if(!isset($_id_status_type)){
					$_id_status_type = 19;
				}
			}
			if(!isset($_description)){
				$errors = 'content required';
				return redirect()->route('admin.post.create',['idposttype' => $_id_post_type])->with('success',$errors);
			}
            //$validator = Validator::make($request->all(), [
                //'title' => 'required', 
                //'body' => 'required'
            //]);
            //if($validator->fails()) {
                //$errors = $validator->errors();
                //return redirect()->route('admin.post.create',['idposttype' => $_id_post_type,'idparent' => $_idparent, 'idcrosstype' => $_idcrosstype])->with(compact('errors'));
            //}
            $qr_exit_slug = DB::select('call ExistSlugProcedure(?,?)',array($_slug,0));
            $rs_exit_slug = json_decode(json_encode($qr_exit_slug), true);
            $exit_slug = $rs_exit_slug[0]['found'];
            if(isset($exit_slug) && $exit_slug > 0){
                $_slug = $_slug.'-'.rand(10,100);
            }
			$_iddirect = 2;
			$_idstatusprocess = $request->get('sel_statusprocess');
			if(!isset($_idstatusprocess)){
				$_idstatusprocess = 7;
			}
            $product = new Products(['namepro'=> $_namepro,'sku_category'=>$_sku_category, 'sku_product'=>$_sku_product, 'slug'=> $_slug,'short_desc'=> $_short_desc,'description'=>$_description,'idsize'=>$_idsize,'idcolor'=>$_idcolor, 'id_post_type'=>$_id_post_type, 'idstatus_type'=>$_id_status_type, 'link'=>$_link, 'feature'=>$_feature, 'template'=>$_template, 'seo_desc'=>$seo_desc, 'keyword'=>$_keyword, 'idyoutube'=>$_idyoutube, 'post_author'=>$_iduser, 'idstatusprocess'=>$_idstatusprocess, 'iddirect'=>$_iddirect]);
            $product->save();
            $idproduct = $product->idproduct;
            /*create new customer*/
            $str_client = '';
			$idclient = 0;
			$_idstore = $request->get('sel_id_store');
			if(!isset($_idstore)){
				if($_id_post_type == 28 || $_id_post_type == 22 || $_id_post_type == 4 || $_id_post_type == 5 || $_id_post_type == 6 || $_id_post_type == 7 || $_id_post_type == 23 || $_id_post_type == 1){
					$_idstore = 225;
				}
			}
            if($_id_post_type == 22 || $_id_post_type == 4 || $_id_post_type == 5 || $_id_post_type == 6 || $_id_post_type == 7 || $_id_post_type == 23 || $_id_post_type == 1){
                $_phone = $request->get('phone');
                $_firstname = $request->get('firstname');
                $_middlename = $request->get('middlename');
                $_lastname = $request->get('lastname');
                $_email = $request->get('email');
                $_address = $request->get('address');
                $_sex = $request->get('sex');
                $_birthday = $request->get('birthday');
                $_idstatuslock = $request->get('sel_idstatuslock');
                $_facebookName = $request->get('facebookName'); 
                $_facebookUid = $request->get('facebookUid');
				$_idstatuslock = 0;
                $qr_store_profile_client = DB::select('call StoreProfileClientProcedure(?,?,?,?,?,?,?,?,?,?,?,?)',array($_firstname, $_middlename, $_lastname, $_phone, $_email, $_address, $_sex, $idproduct, $_birthday, $_facebookName, $_facebookUid, $_idstatuslock));
                $rs_store_profile_client = json_decode(json_encode($qr_store_profile_client));
				if(isset($rs_store_profile_client)){
                  foreach ($rs_store_profile_client as $row) {
                      $idclient = $row->idclient;
                      //$_idparentcross = $row->idparentcross;
				  }
				 }
                /*end update*/
                $str_client = ', '.$_firstname.','.$_middlename.','.$_lastname.','.$_email.','.$_address.','.$_sex.','.$_birthday;
            }
            /*end new customer*/
            $list_checks = $request->input('list_check');
            $_list_idcat="";
            if($list_checks){
                foreach ($list_checks as $item) {
                  //$iditem = explode("-",$item);
                  $idcategory = $item;
                  $_list_idcat .= "(".$idproduct.",".$idcategory."),";
                } 
                $_list_idcat = rtrim($_list_idcat,", ");     
            }else{
				if($_id_post_type == 22 || $_id_post_type == 4 || $_id_post_type == 5 || $_id_post_type == 6 || $_id_post_type == 7 || $_id_post_type == 23 || $_id_post_type == 1){
					$_list_idcat .= "(".$idproduct.",252)";
				}elseif($_id_post_type == 15){
					$_list_idcat .= "(".$idproduct.",157)";
				}elseif($_id_post_type == 19){
					$_list_idcat .= "(".$idproduct.",266)";
				}
				else{
					$_list_idcat .= "(".$idproduct.",109)";
				}
            }
           	$prodbelongcate = DB::select('call ProductBelongCategoryProcedure(?)',array($_list_idcat));
             if($request->hasfile('thumbnail')) {
                $file = $request->file('thumbnail');
                $_name_origin = $file->getClientOriginalName();
                $_name_origin = $func_global->stripVN($_name_origin);
                $_name_origin = preg_replace('/[ ](?=[ ])|[^-_,A-Za-z0-9 ]+/', '', $_name_origin);
                $_name_origin = strtolower($title_strip); 
                $_name_origin = preg_replace('/\s+/', '-', $title_strip);
                //$file->move(public_path().'/images/', $name);  
                $_typefile = $file->getClientOriginalExtension();
                $dir = 'uploads/';
                $path = base_path($dir . date('Y') . '/'.date('m').'/'.date('d').'/');
                $_urlfile = $dir . date('Y') . '/'.date('m').'/'.date('d').'/';
                if(!File::exists($path)) {
                    File::makeDirectory($path, 0777, true, true);
                }     
                $_namefile = date('Ymd').'_'.time().'_'.uniqid().'.'.$_typefile;
                $file->move($path, $_namefile);
                $_urlfile .= $_namefile;
                //$_list_file .= "'".$path_relative."','".$name_origin."','".$filename."','".$typefile."';";
                $qr_producthasfile = DB::select('call ProducthasFileProcedure(?,?,?,?,?,?)',array($_urlfile, $_name_origin, $_namefile , $_typefile, $idproduct,$_idthumbnail));                
				$rs_producthasfile = json_decode(json_encode($qr_producthasfile));
				if(isset($rs_producthasfile)){
					foreach($rs_producthasfile as $row){
						$_idproducthasfile = $row->idproducthasfile;
						if(isset($_idproducthasfile) && $_idproducthasfile > 0){
							$qr_updateproducthasfile = DB::select('call UpdateProducthasFileProcedure(?,?)',array($idproduct, $_idproducthasfile));                
							$rs_updateproducthasfile = json_decode(json_encode($qr_updateproducthasfile));
						}
					}
				}
			 }else{
                DB::select('call NothumbnailProcedure(?,?,?)',array($idproduct, 1 , 1));
				$qr_updateproducthasfile = DB::select('call UpdateProducthasFileProcedure(?,?)',array($idproduct, 1));                
				$rs_updateproducthasfile = json_decode(json_encode($qr_updateproducthasfile));
             }    
            
             if($request->hasfile('file_attach')) {
                foreach($request->file('file_attach') as $file) {
                    $_name_origin = $file->getClientOriginalName();
                     $_name_origin = $func_global->stripVN($_name_origin);
                        $_name_origin = preg_replace('/[ ](?=[ ])|[^-_,A-Za-z0-9 ]+/', '', $_name_origin);
                        $_name_origin = strtolower($_name_origin); 
                        $_name_origin = preg_replace('/\s+/', '-', $_name_origin);
                    //$file->move(public_path().'/images/', $name);  
                    $_typefile = $file->getClientOriginalExtension();
                    $dir = 'uploads/';
                    $path = base_path($dir . date('Y') . '/'.date('m').'/'.date('d').'/');
                    $_urlfile = $dir . date('Y') . '/'.date('m').'/'.date('d').'/';
                    if(!File::exists($path)) {
                        File::makeDirectory($path, 0777, true, true);
                    }     
                    $_namefile = date('Ymd').'_'.time().'_'.uniqid().'.'.$_typefile;
                    $file->move($path, $_namefile);
                    $_urlfile .= $_namefile;
                    DB::select('call ProducthasFileProcedure(?,?,?,?,?,?)',array($_urlfile, $_name_origin, $_namefile , $_typefile, $idproduct,$_idgallery));
                }
             }
			if($_id_post_type == 22){
				$qr_insertproduct = DB::select('call InitImportCustomPostProcedure(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array($idproduct, $_idcustomer, $_iduser, $_idcrosstype, $_idparent, $_amount, $_price_import, $_price, $_quality_sale, $_note, $_idstore, $_axis_x, $_axis_y, $_axis_z, $_id_status_type, $_catnametype, $_prev_id, $idclient));
                $rs_insertproduct = json_decode(json_encode($qr_insertproduct), true);
			}elseif($_id_post_type == 1 || $_id_post_type == 4 || $_id_post_type == 5 || $_id_post_type == 6 || $_id_post_type == 7 || $_id_post_type == 23 || $_id_post_type == 28){
				$qr_insertproduct = DB::select('call InitImportCustomPostProcedure(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array($idproduct, $_idcustomer, $_iduser, $_idcrosstype, $_idparent, $_amount, $_price_import, $_price, $_quality_sale, $_note, $_idstore, $_axis_x, $_axis_y, $_axis_z, $_id_status_type, $_catnametype, $_prev_id, $idclient));
                $rs_insertproduct = json_decode(json_encode($qr_insertproduct), true);
			}else{
				$_shortname = 'import';
				if( $_idcrosstype > 0 && $_idparent > 0){
					$insertproduct = DB::select('call ImportByCrossParentProcedure(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array($idproduct, $_idcustomer, $_iduser, $_idcrosstype, $_idparent, $_amount, $_price_import, $_price_sale, $_quality_sale, $_note, $_axis_x, $_axis_y, $_axis_z, $_id_status_type, $_catnametype, $_shortname ));
				}else{
					$qr_insertproduct = DB::select('call InitImportProductProcedure(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array($idproduct,$_idcustomer,$_iduser,0,0,$_amount,$_price_import,$_price,$_quality_sale,$_note,$_axis_x,$_axis_y,$_axis_z,$_id_status_type,$_catnametype,$_shortname, $_prev_id));
					$rs_insertproduct = json_decode(json_encode($qr_insertproduct), true);
				}
			}
            /*end tag*/            
        } catch (\Illuminate\Database\QueryException $ex) {
            $errors = new MessageBag(['error' => $ex->getMessage()]);
            return redirect()->back()->withInput()->withErrors($errors);
        }
        $message = "success ".$_list_idcat.'-'.$_id_post_type.'-'.$_id_status_type.'- idproduct:'.$idproduct;
		if( $_idcrosstype > 0 && $_idparent > 0){
			return redirect()->action('Admin\PostsController@edit',[$idproduct, 'idposttype' => $_id_post_type,'idparent' => $_idparent, 'idcrosstype' => $_idcrosstype])->with('success',$message);
        }else{
			return redirect()->action('Admin\PostsController@edit',[$idproduct, 'idposttype' => $_id_post_type])->with('success',$message);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editbycattype($idproduct, $_namecattype, $idposttype)
    {
        //$_namecattype="post";
        $_idstore = 31;
        $qr_cateselected = DB::select('call SelCateSelectedProcedure(?)',array($idproduct));
        $cate_selected = json_decode(json_encode($qr_cateselected), true);
        $str = $this->all_category($_namecattype, $cate_selected );
        $statustypes = status_type::all()->toArray();
        $posttypes = PostType::all()->toArray();
        $result = DB::select('call ListParentCatByTypeProcedure(?)',array($_namecattype));
        $categories = json_decode(json_encode($result), true);

        $qr_product = DB::select('call EditDetailByIdProcedure(?,?)',array($idproduct, $_idstore));
        $product = json_decode(json_encode($qr_product), true);
        //$qr_product = DB::select('call SelProductByIdProcedure(?,?)',array($idproduct,$_idstore));
        //$product = json_decode(json_encode($qr_product), true);
        $_idgalery = 2;
        $qr_gallery = DB::select('call SelGalleryProcedure(?,?)',array($idproduct,$_idgalery));
        $gallery = json_decode(json_encode($qr_gallery), true);

        //$qr_size = DB::select('call SelAllSizeProcedure');
        //$size = json_decode(json_encode($qr_size), true);

        //$qr_color = DB::select('call SelAllColorProcedure');
        //$color = json_decode(json_encode($qr_color), true);
        $qr_sel_cross_byidproduct = DB::select('call SelProductCrossByIdProcedure(?)',array($idproduct));
        $sel_cross_byidproduct = json_decode(json_encode($qr_sel_cross_byidproduct), true);
        
        $qr_sel_impbyidpro = DB::select('call SelImportByIDProductProcedure(?,?)',array($idproduct,$_idstore));
        $rs_sel_impbyidpro = json_decode(json_encode($qr_sel_impbyidpro), true);
        
        $qr_parent_cross_product = DB::select('call SelParentProductCrossProcedure(?)',array($idproduct));
        $sel_parent_cross_product = json_decode(json_encode($qr_parent_cross_product), true);

        $qr_cross_type = DB::select('call SelCrossTypeProcedure');
        $sel_cross_type = json_decode(json_encode($qr_cross_type), true);
        return view('admin.post.edit',compact('gallery','product','posttypes','categories','statustypes','str','idproduct','sel_cross_byidproduct','sel_parent_cross_product','sel_cross_type','rs_sel_impbyidpro','idposttype','_namecattype'));
        //return view('admin.post.edit',compact('gallery','product','posttypes','categories','statustypes','str','idproduct','size','color','sel_cross_byidproduct','sel_parent_cross_product','sel_cross_type','rs_sel_impbyidpro'));
    }
    public function editbyposttype($idproduct, $_namecattype, $idposttype)
    {
        //$_namecattype="post";
        $_idstore = 31;
        $qr_cateselected = DB::select('call SelCateSelectedProcedure(?)',array($idproduct));
        $cate_selected = json_decode(json_encode($qr_cateselected), true);
        $str = $this->all_category($_namecattype, $cate_selected );
        $statustypes = status_type::all()->toArray();
        $posttypes = PostType::all()->toArray();
        $result = DB::select('call ListParentCatByTypeProcedure(?)',array($_namecattype));
        $categories = json_decode(json_encode($result), true);

        $qr_product = DB::select('call EditDetailByIdProcedure(?,?)',array($idproduct, $_idstore));
        $product = json_decode(json_encode($qr_product), true);
        //$qr_product = DB::select('call SelProductByIdProcedure(?,?)',array($idproduct,$_idstore));
        //$product = json_decode(json_encode($qr_product), true);
        $_idgalery = 2;
        $qr_gallery = DB::select('call SelGalleryProcedure(?,?)',array($idproduct,$_idgalery));
        $gallery = json_decode(json_encode($qr_gallery), true);

        //$qr_size = DB::select('call SelAllSizeProcedure');
        //$size = json_decode(json_encode($qr_size), true);

        //$qr_color = DB::select('call SelAllColorProcedure');
        //$color = json_decode(json_encode($qr_color), true);
        $qr_sel_cross_byidproduct = DB::select('call SelProductCrossByIdProcedure(?)',array($idproduct));
        $sel_cross_byidproduct = json_decode(json_encode($qr_sel_cross_byidproduct), true);
        
        $qr_sel_impbyidpro = DB::select('call SelImportByIDProductProcedure(?,?)',array($idproduct,$_idstore));
        $rs_sel_impbyidpro = json_decode(json_encode($qr_sel_impbyidpro), true);
        
        $qr_parent_cross_product = DB::select('call SelParentProductCrossProcedure(?)',array($idproduct));
        $sel_parent_cross_product = json_decode(json_encode($qr_parent_cross_product), true);

        $qr_cross_type = DB::select('call SelCrossTypeProcedure');
        $sel_cross_type = json_decode(json_encode($qr_cross_type), true);
        return view('admin.post.edit',compact('gallery','product','posttypes','categories','statustypes','str','idproduct','sel_cross_byidproduct','sel_parent_cross_product','sel_cross_type','rs_sel_impbyidpro','idposttype','_namecattype'));
    }
    public function edit(Request $request , $idproduct)
    {
        $_namecattype ="post";
        $_posttype ="post";
        $_idstore = 31;
		$_id_post_type = 3;
        $qr_cateselected = DB::select('call SelCateSelectedProcedure(?)',array($idproduct));
        $cate_selected = json_decode(json_encode($qr_cateselected), true);  
        //$statustypes = status_type::all()->toArray();
        $posttypes = PostType::all()->toArray();
        $idparent = $request->idparent;
        if(!isset($idparent)){
            $idparent = 0;
        }
        $idcrosstype = $request->idcrosstype;
        if(!isset($idcrosstype)){
            $idcrosstype = 0;
        }
        $qr_product = DB::select('call EditDetailPhoneByIdcrosstypeProcedure(?,?)',array($idproduct, $idcrosstype));
        $product = json_decode(json_encode($qr_product), true);
        //if(isset($product) && isset($product[0]['id_status_type']) == 5){
        if(isset($product)){
            $_posttype = $product[0]['nametype'];
            $_namecattype = $_posttype;
            $_id_post_type = $product[0]['id_post_type'];
            $_idclient = $product[0]['idclient'];
            $_idstore = $product[0]['idstore'];
        }
         if($_namecattype=='post'){
            $qr_cross_type = DB::select('call SelCrossTypeProcedure');
            $sel_cross_type = json_decode(json_encode($qr_cross_type), true);
            //$statustypes = status_type::all()->toArray();
        }elseif($_namecattype=='survey'){
            $qr_cross_type = DB::select('call SelPostTypeProcedure(?)',array(4));
            $sel_cross_type = json_decode(json_encode($qr_cross_type), true);
            $idcrosstype = 6;
            $_namecattype = 'tag';
        }
		else{
            $qr_cross_type = DB::select('call SelCrossTypeProcedure');
            $sel_cross_type = json_decode(json_encode($qr_cross_type), true);
        } 
		$_idstatusprocess = $request->get('sel_statusprocess');
			if(!isset($_idstatusprocess)){
				$_idstatusprocess = 1;
		}
        $str = $this->all_category($_namecattype, $cate_selected );
        $result = DB::select('call ListParentCatByTypeProcedure(?)',array($_namecattype));
        $categories = json_decode(json_encode($result), true);
        //showCategories($categories, $idparent = 0, $char = '', $_cate_selected)
        $_idgalery = 2;
        $qr_gallery = DB::select('call SelGalleryProcedure(?,?)',array($idproduct,$_idgalery));
        $gallery = json_decode(json_encode($qr_gallery), true);

        $qr_sel_cross_byidproduct = DB::select('call SelPostByIdcrosstypeProcedure(?,?)',array($idproduct, $idcrosstype));
        $sel_cross_byidproduct = json_decode(json_encode($qr_sel_cross_byidproduct), true);

        $qr_sel_impbyidpro = DB::select('call SelImportByIDProductProcedure(?,?)',array($idproduct,$_idstore));
        $rs_sel_impbyidpro = json_decode(json_encode($qr_sel_impbyidpro), true);
        
        $qr_parent_cross_product = DB::select('call SelParentProductCrossProcedure(?)',array($idproduct));
        $sel_parent_cross_product = json_decode(json_encode($qr_parent_cross_product), true);
		
		if($_id_post_type==3||$_id_post_type==10||$_id_post_type==12||$_id_post_type==14||$_id_post_type==15||$_id_post_type==17||$_id_post_type==19||$_id_post_type==21){
			$qr_status = DB::select('call ListStatusbyIdposttype(?)', array(3));
			$statustypes = json_decode(json_encode($qr_status), true);
		}else{
			$qr_status = DB::select('call ListStatusbyIdposttype(?)', array($_id_post_type));
			$statustypes = json_decode(json_encode($qr_status), true);
		}
 	
		$qr_status_process = DB::select('call StatusProcessbyIdgroup(?)', array('1'));
        $rs_status_process = json_decode(json_encode($qr_status_process), true);

        //$qr_phone = DB::select('call ListInteractiveByPosttypeProcedure(?,?,?)', array($idproduct, 6, 'phone'));
        $qr_phone = DB::select('call ListTypeInteractiveProcedure(?,?,?)', array($idproduct, 6, 'phone'));
		$rs_phone = json_decode(json_encode($qr_phone), true);

        $qr_sms = DB::select('call ListTypeInteractiveProcedure(?,?,?)', array($idproduct, 6, 'sms'));
        $rs_sms = json_decode(json_encode($qr_sms), true);

        $qr_email = DB::select('call ListTypeInteractiveProcedure(?,?,?)', array($idproduct, 6, 'email'));
        $rs_email = json_decode(json_encode($qr_email), true);

        $qr_booking = DB::select('call ListTypeInteractiveProcedure(?,?,?)', array($idproduct, 6, 'booking'));
        $rs_booking = json_decode(json_encode($qr_booking), true);
		
		$qr_scan = DB::select('call ListTypeInteractiveProcedure(?,?,?)', array($idproduct, 6, 'scan'));
        $rs_scan = json_decode(json_encode($qr_scan), true);

        $qr_report = DB::select('call ReportTypeInteractiveProcedure(?,?)', array($idproduct, 6));
        $rs_report = json_decode(json_encode($qr_report), true);
		
		$qr_consultant = DB::select('call ListTypeInteractiveProcedure(?,?,?)', array($idproduct, 6, 'consultant'));
        $rs_consultant = json_decode(json_encode($qr_consultant), true);
		
        $qr_catetags = DB::select('call ListParentCatByTypeProcedure(?)',array('tag'));
        $rs_catetags = json_decode(json_encode($qr_catetags), true);
		if($idparent > 0){
			 $qr_tags = DB::select('call TagsbyIdproductProcedure(?)',array($idparent));
			 $rs_tags = json_decode(json_encode($qr_tags));
		}else{
			 $qr_tags = DB::select('call TagsbyIdproductProcedure(?)',array($idproduct));
			 $rs_tags = json_decode(json_encode($qr_tags));
		}
        $qr_store = DB::select('call ListParentStoreByTypeProcedure(?,?)',array('store', $_posttype));
        $rs_store = json_decode(json_encode($qr_store), true);

        return view('admin.post.edit',compact('rs_store','rs_status_process','rs_consultant','gallery','product','posttypes','categories','statustypes','str','idproduct','sel_cross_byidproduct','sel_parent_cross_product','sel_cross_type','rs_sel_impbyidpro','_id_post_type','_posttype','idparent','rs_phone','rs_sms','rs_email','rs_booking','rs_scan','rs_report','rs_catetags','rs_tags','rs_store'))->with('success','updated');
    }
	
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idproduct)
    {
            $posttypes = PostType::all()->toArray();
            $_iduser = Auth::id();
            $_idcustomer = '0';$_note =""; $_axis_x='0';$_axis_y='0'; $_axis_z='0';$message ="";
            $func_global = new func_global();
            $_idcrosstype = $request->idcrosstype;
            if(!isset($_idcrosstype)){
                $_idcrosstype = 0;
            }
            $_idparent = $request->idparent;
            if(!isset($_idparent)){
                $_idparent = 0;
            }
            $_id_post_type = $request->idposttype;
            if(!isset($_id_post_type)){
                $_id_post_type = 0;
            }
            $_idstore = $request->get('sel_id_store');
            if(!isset($_idstore)){
            	$_idstore = 31;
            }
            $errors = $_idparent.'-'.$_idcrosstype;
            //return redirect()->route('admin.post.edit',[$idproduct, 'idposttype'=>$_id_post_type, 'idparent'=>$_idparent, 'idcrosstype' =>$_idcrosstype])->with('errors',$errors);
        //try {
            $_namepro = $request->get('title');
            $_slug = $request->get('slug');
			
            $qr_exit_slug = DB::select('call ExistSlugProcedure(?,?)',array($_slug, $idproduct));
            $rs_exit_slug = json_decode(json_encode($qr_exit_slug), true);

            $exit_slug = $rs_exit_slug[0]['found'];
            if(isset($exit_slug) && $exit_slug > 0){
                $title_strip = $func_global->stripVN($_namepro);
                $title_strip = preg_replace('/[ ](?=[ ])|[^-_,A-Za-z0-9 ]+/', '', $title_strip);
                $title_strip = strtolower($title_strip); 
                $_slug = preg_replace('/\s+/', '-', $title_strip);
                $_slug = $_slug.'-'.rand(10,100);
            }
            $_idimp = $request->get('idimp');
            $_id_status_type = $request->get('sel_idstatustype');
            $_amount = $request->get('amount');
            $_price_import = $request->get('price_import');
            $_price = $request->get('price');
            $_quality_sale = $request->get('quality_sale');
            //update product
            //$_namepro = $request->get('title');
            $_sku_category = $request->get('sku_category');
            $_sku_product = $request->get('sku_product');
            $_short_desc = $request->get('short_desc');
            $_description = $request->get('body');
            $_id_post_type = $request->get('sel_idposttype');
            $_idcolor = $request->get('idcolor');
            $_idsize = $request->get('idsize');
            $_link = $request->get('link');
            $_feature = $request->get('feature');
            $_template = $request->get('template');
            $_keyword = $request->get('keyword');
            $_idyoutube = $request->get('idyoutube');
			$_idstatusprocess = $request->get('sel_statusprocess');
			if(!isset($_idstatusprocess)){
				$_idstatusprocess = 1;
			}
			
            $validator = Validator::make($request->all(), [
                'title' => 'required', 
                'body' => 'required']);
            
            if ($validator->fails()) {
                $errors = $validator->errors();
                return redirect()->route('admin.post.edit',[$idproduct, 'idposttype'=>$_id_post_type, 'idparent'=>$_idparent, 'idcrosstype' =>$_idcrosstype])->with(compact('errors'));           
            }

            $product = Products::find($idproduct);
            $product->namepro = $_namepro;
            $product->slug = $_slug;
            $product->sku_category = $_sku_category;
            $product->sku_product = $_sku_product;
            $product->short_desc = $_short_desc;
            $product->description = $_description;

            $product->id_post_type = $_id_post_type;
            $product->idstatus_type = $_id_status_type;
			$product->idstatusprocess = $_idstatusprocess;
            $product->idcolor = $_idcolor;
            $product->idsize = $_idsize;
            $product->link = $_link;
            $product->feature = $_feature;
            $product->template = $_template;
            $product->keyword = $_keyword;
            $product->idyoutube = $_idyoutube;
            $product->save();
            //update category belong product
            try{
                $qr_cateselected = DB::select('call SelCateSelectedProcedure(?)',array($idproduct));
                $cate_selected = json_decode(json_encode($qr_cateselected), true);
            } catch (\Illuminate\Database\QueryException $ex) {
                $errors = new MessageBag(['error' => $ex->getMessage()]);
                return redirect()->back()->withInput()->withErrors($errors);
            }
           
            $list_checks = $request->input('list_check');
            $list_key = "";
            $_list_idcat="";
            $selected = 0;
            if($list_checks){
                foreach ($list_checks as $item) {
                  //$iditem = explode("-",$item);
                  $idcategory = $item;
                  $_list_idcat .= "(".$idproduct.",".$idcategory."),";
                } 
                $_list_idcat = rtrim($_list_idcat,", ");     
            }else{
                $_list_idcat .= "(".$idproduct.",109)";
                //return redirect()->action('Admin\ProductsController@edit',$idproduct)->with('success',$message);
            }
             $_idthumbnail = 1;
             if($request->hasfile('thumbnail')) {
                    $file = $request->file('thumbnail');
                    $_name_origin = $file->getClientOriginalName();
                    $_name_origin = $func_global->stripVN($_name_origin);
                    $_name_origin = preg_replace('/[ ](?=[ ])|[^-_,A-Za-z0-9 ]+/', '', $_name_origin);
                    $_name_origin = strtolower($_name_origin); 
                    $_name_origin = preg_replace('/\s+/', '-', $_name_origin);
                    //$thumbnail = $_name_origin;
                    $_typefile = $file->getClientOriginalExtension();
                    $dir = 'uploads/';
                    $path = base_path($dir . date('Y') . '/'.date('m').'/'.date('d').'/');
                    $_urlfile = $dir . date('Y') . '/'.date('m').'/'.date('d').'/';
                    if(!File::exists($path)) {
                        File::makeDirectory($path, 0777, true, true);
                    }     
                    $_namefile = date('Ymd').'_'.time().'_'.uniqid().'.'.$_typefile;
                    $file->move($path, $_namefile);
                    $_urlfile .= $_namefile;
                    //DB::select('call ProducthasFileProcedure(?,?,?,?,?,?)',array($_urlfile, $_name_origin, $_namefile , $_typefile, $idproduct,$_idthumbnail));
					$qr_producthasfile = DB::select('call ProducthasFileProcedure(?,?,?,?,?,?)',array($_urlfile, $_name_origin, $_namefile , $_typefile, $idproduct,$_idthumbnail));                
					$rs_producthasfile = json_decode(json_encode($qr_producthasfile));
					if(isset($rs_producthasfile)){
						foreach($rs_producthasfile as $row){
							$_idproducthasfile = $row->idproducthasfile;
							if(isset($_idproducthasfile) && $_idproducthasfile > 0){
								$qr_updateproducthasfile = DB::select('call UpdateProducthasFileProcedure(?,?)',array($idproduct, $_idproducthasfile));                
								$rs_updateproducthasfile = json_decode(json_encode($qr_updateproducthasfile));
							}
						}
					}
             }
             $list_file = "";
             $_idgalery = 2;
             if($request->hasfile('file_attach')) {
                $edit_gallery = $request->input('edit-gallery');
                if($edit_gallery){
                    foreach ($edit_gallery as $idproducthasfile) {
                        DB::select('call TrashGelleryProcedure(?)',array($idproducthasfile));
                    }
                }
                foreach($request->file('file_attach') as $file) {
                    $_name_origin = $file->getClientOriginalName();
                    $_name_origin = $func_global->stripVN($_name_origin);
                    $_name_origin = preg_replace('/[ ](?=[ ])|[^-_,A-Za-z0-9 ]+/', '', $_name_origin);
                    $_name_origin = strtolower($_name_origin); 
                    $_name_origin = preg_replace('/\s+/', '-', $_name_origin);
                    $_typefile = $file->getClientOriginalExtension();
                    $dir = 'uploads/';
                    $path = base_path($dir . date('Y') . '/'.date('m').'/'.date('d').'/');
                    $_urlfile = $dir . date('Y') . '/'.date('m').'/'.date('d').'/';
                    if(!File::exists($path)) {
                        File::makeDirectory($path, 0777, true, true);
                    }     
                    $_namefile = date('Ymd').'_'.time().'_'.uniqid().'.'.$_typefile;
                    $file->move($path, $_namefile);
                    $_urlfile .= $_namefile;
                    DB::select('call ProducthasFileProcedure(?,?,?,?,?,?)',array($_urlfile, $_name_origin, $_namefile , $_typefile, $idproduct,$_idgalery));
                }             
             }
            
            $updateproduct = DB::select('call UpdateImportProductProcedure(?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array($_idimp, $_idcustomer, $_iduser, $_idcrosstype, $_amount, $_price_import, $_price, $_quality_sale, $_note, $_idstore, $_axis_x, $_axis_y, $_axis_z, $_id_status_type));
            $_idimpcross = $request->get('idimpcross');
            $l_cross_idimp = $request->get('l_cross_idimp');
            if(!empty($l_cross_idimp)){
                $l_cross_selidtype = $request->get('l_cross_selidtype');
                //$l_idparentcross = $request->get('l_idparentcross');
                $l_cross_price = $request->get('l_cross_price');
                $l_cross_quality_sale = $request->get('l_cross_quality_sale');
                $l_cross_id_status_type = $request->get('l_cross_id_status_type');
                $l_cross_start_date = $request->get('l_cross_start_date');
                $l_cross_end_date = $request->get('l_cross_end_date');
                $str_qr = "";
                foreach( $l_cross_idimp as $key => $_cross_idimp ) {
                        $_cross_selidtype = $l_cross_selidtype[$key];
                        //$_idparentcross = $l_idparentcross[$key];
                        $_cross_price = $l_cross_price[$key];
                        $_cross_quality_sale =$l_cross_quality_sale[$key];
                        $_cross_id_status_type = $l_cross_id_status_type[$key];
                        $_cross_start_date = $l_cross_start_date[$key];
                        $_cross_end_date = $l_cross_end_date[$key];
                        $str_qr .= '('.$_cross_idimp.','.$_cross_selidtype.','.$_cross_price.','.$_cross_quality_sale.','.$_cross_id_status_type.',"'.$_cross_start_date.'","'.$_cross_end_date.'"),';
                }
                $str_qr = substr_replace($str_qr ,"", -1);
                $str_qr = "INSERT into tmp_import(idimp, idcrosstype, price, quality_sale, id_status_type, fromdate, todate) VALUES ".$str_qr;
                $updateproductcross = DB::select('call UpdateImpProductProcedure(?)',array($str_qr));
            }
            //update promotion
            // $sel_type_promo = $request->get('sel_type_promo'); 
            // $price_promo = $request->get('price_promo');
            // $quality_promo = $request->get('quality_promo');
            // $_start_date_promo = $request->get('_start_date');
            // $_end_date_promo = $request->get('_end_date');
            // $_idstore = 31;
            /*begin tag*/
            $list_tag = $request->input('tag_check');
            $strtag = '';
            if(isset($list_tag)){
            	foreach ($list_tag as $idtag) {
	            	$strtag .= "(".$idtag."),";
	            }
	            $strtag = rtrim($strtag,", ");
				if($_idparent > 0){
					$qr_insert_tag = DB::select('call InsertTagProcedure(?,?)',array($strtag, $_idparent));
					$rs_insert_tag = json_decode(json_encode($qr_insert_tag));
				}else{
					$qr_insert_tag = DB::select('call InsertTagProcedure(?,?)',array($strtag, $idproduct));
					$rs_insert_tag = json_decode(json_encode($qr_insert_tag));
				}
            }
            /*update customer*/
            $str_client = '';
            $_idclient = $request->get('idclient');
            if(isset($_idclient) && $_idclient > 0 ){
                $_firstname = $request->get('firstname');
                $_middlename = $request->get('middlename');
                $_lastname = $request->get('lastname');
                $_email = $request->get('email');
                $_address = $request->get('address');
                $_sex = $request->get('sex');
                $_birthday = $request->get('birthday');
                $_idstatuslock = $request->get('sel_idstatuslock');
                $_facebookName = $request->get('facebookName'); 
                $_facebookUid = $request->get('facebookUid');
                $qr_update_profile_client = DB::select('call UpdateProfileClientProcedure(?,?,?,?,?,?,?,?,?,?,?)',array($_idclient, $_firstname, $_lastname, $_middlename, $_sex, $_birthday, $_address, $_email, $_facebookName, $_facebookUid, $_idstatuslock));
                $rs_update_profile_client = json_decode(json_encode($qr_update_profile_client));
                /*end update*/
                $str_client = ', '.$_firstname.','.$_middlename.','.$_lastname.','.$_email.','.$_address.','.$_sex.','.$_birthday;
            }
            
        $message = "update ".$_id_post_type.'-'.$exit_slug.', tag:'.$strtag.','.$str_client.',idstatusprocess:'.$_idstatusprocess;
		if($_idparent > 0 && $_idcrosstype > 0 ){
			return redirect()->action('Admin\PostsController@edit',[$idproduct, 'idposttype' => $_id_post_type,'idparent' => $_idparent, 'idcrosstype' => $_idcrosstype])->with('success',$message);
		}elseif($_id_post_type > 0){
			return redirect()->action('Admin\PostsController@edit',[$idproduct, 'idposttype' => $_id_post_type])->with('success',$message);
        }else{
			return redirect()->action('Admin\PostsController@edit',$idproduct)->with('success',$message);
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $post = Posts::find($id);
    //     $post->delete();
    //     return redirect()->route('admin.post.index')->with('success','record have deleted');
    // }
    public function destroy($id)
    {
        //
    }
    //show sub category
    public function all_category($_namecattype, $_cate_selected) {
		if(isset($_namecattype) && $_namecattype == 'phone' || $_namecattype == 'servey'){
			$_namecattype = 'survey';
		}
        $result = DB::select('call ListAllCatByTypeProcedure(?)',array($_namecattype));
        $categories = json_decode(json_encode($result), true);
        $this->showCategories($categories,0,'',$_cate_selected,$_namecattype);
		if(isset($_namecattype) && $_namecattype == 'phone' || $_namecattype == 'servey'){
			return $this->main_tag;
		}else{
			return $this->main_menu;
		}
        
    }
 
    public function categorybyid($_cattype='post', $_idcat=0 , $_idproduct = 0) {
		if(isset($_cattype)&& $_cattype == 'tag'){
			$namecheck = 'list_check_tag[]';
		}else{
			$namecheck = 'list_check[]';
		}
        $qr_cateselected = DB::select('call SelCateSelectedProcedure(?)',array($_idproduct));
        $_cate_selected = json_decode(json_encode($qr_cateselected), true);
        //if($_idproduct > 0){
            //$qr_cateselected = DB::select('call SelCateSelectedProcedure(?)',array($_idproduct));
            //$_cate_selected = json_decode(json_encode($qr_cateselected), true);
        if(!isset($_cate_selected)){
            $_cate_selected[0]['idcategory'] = 0;
        }
        $result = DB::select('call ListAllCatByTypeProcedure(?)',array($_cattype));
        $categories = json_decode(json_encode($result), true);
        $str_ul="";$str_li="";
        if($_idcat > 0){
           $this->showCategories($categories, $_idcat,'',$_cate_selected,$_cattype);
           $s_catename = DB::select('call SelRowCategoryByIdProcedure(?)',array($_idcat));
           $r_catename = json_decode(json_encode($s_catename), true);
           foreach ($r_catename as $item) {
               $selected = ($this->compare_in_list($_cate_selected,$item['idcategory']) >0) ? 'checked' : '';
               $str_li = '<li><input type="checkbox" name="'.$namecheck.'" value="'.$item['idcategory'].'"'.$selected.' onclick="OnChangeCheckbox(this)">'.$item['namecat'];
            }
       }else{
           $this->showCategories($categories, 0,'',$_cate_selected, $_cattype);
       }      
        $str_html = '<ul class="list-check">'.$str_li.$this->main_menu."</li></ul>";
        $result = json_decode(json_encode($str_html), true);     
        return response()->json($result); 
    }
    public function ListCateByTypeId(Request $request, $_cattype='post', $_idcat=0) {
		if(isset($_cattype)&& $_cattype == 'tag'){
			$namecheck = 'list_check_tag[]';
		}else{
			$namecheck = 'list_check[]';
		}
        $_cate_selected = array();
        $_cate_selected[0]['idcategory'] = 0;
        $result = DB::select('call ListAllCatByTypeProcedure(?)',array($_cattype));
        $categories = json_decode(json_encode($result), true);
        $str_ul="";$str_li="";
        if($_idcat > 0){
           $this->showCategories($categories, $_idcat,'',$_cate_selected,$_cattype);
           $s_catename = DB::select('call SelRowCategoryByIdProcedure(?)',array($_idcat));
           $r_catename = json_decode(json_encode($s_catename), true);
           foreach ($r_catename as $item) {
               //$selected = ($this->compare_in_list($_cate_selected,$item['idcategory']) >0) ? 'checked' : '';
               $str_li = '<li><input class="checklist" type="checkbox" name="'.$namecheck.'" value="'.$item['idcategory'].'" onclick="OnChangeCheckbox(this)">'.$item['namecat'];
            }
       }else{
           $this->showCategories($categories, 0,'',$_cate_selected,$_cattype);
       } 
		if(isset($_cattype)&& $_cattype == 'tag'){
			$str_html = '<ul class="list-check">'.$str_li.$this->main_tag."</li></ul>";
		}else{
			$str_html = '<ul class="list-check">'.$str_li.$this->main_menu."</li></ul>";
		}
        
        $result = json_decode(json_encode($str_html), true);     
        return response()->json($result); 
    }
    public function listcategorybyid(Request $request, $_cattype='post', $_idcat=0 , $_idproduct = 0){
		if(isset($_cattype)&& $_cattype == 'tag'){
			$namecheck = 'list_check_tag[]';
		}else{
			$namecheck = 'list_check[]';
		}
        $qr_cateselected = DB::select('call SelCateSelectedProcedure(?)',array($_idproduct));
        $_cate_selected = json_decode(json_encode($qr_cateselected), true);
        if(isset($_cate_selected)){
            $_cate_selected[0]['idcategory'] = 0;
        }
        $result = DB::select('call ListAllCatByTypeProcedure(?)',array($_cattype));
        $categories = json_decode(json_encode($result), true);
        $str_ul="";$str_li="";
        if($_idcat > 0){
           $this->showCategories($categories, $_idcat,'',$_cate_selected, $_cattype);
           $s_catename = DB::select('call SelRowCategoryByIdProcedure(?)',array($_idcat));
           $r_catename = json_decode(json_encode($s_catename), true);
           foreach ($r_catename as $item) {
               $selected = ($this->compare_in_list($_cate_selected,$item['idcategory']) >0) ? 'checked' : '';
               $str_li = '<li><input class="checklist" type="checkbox" name="'.$namecheck.'" value="'.$item['idcategory'].'"'.$selected.' onclick="OnChangeCheckbox(this)">'.$item['namecat'];
            }
       }else{
           $this->showCategories($categories, 0,'',$_cate_selected, $_cattype = 'post');
       }      
        $str_html = '<ul class="list-check">'.$str_li.$this->main_menu."</li></ul>";
        $result = json_decode(json_encode($str_html), true);     
        return response()->json($result); 
    }
    public function showCategories($categories, $idparent = 0, $char = '', $_cate_selected, $_cattype = 'post'){
        $cate_child = array();
		if($_cattype == 'tag'){
			$name_check = "list_check_tag[]";
		}else{
			$name_check = "list_check[]";
		}
        foreach ($categories as $key => $item)
        {
            if ($item['idparent'] == $idparent)
            {
                $cate_child[] = $item;
                unset($categories[$key]);
            }
        }
        $list_cat="";       
        if ($cate_child)
        {	if($_cattype == 'tag'){
				$this->main_tag .= '<ul class="list-check">';
				foreach ($cate_child as $key => $item){
					// Hiển thị tiêu đề chuyên mục
					$_idcateproduct = $this->compare_in_list($_cate_selected,$item['idcategory']);
					$selected = ($_idcateproduct > 0) ? ' checked' : '';
					$this->main_tag .= '<li><input class="checklist" type="checkbox" name="'.$name_check.'" value="'.$item['idcategory'].'"'.$selected.' onclick="OnChangeCheckbox(this)">'.$item['namecat'];
					$this->main_tag .= '<input type="hidden" class="hidden_idcate" value="'.$_idcateproduct.'" />';
					$this->showCategories($categories, $item['idcategory'], $char.'|---', $_cate_selected);
					$this->main_tag .= '</li>';
				}
				$this->main_tag .= '</ul>';
			}else{
				$this->main_menu .= '<ul class="list-check">';
				foreach ($cate_child as $key => $item){
					// Hiển thị tiêu đề chuyên mục
					$_idcateproduct = $this->compare_in_list($_cate_selected,$item['idcategory']);
					$selected = ($_idcateproduct > 0) ? ' checked' : '';
					$this->main_menu .= '<li><input class="checklist" type="checkbox" name="'.$name_check.'" value="'.$item['idcategory'].'"'.$selected.' onclick="OnChangeCheckbox(this)">'.$item['namecat'];
					$this->main_menu .= '<input type="hidden" class="hidden_idcate" value="'.$_idcateproduct.'" />';
					$this->showCategories($categories, $item['idcategory'], $char.'|---', $_cate_selected);
					$this->main_menu .= '</li>';
				}
				$this->main_menu .= '</ul>';
			}
        }
    }
    public function compare_in_list($_cate_selected, $x = 0){
        foreach ($_cate_selected as $item)
        {
           if($x == $item['idcategory']) return $item['idcateproduct'];
        }
        return 0;
    }
    public function find_list($list_check = array(), $s=0){
        foreach ($list_check as $key=>$value) {
            if($s==$value) return $key;              
        }
        return -1;
    }
    public function trash(){
        $input = json_decode(file_get_contents('php://input'),true);
        $_idproducthasfile = $input['idproducthasfile'];       
        try {
            $qr_delete = DB::select('call DeleteProducthasFileProcedure(?)',array($_idproducthasfile));
            $result = json_decode(json_encode(array("success")), true);     
            return response()->json($result); 
        } catch (\Illuminate\Database\QueryException $ex) {
            $errors = new MessageBag(['error' => $ex->getMessage()]);
            return response()->json($errors); 
        }
    }
    
    //menu
    public function show_data_menu(){
        $result = DB::select('call ListAllCatByTypeProcedure(?)',array($_cattype));
        $categories = json_decode(json_encode($result), true);
    }
    public function show_menu() {
        
        $result = DB::select('call ListAllCatByTypeProcedure(?)',array($_cattype));
        $categories = json_decode(json_encode($result), true);
        $str_ul="";$str_li="";
        $this->show_all_menu($categories, 0,'',$_cate_selected);       
        $str_html = '<ul class="list-check">'.$str_li.$this->main_menu."</li></ul>";    
        return $str_html; 
    }

    public function show_all_menu($categories, $idparent = 0, $char = '', $_cate_selected) {
        $cate_child = array();
        foreach ($categories as $key => $item) {
            if ($item['idparent'] == $idparent) {
                $cate_child[] = $item;
                unset($categories[$key]);
            }
        }
        $list_cat="";       
        if ($cate_child) {
            $this->main_menu .= '<ul class="list-check">';
            foreach ($cate_child as $key => $item) {
                // Hiển thị tiêu đề chuyên mục
                $this->main_menu .= '<li><input type="checkbox" name="list_check[]" value="'.$item['idcategory'].'" onclick="OnChangeCheckbox(this)">'.$item['namecat'];
                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                $this->show_all_menu($categories, $item['idcategory'], $char.'|---', $_cate_selected);
                $this->main_menu .= '</li>';
            }
            $this->main_menu .= '</ul>';
        }
    }
    public function listproductbyidcate(Request $request){
        $input = json_decode(file_get_contents('php://input'),true);
        $str_lstidcate = $input['list_idcate'];
        $lst_idcate = json_decode($str_lstidcate);
        $_str_query = "";
        $urlpath = asset('/');
        if(empty($lst_idcate)){
            return response()->json($strlst);
        }
        foreach ($lst_idcate as $item) {
            $_str_query .= '('.$item->idcate.'),';
        }
        $_str_query = substr_replace($_str_query ,"", -1);
        $_str_query = "insert INTO tmp_cate(idcate) VALUES ".$_str_query;   
        try {
            $qr_lst = DB::select('call ListProductByLstIdCateProcedure(?)',array($_str_query));
            $rs_lstcate = json_decode(json_encode($qr_lst));
            $strlst = "";
            foreach ($rs_lstcate as $item) {
            //$url = action('Admin\ProductsController@edit', ['idproduct' => $item->idproduct]);
            $url = url('admin/post/'.$item->idproduct.'/edit');
            $strlst .= '<li><input class="listcheck" type="radio" value="'.$item->idproduct.'" name="listchoose"><img src="'.$urlpath.$item->urlfile.'"><label><a target="_blank" href="'.$url.'">'.$item->namepro.'</a></label><p>&nbsp;&nbsp;('.$item->price.')</p></li>';  
            }     
            return response()->json($strlst); 
        } catch (\Illuminate\Database\QueryException $ex) {
            $errors = new MessageBag(['error' => $ex->getMessage()]);
            $errors = "";
            return response()->json($errors); 
        }
    }
    public function makenewcrosstype(Request $request, $idproduct){
        $_idparentcross = $idproduct;
        $_idcrosstype = $request->get('new_id_type_cross');
        $_idproduct = $request->get('listchoose');
        $_id_status_type = 4;
        $_price = $request->get('new_cross_price');
        $_quality_sale = $request->get('new_cross_quality_sale');
        $_iduser = Auth::id();
        $_idcustomer=0; $_amount = 0; $_note = ""; $_idstore = 31;
        try {
            $qr_insert_new_cross = DB::select('call MakeCrosstypeProcedure(?,?,?,?,?,?,?,?)',array($_idproduct,$_iduser,$_idcrosstype,$_idparentcross,$_price,$_quality_sale,$_idstore,$_id_status_type));
            $rs_insert_new_cross = json_decode(json_encode($qr_insert_new_cross), true);
            $idimp = $rs_insert_new_cross[0]['idimp'];
            return redirect()->action('Admin\ProductsController@edit',$idproduct)->with('getlist',$idimp);     
        } catch (\Illuminate\Database\QueryException $ex) {
            $errors = new MessageBag(['error' => $ex->getMessage()]);
            return redirect()->action('Admin\ProductsController@edit',$idproduct)->with('getlist',$errors);
        }
        $message = "_new_id_type_cross:".$_new_id_type_cross." idproductcross:".$idproductcross;
        return redirect()->action('Admin\ProductsController@edit',$idproduct)->with('getlist',$message);
    }
    public function updateidcategory(Request $request, $_idcat=0 , $_idproduct = 0, $_checked = 0, $_hidden_idcate = 0 ){
        try {
            $qr_update = DB::select('call UpdateIdcategoryProcedure(?,?,?,?)',array($_idcat , $_idproduct,$_checked, $_hidden_idcate));
            $result = json_decode(json_encode(array("success")), true);     
            return response()->json($result); 
        } catch (\Illuminate\Database\QueryException $ex) {
            $errors = new MessageBag(['error' => $ex->getMessage()]);
            return response()->json($errors); 
        }
    }
    public function crossproduct(Request $request, $idproduct){
        $_cross_description = $request->get('cross_description');
        $_cross_short_desc = $request->get('cross_short_desc');
        $_cross_slug = $request->get('cross_slug');
        $_cross_namepro = $request->get('cross_namepro');
        $_cross_idsize = $request->get('cross_idsize');
        $_cross_idcolor = $request->get('cross_idcolor');
        $_cross_price = $request->get('cross_price');
        $_cross_sel_idposttype = $request->get('cross_sel_idposttype');
        $_cross_id_thumbnail = $request->get('cross_id_thumbnail');
        $_iduser = Auth::id();
        $_idcustomer=0; $_amount = 0; $_note = ""; $_idstore = 11; $_axis_x = 0; $_axis_y = 0; $_axis_z=0; $_id_status_type = 3;
        try {
            $product = new Products(['namepro'=> $_cross_namepro,'slug'=> $_cross_slug,'short_desc'=> $_cross_short_desc,'description'=>$_cross_description,'idsize'=>$_cross_idsize,'idcolor'=>$_cross_idcolor,'id_post_type'=>$_cross_sel_idposttype]);
            $product->save();
            $cross_idproduct = $product->idproduct;
            $_crosstype = "crosssize";
            $qr_cross_hasfile = DB::select('call CrossProductHasFileProcedure(?,?,?,?)',array($idproduct,$cross_idproduct,$_cross_id_thumbnail,$_crosstype));

            $qr_cateselected = DB::select('call SelCateSelectedProcedure(?)',array($idproduct));
            $cate_selected = json_decode(json_encode($qr_cateselected), true);
            $_list_idcat = "";
            foreach ($cate_selected as $key =>$item) {
                    $_idcategory = $item['idcategory'];
                    if($_idcategory > 0){
                        $_list_idcat .= "(".$cross_idproduct.",".$_idcategory."),";
                    }
            } 
            $_list_idcat = rtrim($_list_idcat,", ");
            $prodbelongcate = DB::select('call ProductBelongCategoryProcedure(?)',array($_list_idcat));
            $insertproduct = DB::select('call ImportProductProcedure(?,?,?,?,?,?,?,?,?,?,?)',array($cross_idproduct, $_idcustomer, $_iduser, $_amount, $_cross_price, $_note, $_idstore, $_axis_x, $_axis_y, $_axis_z, $_id_status_type));
            $message = "Add product has added ".$cross_idproduct.",".$_list_idcat;
            return redirect()->action('Admin\ProductsController@edit',$idproduct)->with('success',$message);     
        } catch (\Illuminate\Database\QueryException $ex) {
            $errors = new MessageBag(['error' => $ex->getMessage()]);
            return redirect()->action('Admin\ProductsController@edit',$idproduct)->with('success',$errors);
        }
        $message = "$cross_idproduct ".$cross_idproduct;
        return redirect()->action('Admin\ProductsController@edit',$idproduct)->with('success',$message);
    }
    //list category by id
    public function lstcategorybyid(Request $request, $idparent = 0, $_cattype = 'post'){
        $qr_categories = DB::select('call ListParentCatByTypeProcedure(?)',array($_cattype));
        $categories = json_decode(json_encode($qr_categories), true);
        $this->show_category_by_id($categories, $idparent, $char);
        $str_html = $this->main_menu;
        $result = json_decode(json_encode($str_html), true);     
        return response()->json($result);
        //return response()->json($strhtml);
    }
    public function show_category_by_id($categories, $idparent = 0, $char = '') {
        $cate_child = array();
        foreach ($categories as $key => $item) {
            if ($item['idparent'] == $idparent) {
                $cate_child[] = $item;
                unset($categories[$key]);
            }
        }
        $list_cat="";       
        if ($cate_child) {
            $this->main_menu .= '<ul class="list-check">';
            foreach ($cate_child as $key => $item) {
                // Hiển thị tiêu đề chuyên mục
                $this->main_menu .= '<li><input type="checkbox" name="list_check[]" value="'.$item['idcategory'].'">'.$item['namecat'];
                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                $this->show_category_by_id($categories, $item['idcategory'], $char.'|---');
                $this->main_menu .= '</li>';
            }
            $this->main_menu .= '</ul>';
        }
    }
    /*cateogry*/
     public function ListAllCateByTypeId($_cattype='product', $_idcat=0) {

        $_cate_selected = array();

        $_cate_selected[0]['idcategory'] = 0;

        $result = DB::select('call ListAllCatByTypeProcedure(?)',array($_cattype));

        $categories = json_decode(json_encode($result), true);

        $str_ul="";$str_li="";

        if($_idcat > 0){

           $this->showCategoriesbyid($categories, $_idcat,'',$_cate_selected);

           $s_catename = DB::select('call SelRowCategoryByIdProcedure(?)',array($_idcat));

           $r_catename = json_decode(json_encode($s_catename), true);

           foreach ($r_catename as $item) {

               //$selected = ($this->compare_in_list($_cate_selected,$item['idcategory']) >0) ? 'checked' : '';

               $str_li = '<li><input class="checklist" type="checkbox" name="list_check[]" value="'.$item['idcategory'].'">'.$item['namecat'];

            }

       }else{

           $this->showCategoriesbyid($categories, 0,'',$_cate_selected);

       }      

        $str_html = '<ul class="list-check">'.$str_li.$this->main_menu."</li></ul>";

        return $str_html; 

    }

    public function showCategoriesbyid($categories, $idparent = 0, $char = '', $_cate_selected){

        $cate_child = array();

        foreach ($categories as $key => $item)

        {

            if ($item['idparent'] == $idparent)

            {

                $cate_child[] = $item;

                unset($categories[$key]);

            }

        }

        $list_cat="";

        if ($cate_child){

            $this->main_menu .= '<ul class="list-check">';

            foreach ($cate_child as $key => $item){

                // Hiển thị tiêu đề chuyên mục

                //$selected = ($this->compare_in_list($_cate_selected,$item['idcategory']) > 0) ? ' checked' : '';
                $selected = '';

                $this->main_menu .= '<li><input class="checklist" type="checkbox" name="list_check[]" value="'.$item['idcategory'].'"'.$selected.'>'.$item['namecat'];

                $this->showCategoriesbyid($categories, $item['idcategory'], $char.'|---', $_cate_selected);

                $this->main_menu .= '</li>';

            }

            $this->main_menu .= '</ul>';

        }

    }
	public function storetag(Request $request){
		 try {
			$_id_post_type = 26;
			$idproduct = 1;
			$_idparent = 0;
			$_idcrosstype = 0;
            $_catnametype = 'tag';
			$tag = $request->tag;
            $posttype = Posttype::find($_id_post_type);
            if (isset($posttype)) {
                $_catnametype = $posttype->nametype;
            }
            $list_checks = $request->input('list_check');
            $_list_idcat="";
            if($list_checks){
                foreach ($list_checks as $item) {
                  //$iditem = explode("-",$item);
                  $idcategory = $item;
                  $_list_idcat .= "(".$idproduct.",".$idcategory."),";
                } 
                $_list_idcat = rtrim($_list_idcat,", ");     
            }else{
                $_list_idcat .= "(".$idproduct.",239)";
                //return redirect()->action('Admin\ProductsController@edit',$idproduct)->with('success',$message);
            }
            //$prodbelongcate = DB::select('call ProductBelongCategoryProcedure(?)',array($_list_idcat));
    
        } catch (\Illuminate\Database\QueryException $ex) {
            $errors = new MessageBag(['error' => $ex->getMessage()]);
            return redirect()->back()->withInput()->withErrors($errors);
        }
        $message = "success ".$_list_idcat.'-'.$_id_post_type.','.$_catnametype.' tag: '.$tag;

        return redirect()->action('Admin\PostsController@edit',[$idproduct, 'idposttype' => $_id_post_type])->with('success',$message);
	}
    
}
