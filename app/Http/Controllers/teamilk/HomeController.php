<?php

namespace App\Http\Controllers\teamilk;

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
use File;
use App\func_global;
//use App\Http\Controllers\ProductController;
class HomeController extends Controller
{
    
    public function Home(){
        try {
            //slider
            $_limit = 4;
            $_idstore = 31;
            $_limit1 = 4;
            $_idcategory_slider = 95;
            //$qr_slider1 = DB::select('call LatestProductByIdcateProcedure(?,?,?)',array($_idcategory_slider, $_idstore, $_limit1));
            //$slider1 = json_decode(json_encode($qr_slider1), true);
            //y te suc khoe
            $_idcategory_popular = 29;
            $qr_popular1 = DB::select('call LatestProductByIdcateProcedure(?,?,?)',array($_idcategory_popular, $_idstore, $_limit1 ));
            $popular1 = json_decode(json_encode($qr_popular1), true);
            //lam dep
            $_idcategory_19lkv = 35;
            $qr_popular19lkv = DB::select('call LatestProductByIdcateProcedure(?,?,?)',array($_idcategory_19lkv, $_idstore, $_limit1 ));
            $popular19lkv = json_decode(json_encode($qr_popular19lkv), true);
            //tieu dung
            $_idcategory_dc = 110;
            $qr_dong_chai = DB::select('call LatestProductByIdcateProcedure(?,?,?)',array($_idcategory_dc, $_idstore, $_limit2));
            $product_dc = json_decode(json_encode($qr_dong_chai), true);
            //gia dung
            $_idcategory_nl = 129;
            $qr_nong_lanh = DB::select('call LatestProductByIdcateProcedure(?,?,?)',array($_idcategory_nl, $_idstore, $_limit2));
            $product_nl = json_decode(json_encode($qr_nong_lanh), true);
            //sach van phong pham
            $_idcategory_mln = 134;
            $qr_may_loc_nuoc = DB::select('call LatestProductByIdcateProcedure(?,?,?)',array($_idcategory_mln, $_idstore, $_limit2));
            $product_mln = json_decode(json_encode($qr_may_loc_nuoc), true);

            $_idcategory = 6;  
            $_limit2 = 8;
            $qr_teamilk1 = DB::select('call LatestProductByIdcateProcedure(?,?,?)',array($_idcategory, $_idstore, $_limit2));
            $teamilks1 = json_decode(json_encode($qr_teamilk1), true);
            $_limit2 = 4;
            $qr_teamilk2 = DB::select('call LatestProductByIdcateProcedure(?,?,?)',array($_idcategory, $_idstore, $_limit2));
            $teamilks2 = json_decode(json_encode($qr_teamilk2), true);     
            //linh kien
            $_idcategory_lk = 17;
            $qr_linh_kien_nuoc = DB::select('call LatestProductByIdcateProcedure(?,?,?)',array($_idcategory_lk, $_idstore, $_limit2));
            $product_lk = json_decode(json_encode($qr_linh_kien_nuoc), true);
            
            $_idcate_testi = 96;
            $_idposttype = 13;
            $qr_testi = DB::select('call ProductByIdposttypeIdcateProcedure(?,?,?,?)',array($_idcate_testi, $_idstore, $_limit2, $_idposttype));
            $testimonial = json_decode(json_encode($qr_testi), true);
            //partner
            $_idcate_partner = 97;
            $_idposttype_pn = 14;
            $qr_testi = DB::select('call ProductByIdposttypeIdcateProcedure(?,?,?,?)',array($_idcate_partner, $_idstore, $_limit2, $_idposttype_pn));
            $partner = json_decode(json_encode($qr_testi), true);
            //slider
            $_idcate_slider = 95;
            $_idposttype_slider = 12;
            $qr_slider = DB::select('call ProductByIdposttypeIdcateProcedure(?,?,?,?)',array($_idcate_slider, $_idstore, $_limit2, $_idposttype_slider));
            $slider = json_decode(json_encode($qr_slider), true);
            

             //teamilk
            $qr_promotion = DB::select('call LatestPromotionProcedure(?,?)',array($_idstore, 5)); 
            $rs_promotion = json_decode(json_encode($qr_promotion), true);
            //$qr_popular = DB::select('call RelateProductProcedure');
            //$popular = json_decode(json_encode($qr_popular), true);
            //return view('teamilk.home',compact('teamilks2'));
            //$qr_LstProCombo = DB::select('call ListProductComboProcedure(?)',array($_limit));
            //$rs_LstProCombo = json_decode(json_encode($qr_LstProCombo), true);
            $qr_Lstbyposttype = DB::select('call LatestPostByCustomType(?,?)',array('post',3));
            $rs_Lstbyposttype = json_decode(json_encode($qr_Lstbyposttype), true);
            return view('teamilk.home',compact('popular1','popular19lkv','product_nl','teamilks1','teamilks2','product_dc','product_mln','product_lk','testimonial','partner','slider','rs_promotion','rs_Lstbyposttype'));
        } catch (\Illuminate\Database\QueryException $ex) {
            $errors = new MessageBag(['error' => $ex->getMessage()]);
            //return redirect()->route('teamilk.home')->with('error',$errors);
             return view('teamilk.home')->with('error',$errors);
        }
    }
}
