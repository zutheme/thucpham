<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Posts;
use App\PostType;
use App\category;
use App\status_type;
use App\files;
use File;
use App\func_global;
use App\tag;
class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	private $main_menu="";
    public function index(Request $request)
    {
		try {
            $_id_post_type = 26;
			$posttype = 'tag';
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
            //$_idstore = $request->get('sel_id_store');
           
            $_idstore = 31;
               
            $_id_status_type = 20;
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
            if($list_checks){
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
            //$statustypes = status_type::all()->toArray();
            //$qr_status = DB::select('call LstParentStatusProcedure()');
            $qr_status = DB::select('call ListStatusbyIdposttype(?)', array($_id_post_type));
            $statustypes = json_decode(json_encode($qr_status), true);

            //$qr_store = DB::select('call ListParentCatByTypeProcedure(?)',array('store'));
            $qr_store = DB::select('call ListParentStoreByTypeProcedure(?,?)',array('store', $posttype));
            $rs_store = json_decode(json_encode($qr_store), true);

            $post_types = PostType::all()->toArray();
            $errors = 'start_date: '.$_start_date.', end_date:'.$_end_date.', list_idcat:'.$_list_idcat.', id_post_type:'.$_id_post_type.', id_status_type:'.$_id_status_type.', _idstore:'.$_idstore;
           
            if ($_id_post_type == 26){
                //$result = DB::select('call ReportCustomPostProcedure(?,?,?,?,?,?)',array($_list_idcat, $_id_post_type, $_id_status_type, $_idstore, $_start_date, $_end_date));
				$result = DB::select('call ReportTagProcedure(?,?,?,?,?,?)',array($_list_idcat, $_id_post_type, $_id_status_type, $_idstore, $_start_date, $_end_date));
                $products = json_decode(json_encode($result),true);
            }
            
            //$result = DB::select('call ListAllCatByTypeProcedure(?)',array($_namecattype));
            //$categories = json_decode(json_encode($result), true);

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
            
            return view('admin.tag.index',compact('products','errors','post_types','categories','posttype','_id_post_type','statustypes','rs_store','sel_cross_type'))->with('error',$errors);
        } catch (\Illuminate\Database\QueryException $ex) {
            $errors = new MessageBag(['error' => $ex->getMessage()]);
            return redirect()->route('admin.tag.index')->with('error',$errors);
        }
        return view('admin.tag.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $idposttype = 26;
        
        $cattype = PostType::find($idposttype);
        $_namecattype = $cattype->nametype;
        
        $parent_tilte = '';
       
        $cate_selected[0]['idcategory']=0;
        $str = $this->all_category($_namecattype,$cate_selected);
        //$statustypes = status_type::all()->toArray();
        $posttypes = PostType::all()->toArray();

        $result = DB::select('call ListParentCatByTypeProcedure(?)',array($_namecattype));
        $categories = json_decode(json_encode($result), true);
        $qr_cross_type = DB::select('call SelCrossTypeProcedure');
        $sel_cross_type = json_decode(json_encode($qr_cross_type), true);
       
        $qr_status = DB::select('call ListStatusbyIdposttype(?)', array($idposttype));
        $statustypes = json_decode(json_encode($qr_status), true);

        $qr_latest_id = DB::select('call GetlatestIdProcedure()');
        $rs_latest_id = json_decode(json_encode($qr_latest_id), true); 
        
        return view('admin.tag.create',compact('posttypes','categories','statustypes','str','idposttype','sel_cross_type','idposttype','_namecattype','rs_latest_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
            $idcategory = 239;
            if($list_checks){
                foreach ($list_checks as $item) {
                  $idcategory = $item;
                }    
            }
            $str_query = '';
            if(isset($tag)){
                $itemtag = explode(",",$tag);
                foreach ($itemtag as $item) {
                    $str_query .= '("'.$item.'", '.$idcategory.'),';
                }
            }
            $str_query = rtrim($str_query,", ");
            $str_query = 'INSERT INTO tag(nametag, idcatetag) VALUES '.$str_query;
            $qr_newtag = DB::select('call NewtagProcedure(?)',array($str_query));
            $rs_newtag = json_decode(json_encode($qr_newtag));
            $stgtag = '';
            foreach ($rs_newtag as $item) {
                $stgtag = $item->tag;
            }
    
        } catch (\Illuminate\Database\QueryException $ex) {
            $errors = new MessageBag(['error' => $ex->getMessage()]);
            return redirect()->back()->withInput()->withErrors($errors);
        }
        $message = "success ".$_id_post_type.','.$_catnametype.' tag: '.$stgtag;

        return redirect()->action('Admin\TagController@create')->with('success',$message);
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
    public function edit(Request $request, $idtag)
    {
        $idposttype = 26;
        
        $cattype = PostType::find($idposttype);
        $_namecattype = $cattype->nametype;
        
        $parent_tilte = '';
       
        $cate_selected[0]['idcategory']=0;
        $str = $this->all_category($_namecattype,$cate_selected);
        //$statustypes = status_type::all()->toArray();
        $posttypes = PostType::all()->toArray();

        $result = DB::select('call ListParentCatByTypeProcedure(?)',array($_namecattype));
        $categories = json_decode(json_encode($result), true);
        $qr_cross_type = DB::select('call SelCrossTypeProcedure');
        $sel_cross_type = json_decode(json_encode($qr_cross_type), true);
       
        $qr_status = DB::select('call ListStatusbyIdposttype(?)', array($idposttype));
        $statustypes = json_decode(json_encode($qr_status), true);

        $qr_latest_id = DB::select('call GetlatestIdProcedure()');
        $rs_latest_id = json_decode(json_encode($qr_latest_id), true);

        $qr_tag = DB::select('call DetailTagbyIdProcedure(?)', array($idtag));
        $rs_tag = json_decode(json_encode($qr_tag), true);  
        
        return view('admin.tag.edit',compact('idtag','posttypes','categories','statustypes','str','idposttype','sel_cross_type','idposttype','_namecattype','rs_latest_id','rs_tag'));
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
    public function listtag(Request $request){
       
        $input = json_decode(file_get_contents('php://input'),true);
        $select_idcat = $input['select_idcat'];
        $idproduct = $input['idproduct'];
        $lstcate = '';
        foreach ($select_idcat as $idcategory) {
            $lstcate .= '('.$idcategory.'),';
        }
        $lstcate = rtrim($lstcate,", ");
        $str_li="";
        $qr_tag = DB::select('call ListTagByIdcateProcedure(?,?)',array($lstcate, $idproduct));
        $rs_tag = json_decode(json_encode($qr_tag));
        //return response()->json($rs_tag[0]['idtag']);
        foreach ($rs_tag as $item) {
            $str_li .= '<li><input class="checklist flat" type="checkbox" name="tag_check[]" value="'.$item->idtag.'"'.' onclick="OnChangetag(this)">'.$item->nametag.'</li>';
        }    
        $str_html = '<ul class="list-check">'.$str_li."</ul>";    
        return response()->json($str_html); 
    }
	/*cateogry*/
     public function ListAllCateByTypeId($_cattype='tag', $_idcat=0) {

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

               $selected = ($this->compare_in_list($_cate_selected,$item['idcategory']) >0) ? 'checked' : '';

               $str_li = '<li><input class="checklist" type="radio" name="list_check[]" value="'.$item['idcategory'].'">'.$item['namecat'];

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

                $this->main_menu .= '<li><input class="checklist" type="radio" name="list_check[]" value="'.$item['idcategory'].'"'.$selected.'>'.$item['namecat'];

                $this->showCategoriesbyid($categories, $item['idcategory'], $char.'|---', $_cate_selected);

                $this->main_menu .= '</li>';

            }

            $this->main_menu .= '</ul>';

        }

    }
	//show sub category
    public function all_category($_namecattype, $_cate_selected) {
        $result = DB::select('call ListAllCatByTypeProcedure(?)',array($_namecattype));
        $categories = json_decode(json_encode($result), true);
        $this->showCategories($categories,0,'',$_cate_selected);
        return $this->main_menu;
    }
	public function showCategories($categories, $idparent = 0, $char = '', $_cate_selected){
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
        if ($cate_child)
        {
            $this->main_menu .= '<ul class="list-check">';
            foreach ($cate_child as $key => $item){
                // Hiển thị tiêu đề chuyên mục
                $_idcateproduct = $this->compare_in_list($_cate_selected,$item['idcategory']);
                $selected = ($_idcateproduct > 0) ? ' checked' : '';
                $this->main_menu .= '<li><input class="checklist" type="radio" name="list_check[]" value="'.$item['idcategory'].'"'.$selected.' onclick="OnChangeCheckbox(this)">'.$item['namecat'];
                $this->main_menu .= '<input type="hidden" class="hidden_idcate" value="'.$_idcateproduct.'" />';
                $this->showCategories($categories, $item['idcategory'], $char.'|---', $_cate_selected);
                $this->main_menu .= '</li>';
            }
            $this->main_menu .= '</ul>';
        }
    }
	 public function compare_in_list($_cate_selected, $x = 0){
        foreach ($_cate_selected as $item)
        {
           if($x == $item['idcategory']) return $item['idcateproduct'];
        }
        return 0;
    }
    public function trashtag(Request $request){
        $input = json_decode(file_get_contents('php://input'),true);
        $idproduct = $input['idproduct'];
        $idtag = $input['idtag'];
        $qr_trashtag = DB::select('call TrashTagProcedure(?,?)',array($idproduct, $idtag));
        $rs_trashtag = json_decode(json_encode($qr_trashtag));
        return response()->json(array($idproduct,$idtag));
    }
}
