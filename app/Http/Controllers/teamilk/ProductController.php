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

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function error_404(){
		
		$idmenu1 = 1;
        $qr_menu1 = DB::select('call ListItemCateByIdMenuProcedure(?)',array($idmenu1));
        $rs_menu1 = json_decode(json_encode($qr_menu1), true);

        $idmenu2 = 2;
        $qr_menu2 = DB::select('call ListItemCateByIdMenuProcedure(?)',array($idmenu2));
        $rs_menu2 = json_decode(json_encode($qr_menu2), true);
        $idmenu3 = 3;
        $qr_menu3 = DB::select('call ListItemCateByIdMenuProcedure(?)',array($idmenu3));
        $rs_menu3 = json_decode(json_encode($qr_menu3), true);
		$_idcate_logo_footer = 182;
        $qr_logo_footer = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_logo_footer, 'option', 1 ));
        $rs_logo_footer = json_decode(json_encode($qr_logo_footer), true);

        $_idcate_logo_header = 187;
        $qr_logo_header = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_logo_header, 'option', 1 ));
        $rs_logo_header = json_decode(json_encode($qr_logo_header), true);
		
		$_idcate_you_foot = 173;
        $qr_you_foot = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_you_foot, 'post', 6 ));
        $rs_you_foot = json_decode(json_encode($qr_you_foot), true);
		
		$qr_listpostpular = DB::select('call listpopular(?,?,?)',array('view','post',5));
        $rs_listpostpular = json_decode(json_encode($qr_listpostpular), true);
		
		return view('teamilk.product.error-404',compact('rs_menu1','rs_menu2','rs_menu3','rs_you_foot', 'rs_logo_footer','rs_logo_header'));
	}
    public function show($idproduct=252){
        $_namecattype="product";
        $iduser = Auth::id();
        $_idstore = 31;
        $template = '';
        //$qr_product = DB::select('call SelProductByIdProcedure(?,?,?)',array($idproduct,$_idstore,$iduser));
        //$qr_product = DB::select('call SelCustomPostCateByIdpostProcedure(?,?,?)',array($idproduct,$_idstore,$iduser));
        //$qr_product = DB::select('call SelCustomPostByIdpostProcedure(?,?,?)',array($idproduct,$_idstore,$iduser));
		$qr_product = DB::select('call ShowProductProcedure(?,?,?)',array($idproduct,$_idstore,$iduser));
        $product = json_decode(json_encode($qr_product), true);
        $qr_cateselected = DB::select('call SelCateSelectedProcedure(?)',array($idproduct));
        $cate_selected = json_decode(json_encode($qr_cateselected), true);
        
        if(isset($product[0]['nametype'])){
            $_namecattype = $product[0]['nametype'];
            $template = $product[0]['template'];
        }
        $qr_cat_product = DB::select('call ListAllCatByTypeProcedure(?)',array($_namecattype));
        $rs_cat_product = json_decode(json_encode($qr_cat_product), true); 
        if($_namecattype == 'page' && $template == 'home'){
           return $this->Home($product, $_namecattype, $rs_cat_product, $cate_selected);
        }else if($_namecattype == 'video'){
            return $this->single_video($idproduct);
        }
        $qr_cateselected = DB::select('call SelCateSelectedProcedure(?)',array($idproduct));
        $cate_selected = json_decode(json_encode($qr_cateselected), true);
        $qr_size = DB::select('call SelAllSizeProcedure');
        $size = json_decode(json_encode($qr_size), true);
        
        $_idgallery = 2;
        $qr_gallery = DB::select('call SelGalleryProcedure(?,?)',array($idproduct,$_idgallery));
        $gallery = json_decode(json_encode($qr_gallery), true);
        $qr_sel_cross_byidproduct = DB::select('call SelProductCrossByIdProcedure(?)',array($idproduct));
        $sel_cross_byidproduct = json_decode(json_encode($qr_sel_cross_byidproduct), true);
        $sel_relative_byidproduct = '';
        $categories = '';
        $idmenu2 = 2;
        $qr_menu2 = DB::select('call ListItemCateByIdMenuProcedure(?)',array($idmenu2));
        $rs_menu2 = json_decode(json_encode($qr_menu2), true);
        $idmenu3 = 3;
        $qr_menu3 = DB::select('call ListItemCateByIdMenuProcedure(?)',array($idmenu3));
        $rs_menu3 = json_decode(json_encode($qr_menu3), true);

        $_idcate_banner_left = 174;
        $_idposttype_banner = 17;
        $_limit_banner_left = 1;
        $qr_banner_left = DB::select('call ProductByIdposttypeIdcateProcedure(?,?,?,?)',array($_idcate_banner_left, $_idstore, $_limit_banner_left, $_idposttype_banner));
        $banner_left = json_decode(json_encode($qr_banner_left), true);

        $_idcate_banner_right = 174;
        $_idposttype_banner = 17;
        $_limit_banner_right = 1;
        $qr_banner_right = DB::select('call ProductByIdposttypeIdcateProcedure(?,?,?,?)',array($_idcate_banner_right, $_idstore, $_limit_banner_right, $_idposttype_banner));
        $banner_right = json_decode(json_encode($qr_banner_right), true);

        $_idcate_banner_bottom = 176;
        $_idposttype_banner = 17;
        $_limit_banner_bottom = 1;
        $qr_banner_bottom  = DB::select('call ProductByIdposttypeIdcateProcedure(?,?,?,?)',array($_idcate_banner_bottom , $_idstore, $_limit_banner_bottom , $_idposttype_banner));
        $banner_bottom  = json_decode(json_encode($qr_banner_bottom), true);  
         //latest news
        $qr_Lstbyposttype = DB::select('call LatestPostExcludeCate(?,?)',array('slider',3));
        $rs_Lstbyposttype = json_decode(json_encode($qr_Lstbyposttype), true);
        /*change*/
        $idmenu1 = 1;
        $qr_menu1 = DB::select('call ListItemCateByIdMenuProcedure(?)',array($idmenu1));
        $rs_menu1 = json_decode(json_encode($qr_menu1), true);

        $idmenu2 = 2;
        $qr_menu2 = DB::select('call ListItemCateByIdMenuProcedure(?)',array($idmenu2));
        $rs_menu2 = json_decode(json_encode($qr_menu2), true);
        $idmenu3 = 3;
        $qr_menu3 = DB::select('call ListItemCateByIdMenuProcedure(?)',array($idmenu3));
        $rs_menu3 = json_decode(json_encode($qr_menu3), true);

        $qr_listpostpular = DB::select('call listpopular(?,?,?)',array('view','post',5));
        $rs_listpostpular = json_decode(json_encode($qr_listpostpular), true);

        $_idcate_you_foot = 173;
        $qr_you_foot = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_you_foot, 'post', 6 ));
        $rs_you_foot = json_decode(json_encode($qr_you_foot), true);

        $_idcate_tuvan = 179;
        $qr_tuvan = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_tuvan, 'banner', 1 ));
        $rs_tuvan = json_decode(json_encode($qr_tuvan), true);

        $_idcate_banner_right = 175;
        $qr_banner_right = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_banner_right, 'banner', 1 ));
        $rs_banner_right = json_decode(json_encode($qr_banner_right), true);

        $qr_feature = DB::select('call ListCustomPostByFeature(?,?)',array('post', 5 ));
        $rs_feature = json_decode(json_encode($qr_feature), true);

        $_idcate_logo_footer = 182;
        $qr_logo_footer = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_logo_footer, 'option', 1 ));
        $rs_logo_footer = json_decode(json_encode($qr_logo_footer), true);

        $_idcate_logo_header = 187;
        $qr_logo_header = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_logo_header, 'option', 1 ));
        $rs_logo_header = json_decode(json_encode($qr_logo_header), true);

        $_idcate_services = 105;
        $qr_services = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_services, 'post', 9 ));
        $rs_services = json_decode(json_encode($qr_services), true);

        $_idcate_testimonial = 96;
        $qr_testimonial = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_testimonial, 'testimonial', 1 ));
        $rs_testimonial = json_decode(json_encode($qr_testimonial), true);

        $_idcate_tintuc = 153;
        //$qr_tintuc = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_tintuc, 'post', 5 ));
        $qr_tintuc = DB::select('call ListCustomPostAuthorbyidcategory(?,?,?)',array($_idcate_tintuc, 'post', 5 ));
        $rs_tintuc = json_decode(json_encode($qr_tintuc), true);
		//$_idcate_bestseller = 28;
		//$qr_bestseller = DB::select('call LatestProductByIdcateProcedure(?,?,?)',array($_idcate_bestseller, $_idstore, 4));
		//$rs_bestseller = json_decode(json_encode($qr_bestseller), true);

		//$qr_feature = DB::select('call ListCustomPostByFeature(?,?)',array('product', 4 ));
		//$rs_feature = json_decode(json_encode($qr_feature), true);
		
		$qr_latestproduct = DB::select('call LatestProductProcedure(?,?)',array('product', 4 ));
		$rs_latestproduct = json_decode(json_encode($qr_latestproduct), true);
        return view('teamilk.product.show',compact('rs_latestproduct','rs_you_foot','sel_relative_byidproduct','gallery','product','categories','idproduct','sel_cross_byidproduct','cate_selected','rs_cat_product', 'rs_menu1','rs_menu2','rs_menu3','banner_left','banner_right','banner_bottom','rs_Lstbyposttype','rs_listpostpular','rs_tuvan','rs_banner_right','rs_feature','rs_logo_footer','rs_logo_header','rs_services','rs_testimonial','rs_tintuc'));
    }
     public function Home($product, $_namecattype='product', $rs_cat_product, $cate_selected){
        try {
            //slider
            $_limit = 4;
            $_idstore = 31;
            $_limit1 = 4;
            $_idcategory_slider = 95;
            $_limit2 = 4;
           //slider
            //$qr_Lstbyposttype = DB::select('call LatestPostExcludeCate(?,?)',array('slider',3));
            //$rs_Lstbyposttype = json_decode(json_encode($qr_Lstbyposttype), true);
            //bestseller
            $_idcate_bestseller = 28;
            $qr_bestseller = DB::select('call LatestProductByIdcateProcedure(?,?,?)',array($_idcate_bestseller, $_idstore, 4));
            $rs_bestseller = json_decode(json_encode($qr_bestseller), true);

            $qr_feature = DB::select('call ListCustomPostByFeature(?,?)',array('product', 4 ));
            $rs_feature = json_decode(json_encode($qr_feature), true);
			
			$qr_latestproduct = DB::select('call LatestProductProcedure(?,?)',array('product', 4 ));
            $rs_latestproduct = json_decode(json_encode($qr_latestproduct), true);
			
            $idmenu1 = 1;
            $qr_menu1 = DB::select('call ListItemCateByIdMenuProcedure(?)',array($idmenu1));
            $rs_menu1 = json_decode(json_encode($qr_menu1), true);

            $idmenu2 = 2;
            $qr_menu2 = DB::select('call ListItemCateByIdMenuProcedure(?)',array($idmenu2));
            $rs_menu2 = json_decode(json_encode($qr_menu2), true);
            $idmenu3 = 3;
            $qr_menu3 = DB::select('call ListItemCateByIdMenuProcedure(?)',array($idmenu3));
            $rs_menu3 = json_decode(json_encode($qr_menu3), true);

            $qr_listpostpular = DB::select('call listpopular(?,?,?)',array('view','post',3));
            $rs_listpostpular = json_decode(json_encode($qr_listpostpular), true);
            
            $_idcate_logo_footer = 182;
            $qr_logo_footer = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_logo_footer, 'option', 1 ));
            $rs_logo_footer = json_decode(json_encode($qr_logo_footer), true);

            $_idcate_logo_header = 187;
            $qr_logo_header = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_logo_header, 'option', 1 ));
            $rs_logo_header = json_decode(json_encode($qr_logo_header), true);

            $_idcate_testimonial = 96;
            $qr_testimonial = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_testimonial, 'testimonial', 4 ));
            $rs_testimonial = json_decode(json_encode($qr_testimonial), true);
			$_idcate_you_foot = 173;
			$qr_you_foot = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_you_foot, 'post', 6 ));
			$rs_you_foot = json_decode(json_encode($qr_you_foot), true);
			
            return view('teamilk.product.show',compact('rs_listpostpular','rs_bestseller','rs_latestproduct','rs_logo_footer','product','rs_feature','rs_menu1','rs_menu2','rs_menu3','rs_logo_footer','rs_logo_header'));
            
        } catch (\Illuminate\Database\QueryException $ex) {
            $errors = new MessageBag(['error' => $ex->getMessage()]);
             return view('teamilk.product.show')->with('error',$errors);
        }
    }
    /*single video*/
    public function single_video($idproduct){
        $_namecattype="post";
        $iduser = Auth::id();
        $_idstore = 31;
        $template = '';
        $qr_product = DB::select('call SelCustomPostCateByIdpostProcedure(?,?,?)',array($idproduct,$_idstore,$iduser));
        $product = json_decode(json_encode($qr_product), true);
        $qr_cateselected = DB::select('call SelCateSelectedProcedure(?)',array($idproduct));
        $cate_selected = json_decode(json_encode($qr_cateselected), true);
        /*change*/
        $idmenu1 = 1;
        $qr_menu1 = DB::select('call ListItemCateByIdMenuProcedure(?)',array($idmenu1));
        $rs_menu1 = json_decode(json_encode($qr_menu1), true);

        $idmenu2 = 2;
        $qr_menu2 = DB::select('call ListItemCateByIdMenuProcedure(?)',array($idmenu2));
        $rs_menu2 = json_decode(json_encode($qr_menu2), true);
        $idmenu3 = 3;
        $qr_menu3 = DB::select('call ListItemCateByIdMenuProcedure(?)',array($idmenu3));
        $rs_menu3 = json_decode(json_encode($qr_menu3), true);

        $qr_listvideopular = DB::select('call listpopular(?,?,?)',array('view','video',5));
        $rs_listvideopular = json_decode(json_encode($qr_listvideopular), true);

        $qr_listpostpular = DB::select('call listpopular(?,?,?)',array('view','post',5));
        $rs_listpostpular = json_decode(json_encode($qr_listpostpular), true);

        $_idcate_you_foot = 173;
        $qr_you_foot = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_you_foot, 'post', 6 ));
        $rs_you_foot = json_decode(json_encode($qr_you_foot), true);

        $_idcate_tuvan = 179;
        $qr_tuvan = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_tuvan, 'banner', 1 ));
        $rs_tuvan = json_decode(json_encode($qr_tuvan), true);

        $_idcate_banner_right = 175;
        $qr_banner_right = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_banner_right, 'banner', 1 ));
        $rs_banner_right = json_decode(json_encode($qr_banner_right), true);

        $qr_feature = DB::select('call ListCustomPostByFeature(?,?)',array('video', 5 ));
        $rs_feature = json_decode(json_encode($qr_feature), true);

        $_idcate_logo_footer = 182;
        $qr_logo_footer = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_logo_footer, 'option', 1 ));
        $rs_logo_footer = json_decode(json_encode($qr_logo_footer), true);

        $_idcate_logo_header = 187;
        $qr_logo_header = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_logo_header, 'option', 1 ));
        $rs_logo_header = json_decode(json_encode($qr_logo_header), true);

        $qr_Lstbyposttype_video = DB::select('call LatestPostExcludeCate(?,?)',array('video',10));
        $rs_Lstbyposttype_video = json_decode(json_encode($qr_Lstbyposttype_video), true);

        $qr_cat_product = DB::select('call ListAllCatByTypeProcedure(?)',array($_namecattype));
        $rs_cat_product = json_decode(json_encode($qr_cat_product), true);

        $qr_Lstbyposttype_video = DB::select('call LatestPostExcludeCate(?,?)',array('video',10));
        $rs_youtube = json_decode(json_encode($qr_Lstbyposttype_video), true);
        return view('teamilk.product.show',compact('rs_listvideopular','product','idproduct','cate_selected','rs_cat_product', 'rs_menu1','rs_menu2','rs_menu3','rs_Lstbyposttype_video','rs_you_foot','rs_tuvan','rs_banner_right','rs_feature','rs_logo_footer','rs_logo_header','rs_listpostpular','rs_youtube'));
    }
    /*end single video*/
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showposttype($_namecattype, $idproduct){
        $iduser = Auth::id();
        $_idstore = 31;
        $qr_cateselected = DB::select('call SelCateSelectedProcedure(?)',array($idproduct));
        $cate_selected = json_decode(json_encode($qr_cateselected), true);
        $qr_size = DB::select('call SelAllSizeProcedure');
        $size = json_decode(json_encode($qr_size), true);
        $qr_cat_product = DB::select('call ListAllCatByTypeProcedure(?)',array($_namecattype));
        $rs_cat_product = json_decode(json_encode($qr_cat_product), true);
        $qr_product = DB::select('call SelProductByIdProcedure(?,?,?)',array($idproduct,$_idstore,$iduser));
        $product = json_decode(json_encode($qr_product), true);
        $_idgallery = 2;
        $qr_gallery = DB::select('call SelGalleryProcedure(?,?)',array($idproduct,$_idgallery));
        $gallery = json_decode(json_encode($qr_gallery), true);
        $qr_sel_cross_byidproduct = DB::select('call SelProductCrossByIdProcedure(?)',array($idproduct));
        $sel_cross_byidproduct = json_decode(json_encode($qr_sel_cross_byidproduct), true);
        $sel_relative_byidproduct = '';
        $categories = '';
        return view('teamilk.product.show',compact('sel_relative_byidproduct','gallery','product','categories','idproduct','sel_cross_byidproduct','cate_selected','rs_cat_product'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    //show sub category
    public function change_price_idproduct(){
        $input = json_decode(file_get_contents('php://input'),true);
        $_idproduct = $input['idproduct'];       
        try {
            $qr_price = DB::select('call ChangePriceByIdProductProcedure(?)',array($_idproduct));
            $rs_price = json_decode(json_encode($qr_price), true);     
            return response()->json($rs_price); 
        } catch (\Illuminate\Database\QueryException $ex) {
            $errors = new MessageBag(['error' => $ex->getMessage()]);
            return response()->json($errors); 
        }
    }
    public function listviewproductbyidcate($_idcategory){
        $_page = 1; $_limit = 100; $_idstore = 31;
        try {
            $qr_cat_product = DB::select('call ListAllCatByTypeProcedure(?)',array('product'));
            $rs_cat_product = json_decode(json_encode($qr_cat_product), true);
            $iduser = Auth::id();
            $qr_lpro = DB::select('call ListProductByIdcateProcedure(?,?,?,?,?)',array($_idcategory, $_page, $_idstore, $_limit, $iduser));
            $rs_lpro = json_decode(json_encode($qr_lpro), true);
            $idmenu2 = 2;
            $qr_menu2 = DB::select('call ListItemCateByIdMenuProcedure(?)',array($idmenu2));
            $rs_menu2 = json_decode(json_encode($qr_menu2), true);
            $idmenu3 = 3;
            $qr_menu3 = DB::select('call ListItemCateByIdMenuProcedure(?)',array($idmenu3));
            $rs_menu3 = json_decode(json_encode($qr_menu3), true);     
            return view('teamilk.product.index')->with(compact('rs_lpro','_idcategory','rs_cat_product','iduser','rs_menu3','rs_menu2'));
        } catch (\Illuminate\Database\QueryException $ex) {
            $errors = new MessageBag(['error' => $ex->getMessage()]);
            return view('teamilk.product.index')->with('error',$errors);
        }
    }
    public function ListTypePostbyIdcate($_idcategory,$_posttype){
        $_page = 1; $_limit = 100; $_idstore = 31;
        $_limit_index = 9;
        if($_posttype=='video'){
            $_limit_index = 10;
        }
        try {
            
            $qr_cat_product = DB::select('call ListAllCatByTypeProcedure(?)', array($_posttype));
            $rs_cat_product = json_decode(json_encode($qr_cat_product), true);
            $iduser = Auth::id();
            //$qr_lpro = DB::select('call ListProductByIdcateProcedure(?,?,?,?,?)',array($_idcategory, $_page, $_idstore, $_limit, $iduser));
            $qr_lpro = DB::select('call ListIndexCustomPostByIdcateProcedure(?,?,?,?)',array($_idcategory, $_page, $_limit_index, $iduser));
            $rs_lpro = json_decode(json_encode($qr_lpro), true);
          
            /*change*/
            $idmenu1 = 1;
            $qr_menu1 = DB::select('call ListItemCateByIdMenuProcedure(?)',array($idmenu1));
            $rs_menu1 = json_decode(json_encode($qr_menu1), true);

            $idmenu2 = 2;
            $qr_menu2 = DB::select('call ListItemCateByIdMenuProcedure(?)',array($idmenu2));
            $rs_menu2 = json_decode(json_encode($qr_menu2), true);
            $idmenu3 = 3;
            $qr_menu3 = DB::select('call ListItemCateByIdMenuProcedure(?)',array($idmenu3));
            $rs_menu3 = json_decode(json_encode($qr_menu3), true);

            $qr_listpostpular = DB::select('call listpopular(?,?,?)',array('view','post',3));
            $rs_listpostpular = json_decode(json_encode($qr_listpostpular), true);

            // $_idcate_you_foot = 180;
            // $qr_you_foot = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_you_foot, 'video', 6 ));
            // $rs_you_foot = json_decode(json_encode($qr_you_foot), true);
            $_idcate_you_foot = 173;
            $qr_you_foot = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_you_foot, 'post', 6 ));
            $rs_you_foot = json_decode(json_encode($qr_you_foot), true);

            $_idcate_tuvan = 179;
            $qr_tuvan = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_tuvan, 'banner', 1 ));
            $rs_tuvan = json_decode(json_encode($qr_tuvan), true);

            $_idcate_logo_footer = 182;
            $qr_logo_footer = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_logo_footer, 'option', 1 ));
            $rs_logo_footer = json_decode(json_encode($qr_logo_footer), true);

            $_idcate_logo_header = 187;
            $qr_logo_header = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_logo_header, 'option', 1 ));
            $rs_logo_header = json_decode(json_encode($qr_logo_header), true);

            $_idcate_banner_right = 175;
            $qr_banner_right = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_banner_right, 'banner', 1 ));
            $rs_banner_right = json_decode(json_encode($qr_banner_right), true);

            $qr_feature = DB::select('call ListCustomPostByFeature(?,?)',array('post', 5 ));
            $rs_feature = json_decode(json_encode($qr_feature), true);

            $_idcate_tintuc = 153;
            //$qr_tintuc = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_tintuc, 'post', 5 ));
            $qr_tintuc = DB::select('call ListCustomPostAuthorbyidcategory(?,?,?)',array($_idcate_tintuc, 'post', 5 ));
            $rs_tintuc = json_decode(json_encode($qr_tintuc), true);

            return view('teamilk.product.index')->with(compact('rs_you_foot','rs_feature','rs_listpostpular','rs_lpro','_idcategory','rs_cat_product','iduser','rs_menu2','rs_menu3','rs_menu1','rs_banner_right','rs_tuvan','rs_logo_footer','rs_logo_header','rs_tintuc'));

        } catch (\Illuminate\Database\QueryException $ex) {
            $errors = new MessageBag(['error' => $ex->getMessage()]);
            return view('teamilk.product.index')->with('error',$errors);
        }
    }

    public function LatestProductByIdcate($_idcategory,$_limit){
        try {
            $qr_lpro = DB::select('call LatestProductByIdcateProcedure(?,?)',array($_idcategory, $_limit));
            //$qr_lpro = DB::select('call ListViewProductByIdCateProcedure(?)',array($_idcategory));
            $rs_lpro = json_decode(json_encode($qr_lpro), true);     
             return view('teamilk.product.index')->with(compact('rs_lpro','_idcategory'));
        } catch (\Illuminate\Database\QueryException $ex) {
            $errors = new MessageBag(['error' => $ex->getMessage()]);
            return view('teamilk.product.index')->with('error',$errors);
        }
    }
    public function listproductbypage($_idcategory = 0, $_page = 1){
        try {
             $_limit = 100; $_idstore = 31;
             $iduser = Auth::id();
             $qr_cat_product = DB::select('call ListAllCatByTypeProcedure(?)',array('product'));
             $rs_cat_product = json_decode(json_encode($qr_cat_product), true);
             $qr_lpro = DB::select('call ListProductByIdcateProcedure(?,?,?,?,?)',array($_idcategory,$_page,$_idstore,$_limit,$iduser));
            //$qr_lpro = DB::select('call ListViewProductByIdCateProcedure(?)',array($_idcategory));
            $rs_lpro = json_decode(json_encode($qr_lpro), true);
             $idmenu2 = 2;
            $qr_menu2 = DB::select('call ListItemCateByIdMenuProcedure(?)',array($idmenu2));
            $rs_menu2 = json_decode(json_encode($qr_menu2), true);
            $idmenu3 = 3;
            $qr_menu3 = DB::select('call ListItemCateByIdMenuProcedure(?)',array($idmenu3));
            $rs_menu3 = json_decode(json_encode($qr_menu3), true);      
             return view('teamilk.product.index')->with(compact('rs_lpro','_idcategory','rs_cat_product'));
        } catch (\Illuminate\Database\QueryException $ex) {
            $errors = new MessageBag(['error' => $ex->getMessage()]);
            return view('teamilk.product.index')->with('error',$errors);
        }
    }
     public function slugbypage($_slugcate, $_page = 1){
        try {
             $_limit = 100; $_idstore = 31;
             $iduser = Auth::id();
             $rs_lpro = array();
             $_idcategory = 0;
             $rs_cat_product = array();
             $_limit_index = 9;
             $qr_getidcate = DB::select('call SelInfoCategoryBySlugProcedure(?)',array($_slugcate));
             $rs_getidcate = json_decode(json_encode($qr_getidcate), true);
             $_idcategory = 0;
             $_namecattype = "product";
             $_posttype = "product";
            if(isset($rs_getidcate) && isset($rs_getidcate[0]['idcategory']) && $rs_getidcate[0]['idcategory'] > 0){
                $_idcategory = $rs_getidcate[0]['idcategory'];
                $_posttype = $rs_getidcate[0]['catnametype'];
                $qr_cat_product = DB::select('call ListAllCatByTypeProcedure(?)',array($_posttype));
                $rs_cat_product = json_decode(json_encode($qr_cat_product), true);
                 if($_posttype=='video'){
                    $_limit_index = 10;
                }
                $qr_lpro = DB::select('call ListIndexCustomPostByIdcateProcedure(?,?,?,?)',array($_idcategory, $_page, $_limit_index, $iduser));
                $rs_lpro = json_decode(json_encode($qr_lpro), true); 
            }
            $qr_listpostpular = DB::select('call listpopular(?,?,?)',array('view','post',3));
            $rs_listpostpular = json_decode(json_encode($qr_listpostpular), true);

            $_idcate_you_foot = 173;
            $qr_you_foot = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_you_foot, 'video', 6 ));
            $rs_you_foot = json_decode(json_encode($qr_you_foot), true);

            $_idcate_tuvan = 179;
            $qr_tuvan = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_tuvan, 'banner', 1 ));
            $rs_tuvan = json_decode(json_encode($qr_tuvan), true);

            $_idcate_banner_right = 175;
            $qr_banner_right = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_banner_right, 'banner', 1 ));
            $rs_banner_right = json_decode(json_encode($qr_banner_right), true);

            $qr_feature = DB::select('call ListCustomPostByFeature(?,?)',array('post', 5 ));
            $rs_feature = json_decode(json_encode($qr_feature), true);

            $idmenu1 = 1;
            $qr_menu1 = DB::select('call ListItemCateByIdMenuProcedure(?)',array($idmenu1));
            $rs_menu1 = json_decode(json_encode($qr_menu1), true);
            $idmenu2 = 2;
            $qr_menu2 = DB::select('call ListItemCateByIdMenuProcedure(?)',array($idmenu2));
            $rs_menu2 = json_decode(json_encode($qr_menu2), true);
            $idmenu3 = 3;
            $qr_menu3 = DB::select('call ListItemCateByIdMenuProcedure(?)',array($idmenu3));
            $rs_menu3 = json_decode(json_encode($qr_menu3), true);  

            $_idcate_logo_footer = 182;
            $qr_logo_footer = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_logo_footer, 'option', 1 ));
            $rs_logo_footer = json_decode(json_encode($qr_logo_footer), true);

            $_idcate_logo_header = 187;
            $qr_logo_header = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_logo_header, 'option', 1 ));
            $rs_logo_header = json_decode(json_encode($qr_logo_header), true);

             $_idcate_tintuc = 153;
            //$qr_tintuc = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_tintuc, 'post', 5 ));
            $qr_tintuc = DB::select('call ListCustomPostAuthorbyidcategory(?,?,?)',array($_idcate_tintuc, 'post', 5 ));
            $rs_tintuc = json_decode(json_encode($qr_tintuc), true);

            return view('teamilk.product.index')->with(compact('rs_lpro','_idcategory','rs_cat_product','rs_listpostpular','rs_you_foot','rs_tuvan','rs_banner_right','rs_feature','rs_menu1','rs_menu1','rs_menu2','rs_menu3','iduser','rs_logo_footer','rs_logo_header','rs_tintuc'));
        } catch (\Illuminate\Database\QueryException $ex) {
            $errors = new MessageBag(['error' => $ex->getMessage()]);
            return view('teamilk.product.index')->with('error',$errors);
        }
    }

    //search page
     public function searchform(Request $request, $_patterm='', $_page = 1){
        try {
                $_limit = 9; $_idstore = 31;
                $iduser = Auth::id();
                $_posttype = 'post';
                $rq_posttype = $request->get('posttype');
                if(isset($rq_posttype) && $rq_posttype != 'post'){
                    $_posttype = $rq_posttype;
                }
                $_namecattype = $_posttype;
                if(isset($_patterm) && $_patterm == 's'){
                    $_patterm = $request->get('keyword');
                }
                $qr_cat_product = DB::select('call ListAllCatByTypeProcedure(?)',array($_posttype));
                $rs_cat_product = json_decode(json_encode($qr_cat_product), true);
                
                $qr_lpro = DB::select('call search_product(?,?,?,?,?)',array($_patterm, $_page, $iduser, $_limit, $_posttype));
                $rs_lpro = json_decode(json_encode($qr_lpro), true); 
                
                $qr_listpostpular = DB::select('call listpopular(?,?,?)',array('view','post',3));
                $rs_listpostpular = json_decode(json_encode($qr_listpostpular), true);

                $_idcate_you_foot = 173;
                $qr_you_foot = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_you_foot, 'post', 6 ));
                $rs_you_foot = json_decode(json_encode($qr_you_foot), true);

                $_idcate_tuvan = 179;
                $qr_tuvan = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_tuvan, 'banner', 1 ));
                $rs_tuvan = json_decode(json_encode($qr_tuvan), true);

                $_idcate_banner_right = 175;
                $qr_banner_right = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_banner_right, 'banner', 1 ));
                $rs_banner_right = json_decode(json_encode($qr_banner_right), true);

                $qr_feature = DB::select('call ListCustomPostByFeature(?,?)',array('post', 5 ));
                $rs_feature = json_decode(json_encode($qr_feature), true);

                $idmenu1 = 1;
                $qr_menu1 = DB::select('call ListItemCateByIdMenuProcedure(?)',array($idmenu1));
                $rs_menu1 = json_decode(json_encode($qr_menu1), true);
                $idmenu2 = 2;
                $qr_menu2 = DB::select('call ListItemCateByIdMenuProcedure(?)',array($idmenu2));
                $rs_menu2 = json_decode(json_encode($qr_menu2), true);
                $idmenu3 = 3;
                $qr_menu3 = DB::select('call ListItemCateByIdMenuProcedure(?)',array($idmenu3));
                $rs_menu3 = json_decode(json_encode($qr_menu3), true);  

                $_idcate_logo_footer = 182;
                $qr_logo_footer = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_logo_footer, 'option', 1 ));
                $rs_logo_footer = json_decode(json_encode($qr_logo_footer), true);

                $_idcate_logo_header = 187;
                $qr_logo_header = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_logo_header, 'option', 1 ));
                $rs_logo_header = json_decode(json_encode($qr_logo_header), true);

            return view('teamilk.product.search')->with(compact('rs_lpro','rs_cat_product','rs_listpostpular','rs_you_foot','rs_tuvan','rs_banner_right','rs_feature','rs_menu1','rs_menu1','rs_menu2','rs_menu3','iduser','rs_logo_footer','rs_logo_header','_patterm','_posttype'));
        } catch (\Illuminate\Database\QueryException $ex) {
            $errors = new MessageBag(['error' => $ex->getMessage()]);
            return view('teamilk.product.search')->with('error',$errors);
        }
    }
     public function searchbypage(Request $request, $_page = 1, $_patterm = ''){
        try {
                $_limit = 9; $_idstore = 31;
                $iduser = Auth::id();
                $_namecattype = "post";
                $_posttype = "post";
                $_keyword = $request->get('keyword');
                if(isset($_patterm) && !empty($_patterm)){
                    $_keyword = $_patterm;
                }
                $qr_cat_product = DB::select('call ListAllCatByTypeProcedure(?)',array($_posttype));
                $rs_cat_product = json_decode(json_encode($qr_cat_product), true);
                //search_product`(IN `_patterm` text, IN `_page` int, IN `_iduser` INT, IN `_limit` INT)
                $qr_lpro = DB::select('call search_product(?,?,?,?)',array($_keyword, $_page, $iduser, $_limit));
                $rs_lpro = json_decode(json_encode($qr_lpro), true); 
                
                $qr_listpostpular = DB::select('call listpopular(?,?,?)',array('view','post',5));
                $rs_listpostpular = json_decode(json_encode($qr_listpostpular), true);

                $_idcate_you_foot = 173;
                $qr_you_foot = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_you_foot, 'video', 6 ));
                $rs_you_foot = json_decode(json_encode($qr_you_foot), true);

                $_idcate_tuvan = 179;
                $qr_tuvan = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_tuvan, 'banner', 1 ));
                $rs_tuvan = json_decode(json_encode($qr_tuvan), true);

                $_idcate_banner_right = 175;
                $qr_banner_right = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_banner_right, 'banner', 1 ));
                $rs_banner_right = json_decode(json_encode($qr_banner_right), true);

                $qr_feature = DB::select('call ListCustomPostByFeature(?,?)',array('post', 5 ));
                $rs_feature = json_decode(json_encode($qr_feature), true);

                $idmenu1 = 1;
                $qr_menu1 = DB::select('call ListItemCateByIdMenuProcedure(?)',array($idmenu1));
                $rs_menu1 = json_decode(json_encode($qr_menu1), true);
                $idmenu2 = 2;
                $qr_menu2 = DB::select('call ListItemCateByIdMenuProcedure(?)',array($idmenu2));
                $rs_menu2 = json_decode(json_encode($qr_menu2), true);
                $idmenu3 = 3;
                $qr_menu3 = DB::select('call ListItemCateByIdMenuProcedure(?)',array($idmenu3));
                $rs_menu3 = json_decode(json_encode($qr_menu3), true);  

                $_idcate_logo_footer = 182;
                $qr_logo_footer = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_logo_footer, 'option', 1 ));
                $rs_logo_footer = json_decode(json_encode($qr_logo_footer), true);

                $_idcate_logo_header = 187;
                $qr_logo_header = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_logo_header, 'option', 1 ));
                $rs_logo_header = json_decode(json_encode($qr_logo_header), true);

            return view('teamilk.product.search')->with(compact('rs_lpro','rs_cat_product','rs_listpostpular','rs_you_foot','rs_tuvan','rs_banner_right','rs_feature','rs_menu1','rs_menu1','rs_menu2','rs_menu3','iduser','rs_logo_footer','rs_logo_header','_keyword'));
        } catch (\Illuminate\Database\QueryException $ex) {
            $errors = new MessageBag(['error' => $ex->getMessage()]);
            return view('teamilk.product.search')->with('error',$errors);
        }
    }
    //end search page
    public function listproductbyidcategory($_idcategory,$_page,$_limit){
        try {
            $_limit =100;
             $qr_lpro = DB::select('call ListProductByIdcateProcedure(?,?,?,?)',array($_idcategory,$_page,$_idstore,$_limit));
            //$qr_lpro = DB::select('call ListViewProductByIdCateProcedure(?)',array($_idcategory));
            $rs_lpro = json_decode(json_encode($qr_lpro), true);     
             return view('teamilk.product.index')->with(compact('rs_lpro','_idcategory'));
        } catch (\Illuminate\Database\QueryException $ex) {
            $errors = new MessageBag(['error' => $ex->getMessage()]);
            return view('teamilk.product.index')->with('error',$errors);
        }
    }
    public function orderhistory(Request $request){
        $input = json_decode(file_get_contents('php://input'),true);
        $_idproduct = $input['idproduct'];
        $_quality = $input['quality'];
        $_userid_order = $input['userid_order'];
        $_idstore = 31;   
        $idorderhis = 1;
        $str_session = session()->get('orderhistory');
        $str_item ="";
        $idorder = 1;
        $parent = 0;
        if(!isset($str_session)||empty($str_session)){
            $qr_initsession = DB::select("CALL InitsessionProcedure(?,?,?,?)",array($_idproduct, $_quality, $_idstore, $idorder));
            $rs_initsession = json_decode(json_encode($qr_initsession), true);
            //$arr = array($rs_initsession, $str_session);
            //return response()->json($arr);         
            foreach ($rs_initsession as $row) {
                $quality_sale = $_quality; 
                if(isset($row['parent']) && $row['parent']!=0){
                    $quality_sale = $row['quality_sale']*$_quality;
                }
                $str_item .= '{"idorder":'.$row['idorder'].',"idcrosstype":'.$row['idcrosstype'].',"parent":'.$row['parent'].',"idparentcross":'.$row['idparentcross'].',"input_quality":'.$row['input_quality'].',"idproduct":'.$row['idproduct'].',"inp_session":'.$quality_sale.',"trash":1},';
                $idorder++;
            }
            $str_item = substr_replace($str_item ,"", -1);
            $str_item = "[".$str_item."]";           
        }else{
            $Object = json_decode($str_session,true);
            foreach ( $Object as $item) {
                if(!empty($item)){
                    $idorder++;
                }
            }
           
            try{
                $qr_initsession = DB::select("CALL InitsessionProcedure(?,?,?,?)",array($_idproduct, $_quality, $_idstore, $idorder));
                $rs_initsession = json_decode(json_encode($qr_initsession), true);
                //return response()->json($rs_initsession);
                foreach ($rs_initsession as $row) {
                    $quality_sale = $_quality; 
                    if($row['parent']!=0){
                        $quality_sale = $row['quality_sale']*$_quality;
                    }
                    $Object[] = ['idorder'=>$row['idorder'],'idcrosstype'=>$row['idcrosstype'],'parent'=>$row['parent'],'idparentcross'=>$row['idparentcross'],'input_quality'=>$row['input_quality'],'idproduct' => $row['idproduct'],'inp_session'=>$quality_sale,'trash' => 1];
                    $idorder++;
                }
            }
            catch (\Illuminate\Database\QueryException $ex) {
                $errors = new MessageBag(['error' => $ex->getMessage()]);
                return response()->json($errors);
            }
            $str_item = json_encode($Object);  
        }
        //$request->session()->keep(['username', 'email']);
        session()->put('orderhistory', $str_item);
        session()->save();
        //$arr_session = array();
        //$arr_session[] = array('','str_item' => $str_item);
        return response()->json($str_item);
    }
    //change quality session
    public function changequality(Request $request){
        $input = json_decode(file_get_contents('php://input'),true);
        //$_idorder = $input['idorder'];
        //$_quality = $input['quality'];
        $_userid_order = $input['userid_order'];
        $_listchange = $input['listchange'];
        //$str_json = stripslashes($_listchange);
        $Object = json_decode($_listchange,true);
        $str_Object = session()->get('orderhistory');
        $data = json_decode($str_Object,true);
        foreach ($Object as $row) {
            $_idorder = $row['idorder'];
            $_quality = $row['quality'];
            $_trash = $row['trash'];
            foreach($data as $key => $value){
                if($data[$key]['idorder']==$_idorder){
                    $data[$key]['inp_session'] = $_quality;
                    $data[$key]['trash'] = $_trash;
                }
            }
        }
         $str_item = json_encode($data); 
         session()->put('orderhistory', $str_item);
         session()->save();
         $str_Object = session()->get('orderhistory');
         return response()->json($str_Object);
    }
    //change quality session
    public function cartnumber(Request $request){
        $input = json_decode(file_get_contents('php://input'),true);
        $_userid_order = $input['userid_order'];
        $str_Object = session()->get('orderhistory');
        $data = json_decode($str_Object,true);
        $numbercart = 0;
        if(!empty($data)){
            foreach ($data as $row) {
                if($row['trash'] > 0 ){
                    $numbercart++;
                }
            }
        }
        return response()->json($numbercart);
    }
     public function remove_item(Request $request){
        $input = json_decode(file_get_contents('php://input'),true);
        $_idproduct = $input['idproduct'];
        $_quality = $input['quality'];
        $_userid_order = $input['userid_order'];
        //$qr_orderhis = DB::select('call OrderHistoryProcedure(?,?,?)',array($_userid_order,$_idproduct,$_quality));
        //$orderhistory = json_decode(json_encode($qr_orderhis), true);
        //$idorderhis = $orderhistory[0]['orderhistory'];
        $arr_his = session()->get('orderhistory');
        $_trash = 1;
        if(isset($arr_his)){
            $Object = json_decode($arr_his,true);
            $Object[] = ['idproduct' => $_idproduct,'quality' => $_quality,'trash' => $_trash];
            $str_Object = json_encode($Object);
        }
        session()->put('orderhistory', $str_Object);
        //session()->save();
        return response()->json($idorderhistory);
    }
     public function delete_session(Request $request){
        $request->session()->forget('orderhistory');
         return view('teamilk.product.index');
     }
     public function get_sesstion(Request $request){
        $_session = $request->session()->get('orderhistory');
         return view('teamilk.product.index')->with(compact('_session',$_session));
     }
     //change quality session
    public function productbyslug(Request $request, $_slug){
        $iduser = Auth::id();
        $_idstore = 31;
        //get idproduct by slug
        $qr_getidcate = DB::select('call SelInfoCategoryBySlugProcedure(?)',array($_slug));
        $rs_getidcate = json_decode(json_encode($qr_getidcate), true);
        $_idcategory = 0;
        $_namecattype = "product";
        $_posttype = "product";
        if(isset($rs_getidcate) && isset($rs_getidcate[0]['idcategory']) && $rs_getidcate[0]['idcategory'] > 0){
            $_idcategory = $rs_getidcate[0]['idcategory'];
            $_posttype = $rs_getidcate[0]['catnametype'];
            return $this->ListTypePostbyIdcate($_idcategory,$_posttype); 
        }
        
        $qr_getidproduct = DB::select('call SelIdproductBySlugProcedure(?)',array($_slug));
        $rs_getidproduct = json_decode(json_encode($qr_getidproduct), true);
        if(!isset($rs_getidproduct[0]['idproduct'])){
            //return abort(404);
			return $this->error_404();
        }
        $idproduct = $rs_getidproduct[0]['idproduct'];
        $this->update_view($idproduct);
        return $this->show($idproduct);
    }
    public function search_slug_cate($_slug){
        $iduser = Auth::id();
        $_idstore = 31;
        //get idproduct by slug
        $qr_getidcate = DB::select('call SelIdcategoryBySlugProcedure(?)',array($_slug));
        $rs_getidcate = json_decode(json_encode($qr_getidcate), true);
        $_idcategory = 0;
        if(isset($rs_getidcate) && isset($rs_getidcate[0]['idcategory']) ){
            $_idcategory = $rs_getidcate[0]['idcategory']; 
        }
        return $_idcategory;
    }
    public function curent_url(){
       $totalSegsCount = count(\Request::segments());
        $url = '';
        for ($i = 0; $i < $totalSegsCount; $i++) { 
            $url .= \Request::segment($i+1)."/";
        }
        $url = rtrim($url, '/');
        $_command = "select";
        $pattern_index = "/product\/[0-9]+$/";
        $matches = array();
        if (preg_match($pattern_index, $url, $matches)){
            $_command = "select";
            $url = "product/0";
        }
        $result = array('url'=>$url,'command'=>$_command);
        return $result;
    }
    public function CheckPermission(){
        $_iduser = Auth::id();
        $arr = $this->curent_url();
        $_command = $arr['command'];
        $_curent_url = $arr['url'];
        $qr_permission = DB::select('call GrantPermissionRoleProcedure(?,?,?,?)',array($_iduser, $_command ,'dashboard' , $_curent_url));
        $permissions = json_decode(json_encode($qr_permission), true);
        return $permissions;
    }
     public function update_view($idproduct){
         $iduser = Auth::id();
         if(!isset($iduser)){
            $iduser = 36;
         }
         $ipaddress = $this->get_client_ip();
         $nametypeinteract ='view';
         DB::select('call UpdateviewProcedure(?,?,?,?)',array($idproduct, $iduser, $ipaddress, $nametypeinteract));
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
    public static function get_the_excerpt_max($charlength, $excerpt) {
        $cleanText = filter_var($excerpt, FILTER_SANITIZE_STRING);
        $introCleanText = strip_tags($cleanText);
        $charlength++;

        if ( mb_strlen( $introCleanText ) > $charlength ) {
            $subex = mb_substr( $introCleanText, 0, $charlength - 5 );
            $exwords = explode( ' ', $subex );
            $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
            if ( $excut < 0 ) {
                return mb_substr( $subex, 0, $excut );
            } else {
                return $subex;
            }
            return '...';
        } else {
            return $introCleanText;
        }
        return $introCleanText;
    }
}