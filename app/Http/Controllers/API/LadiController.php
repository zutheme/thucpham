<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Console\Commands\GoogleApiConsoleCommand;

class LadiController extends Controller
{
    public $successStatus = 200;
    
    public function register(Request $request) {
    	$input = json_decode(file_get_contents('php://input'),true);
    	$_sheet = new GoogleApiConsoleCommand();
    	$result = $_sheet->handle($request, $input);
	 	return response()->json($result, $this->successStatus);
    }
    public function CreateServey(Request $request, $idstore, $idcategory, $post_type, $status_type){
        $_iduser = Auth::id();
        $_idcustomer = 0; $_amount = 0; $_price = 0; $_note = ""; $_idstore = 31; $_axis_x = 0;$_axis_y = 0; $_axis_z = 0; $message = "";
        $_id_post_type = 23;
        $_idthumbnail = 1;$_idgallery = 2;
        if(isset($idstore) && $idstore > 0){
            $_idstore = 31;
        }
        if(isset($idcategory) && $idcategory > 0){
            $_idstore = 31;
        }
        if(isset($idcategory) && $idcategory > 0){
            $_idstore = 31;
        }
        $func_global = new func_global();
        try {
            $_namepro = $request->get('title');
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
            $_amount = $request->get('amount');
            $_quality_sale = $request->get('quality_sale');
            $_idsize = $request->get('size');
            $_idcolor = $request->get('color');
            $_link = $request->get('link');
            $_feature = $request->get('feature');
            $_template = $request->get('template');
            $validator = Validator::make($request->all(), [
                'title' => 'required', 
                'body' => 'required'
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                return redirect()->route('admin.product.create')->with(compact('errors'));           
            }
            //create product
            $product = new Products(['namepro'=> $_namepro,'sku_category'=>$_sku_category, 'sku_product'=>$_sku_product, 'slug'=> $_slug,'short_desc'=> $_short_desc,'description'=>$_description,'idsize'=>$_idsize,'idcolor'=>$_idcolor,'id_post_type'=>$_id_post_type,'idstatus_type'=>$_id_status_type,'link'=>$_link,'feature'=>$_feature,'template'=>$_template,'post_author'=>$_iduser]);
            $product->save();
            $idproduct = $product->idproduct;
            $list_checks = $request->input('list_check');
            $_list_idcat="";
            if($list_checks){
                foreach ($list_checks as $item) {
                  $idcategory = $item;
                  $_list_idcat .= "(".$idproduct.",".$idcategory."),";
                } 
                $_list_idcat = rtrim($_list_idcat,", ");     
            }else{
                $_list_idcat .= "(".$idproduct.",109),";
            }
            $prodbelongcate = DB::select('call ProductBelongCategoryProcedure(?)',array($_list_idcat));
             if($request->hasfile('thumbnail')) {
                $file = $request->file('thumbnail');
                //$_name_origin = $file->getClientOriginalName();
                $_name_origin = '';
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
                
                DB::select('call ProducthasFileProcedure(?,?,?,?,?,?)',array($_urlfile, $_name_origin, $_namefile , $_typefile, $idproduct,$_idthumbnail));                
             }    
            
             if($request->hasfile('file_attach')) {
                foreach($request->file('file_attach') as $file) {
                    //$_name_origin = $file->getClientOriginalName();
                    $_name_origin = '';
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
            $_catnametype = 'store'; $_id_status_type=4; $_prev_id = 0;
            $qr_insertproduct = DB::select('call InitImportProductProcedure(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array($idproduct,$_idcustomer,$_iduser,0,0,$_amount,$_price_import,$_price,$_quality_sale,$_note,$_axis_x,$_axis_y,$_axis_z,$_id_status_type,$_catnametype,$_shortname, $_prev_id));
            $rs_insertproduct = json_decode(json_encode($qr_insertproduct), true);
            $_idcrosstype = $request->get('idcrosstype'); 
            $_idparent = $request->get('idparent');
            if( $_idcrosstype > 0 && $_idparent > 0){
                $_price_sale = $request->get('price_sale');
                $_quality_sale = $request->get('quality_sale');
                $insertproduct = DB::select('call ImportByCrossParentProcedure(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array($idproduct, $_idcustomer, $_iduser, $_idcrosstype, $_idparent, $_amount, $_price_import, $_price_sale, $_quality_sale, $_note, $_axis_x, $_axis_y, $_axis_z, $_id_status_type, $_catnametype, $_shortname ));
            }          
        } catch (\Illuminate\Database\QueryException $ex) {
            $errors = new MessageBag(['error' => $ex->getMessage()]);
            return redirect()->back()->withInput()->withErrors($errors);
        }
        $message = "success ".$_list_idcat.','.$_iduser;
        return redirect()->action('Admin\ProductsController@edit',$idproduct)->with('success',$message);
    }
}
