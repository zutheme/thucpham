<?php

namespace App\Http\Controllers\Helper;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\menu;
use Validator;
use Illuminate\Support\MessageBag;
class HelperController extends Controller
{
    private static $list_cate ="";
    private static $list_menu ="";
    private static $list_mobile ="";
    private static $menu_footer ="";
    private static $list_menu_sidebar ="";
    public $menucate = "";
    public static function menu_category($categories, $idparent = 0, $char = 0, $depth = 0, $class_ul, $class_li, $show = 0){
        static::show_menu_list($categories, $idparent = 0, $char = 0, $depth = 0, $class_ul, $class_li, $show);
        echo static::$list_cate;
    }
    public static function show_menu_list($categories, $idparent = 0, $char = 0, $depth = 0, $class_ul='', $class_li='', $show) {

        $cate_child = array();

        $arr_parent = array();
        $arr_show = array();
        $arr_show[0] = $show;
        foreach ($categories as $key => $item) {
            if($item['idparent'] == $idparent) {
                $cate_child[] = $item;
                unset($categories[$key]);
            }
        }                   
        if ($cate_child) {
            $depth_ul = $depth;
            $show_number = '';
            if(!$char){
                static::$list_cate = '<ul class="'.$class_ul.' '.$depth_ul.'">';
            }else{

                if($depth_ul == 0){

                    static::$list_cate = '<ul class="'.$class_ul.' '.$depth_ul.'">';

                }else if($depth_ul == 1){

                    static::$list_cate = '<ul class="'.$class_ul.' '.$depth_ul.'">';

                }else {

                    static::$list_cate = '<ul class="'.$class_ul.' '.$depth_ul.'">';

                }
            }

            foreach ($cate_child as $key => $item) {

                // Hiển thị tiêu đề chuyên mục

                $depth_li = $item['depth'];

                if($depth_li==0 && $item['haschild'] == 1){

                    $span1 = $class_li;


                } else if($depth_li==0 && $depth_li == 0){
                   $span1 = $class_li;

                }
                else if($depth_li==1){

                    $span1 = $class_li;

                }else if ($depth_li==2) {

                    $span1 = $class_li;

                }elseif ($depth_li==3) {

                    $span1 = $class_li;
                } 
                else {
                    $span1 = '';
                }
                if($depth_li == 0 && $item['haschild'] == 1){
                    static::$list_cate .= '<li class="'.$span1.'"><a href="#">'.$item['namemenu'].'</a>';
                }else{
                    if($item['catnametype']=='link'){
                        static::$list_cate .= '<li class="'.$span1.'"><a href="'.url('/').'/'.$item['url'].'">'.$item['namemenu'].'</a>';
                    }else{
                        if($arr_show[0] == 1) $show_number = '<span class="td-cat-no">'.$item['count'].'</span>'; 
                        static::$list_cate .= '<li class="'.$span1.' '.$arr_show[0].'-depth_li-'.$depth_li.'"><a href="'.url('/').'/'.$item['slug'].'"><span class="td-cat-name">'.$item['namemenu'].'</span>'.$show_number.'</a>';
                    }
                }
                $char++;
                static::show_menu_list($categories,$item['idmenuhascate'], $char, $item['depth'], $class_ul , $class_li, $arr_show[0]);
                static::$list_cate .= '</li>';
            }  
            static::$list_cate .= '</ul>';
        } 

    }
    /*--------------------------------menu mobile---------------------------------------*/
    public static function menu_mobile($categories, $idparent = 0, $char = 0, $depth = 0, $class_ul, $class_li, $show = 0){
        static::show_menu_mobile($categories, $idparent = 0, $char = 0, $depth = 0, $class_ul, $class_li, $show);
        echo static::$list_mobile;
    }
    public static function show_menu_mobile($categories, $idparent = 0, $char = 0, $depth = 0, $class_ul='c-layout-footer-10-list', $class_li='c-layout-footer-10-list-item', $show) {

        $cate_child = array();

        $arr_parent = array();
        $arr_show = array();
        $arr_show[0] = $show;
        foreach ($categories as $key => $item) {
            if($item['idparent'] == $idparent) {
                $cate_child[] = $item;
                unset($categories[$key]);
            }
        }                   
        if ($cate_child) {
            $depth_ul = $depth;
            $show_number = '';
            if(!$char){
                static::$list_mobile = '<ul class="'.$class_ul.' '.$depth_ul.'">';
                //echo '<ul class="'.$class_ul.' '.$depth_ul.'">';
            }else{

                if($depth_ul == 0){

                    static::$list_mobile = '<ul class="'.$class_ul.' '.$depth_ul.'">';
                    //echo '<ul class="'.$class_ul.' '.$depth_ul.'">';

                }else if($depth_ul == 1){

                    static::$list_mobile = '<ul class="'.$class_ul.' '.$depth_ul.'">';

                }else {

                    static::$list_mobile = '<ul class="'.$class_ul.' '.$depth_ul.'">';

                }

            }

            foreach ($cate_child as $key => $item) {

                // Hiển thị tiêu đề chuyên mục

                $depth_li = $item['depth'];

                if($depth_li==0 && $item['haschild'] == 1){

                    $span1 = $class_li;


                } else if($depth_li==0 && $depth_li == 0){
                   $span1 = $class_li;

                }
                else if($depth_li==1){

                    $span1 = $class_li;

                }else if ($depth_li==2) {

                    $span1 = $class_li;

                }elseif ($depth_li==3) {

                    $span1 = $class_li;
                } 
                else {
                    $span1 = 'c-layout-footer-10-list-item';
                }
                if($depth_li == 0 && $item['haschild'] == 1){
                    static::$list_mobile .= '<li class="'.$span1.'"><a href="#">'.$item['namemenu'].'</a>';
                }else{
                    if($item['catnametype']=='link'){
                        static::$list_mobile .= '<li class="'.$span1.'"><a href="'.url('/').'/'.$item['url'].'">'.$item['namemenu'].'</a>';
                    }else{
                        if($arr_show[0] == 1) $show_number = '<span class="td-cat-no">'.$item['count'].'</span>'; 
                        static::$list_mobile .= '<li class="'.$span1.' '.$arr_show[0].'-depth_li-'.$depth_li.'"><a href="'.url('/').'/'.$item['slug'].'"><span class="td-cat-name">'.$item['namemenu'].'</span>'.$show_number.'</a>';
                    }
                }
                $char++;
                static::show_menu_list($categories,$item['idmenuhascate'], $char, $item['depth'], $class_ul , $class_li, $arr_show[0]);
                static::$list_mobile .= '</li>';
            }  
            static::$list_mobile .= '</ul>';
        } 

    }
    /*---------------------------------end mobile----------------------------------------*/
    /*----------------------------------menu---------------------------------------------*/
    public static function menu_primary_sidebar($categories, $idparent = 0, $char = 0, $depth = 0, $class_ul, $class_li){
        static::show_menu_primary_sidebar($categories, $idparent = 0, $char = 0, $depth = 0, $class_ul, $class_li);
        echo static::$list_menu_sidebar;
    }
    public static function show_menu_primary_sidebar($categories, $idparent = 0, $char = 0, $depth = 0, $class_ul, $class_li) {

        $cate_child = array();

        $arr_parent = array();

        foreach ($categories as $key => $item) {

            if($item['idparent'] == $idparent) {

                $cate_child[] = $item;

                unset($categories[$key]);

            }

        }                   

        if ($cate_child) {

            $depth_ul = $depth;

            if(!$char){

                static::$list_menu_sidebar .= '<ul class="'.$class_ul.'">';

            }else{

                if($depth_ul == 0){

                     static::$list_menu_sidebar .= '<div class="sidebar-submenu"><ul class="depth-'.$depth_ul.'">';

                }else if($depth_ul == 1){

                    static::$list_menu_sidebar .= '<div class="sidebar-submenu"><ul class="depth-'.$depth_ul.'">';

                }else {

                     static::$list_menu_sidebar .= '<div class="sidebar-submenu"><ul class="depth-'.$depth_ul.'">';

                }

            }

            foreach ($cate_child as $key => $item) {

                // Hiển thị tiêu đề chuyên mục

                $depth_li = $item['depth'];

                if($depth_li==0 && $item['haschild'] == 1){

                    $span1 ='menu-item sidebar-dropdown  ';
                    $span_a ='';
                    $span_icon = '';

                } else if($depth_li==0 && $depth_li == 0){
                    $span1 ='header-menu';
                    $span_a ='';
                    $span_icon = '';
                }
                else if($depth_li==1){
                    $span1 = 'header-menu';
                     $span_a ='';
                    $span_icon = '';

                }else if ($depth_li==2) {
                    $span1 = 'header-menu';
                     $span_a ='';
                    $span_icon = '';

                }elseif ($depth_li==3) {
                    $span1 = 'header-menu';
                     $span_a ='';
                    $span_icon = '';
                } 
                else {

                    $span1 = 'header-menu';
                }
                if($depth_li==0 && $item['haschild'] == 1){
                    // <a href="#"><i class="fa fa-tachometer-alt"></i><span>Dashboard</span><span class="badge badge-pill badge-warning">New</span></a>
                    static::$list_menu_sidebar .= '<li class="'.$span1.'"><a href="#"><i class="fa fa-tachometer-alt"></i><span>'.$item['namemenu'].'</span><span class="badge badge-pill badge-warning">'.$item['count'].'</span></a>';
                }else{
                    if($item['catnametype']=='link'){
                        static::$list_menu_sidebar .= '<li class="'.$span1.'"><a href="'.url('/').'/'.$item['url'].'">'.$item['namemenu'].'</a>';
                    }else{
                        static::$list_menu_sidebar .= '<li class="'.$span1.'"><a href="'.url('/').'/'.$item['slug'].'">'.$item['namemenu'].'</a>';
                    }
                }
                $char++;

                static::show_menu_primary_sidebar($categories, $item['idmenuhascate'], $char, $item['depth'], $class_ul, $class_li);  

                static::$list_menu_sidebar .= "</li>";

            }  

            static::$list_menu_sidebar .= '</ul>';

        } 

    }
    /*menu sidebar video*/
    public static function menu_primary($categories, $idparent = 0, $char = 0, $depth = 0, $class_ul, $class_li){
        static::show_menu_primary($categories, $idparent = 0, $char = 0, $depth = 0, $class_ul, $class_li);
        echo static::$list_menu;
    }
    public static function show_menu_primary($categories, $idparent = 0, $char = 0, $depth = 0, $class_ul, $class_li) {

        $cate_child = array();

        $arr_parent = array();

        foreach ($categories as $key => $item) {

            if($item['idparent'] == $idparent) {

                $cate_child[] = $item;

                unset($categories[$key]);

            }

        }                   

        if ($cate_child) {

            $depth_ul = $depth;

            if(!$char){

                static::$list_menu .= '<ul class="'.$class_ul.'">';

            }else{

                if($depth_ul == 0){

                     static::$list_menu .= '<ul class="sub-menu depth-'.$depth_ul.'">';

                }else if($depth_ul == 1){

                    static::$list_menu .= '<ul class="sub-menu depth-'.$depth_ul.'">';

                }else {

                     static::$list_menu .= '<ul class="sub-menu depth-'.$depth_ul.'">';

                }

            }

            foreach ($cate_child as $key => $item) {

                // Hiển thị tiêu đề chuyên mục

                $depth_li = $item['depth'];

                if($depth_li==0 && $item['haschild'] == 1){

                    $span1 ='menu-item menu-item-has-children td-menu-item td-normal-menu ';
                    $span_a ='sf-with-ul';
                    $span_icon = '<i class="td-icon-menu-down"></i><i class="td-icon-menu-down"></i>';

                } else if($depth_li==0 && $depth_li == 0){
                    $span1 ='menu-item td-menu-item td-normal-menu';
                    $span_a ='';
                    $span_icon = '';
                }
                else if($depth_li==1){
                    $span1 = 'menu-item td-menu-item td-normal-menu';
                     $span_a ='';
                    $span_icon = '';

                }else if ($depth_li==2) {
                    $span1 = 'menu-item td-menu-item td-normal-menu';
                     $span_a ='';
                    $span_icon = '';

                }elseif ($depth_li==3) {
                    $span1 = 'menu-item td-menu-item td-normal-menu';
                     $span_a ='';
                    $span_icon = '';
                } 
                else {

                    $span1 = '';
                }
                if($depth_li==0 && $item['haschild'] == 1){
                    static::$list_menu .= '<li class="'.$span1.'"><a class="'.$span_a.'" href="#">'.$item['namemenu'].$span_icon.'</a>';
                }else{
                    if($item['catnametype']=='link'){
                        static::$list_menu .= '<li class="'.$span1.'"><a href="'.url('/').'/'.$item['url'].'">'.$item['namemenu'].'</a>';
                    }else{
                        static::$list_menu .= '<li class="'.$span1.'"><a href="'.url('/').'/'.$item['slug'].'">'.$item['namemenu'].'</a>';
                    }
                }
                $char++;

                static::show_menu_primary($categories, $item['idmenuhascate'], $char, $item['depth'], $class_ul, $class_li);  

                static::$list_menu .= "</li>";

            }  

            static::$list_menu .= '</ul>';

        } 

    }
    /*end menu sidebar video*/
    public static function menu_footers($categories, $idparent = 0, $char = 0, $depth = 0, $class_ul, $class_li){
        static::show_menu_footer($categories, $idparent = 0, $char = 0, $depth = 0, $class_ul, $class_li);
        echo static::$menu_footer;
    }
    public static function show_menu_footer($categories, $idparent = 0, $char = 0, $depth = 0, $class_ul='', $class_li='') {

        $cate_child = array();

        $arr_parent = array();

        foreach ($categories as $key => $item) {

            if($item['idparent'] == $idparent) {

                $cate_child[] = $item;

                unset($categories[$key]);

            }

        }                   

        if ($cate_child) {
            $depth_ul = $depth;
            if(!$char){
                static::$menu_footer .= '<ul class="'.$class_ul.' '.$depth_ul.'">';
            }else{
                if($depth_ul == 0){
                    static::$menu_footer .= '<ul class="'.$class_ul.' '.$depth_ul.'">';
                }else if($depth_ul == 1){
                    static::$menu_footer .= '<ul class="'.$class_ul.' '.$depth_ul.'">';
                }else {
                    static::$menu_footer .= '<ul class="'.$class_ul.' '.$depth_ul.'">';
                }
            }

            foreach ($cate_child as $key => $item) {
                // Hiển thị tiêu đề chuyên mục
                $depth_li = $item['depth'];
                if($depth_li==0 && $item['haschild'] == 1){
                    $span1 = $class_li;
                } else if($depth_li==0 && $depth_li == 0){
                   $span1 = $class_li;
                }
                else if($depth_li==1){
                    $span1 = $class_li;
                }else if ($depth_li==2) {
                    $span1 = $class_li;
                }elseif ($depth_li==3) {
                    $span1 = $class_li;
                } 
                else {
                    $span1 = 'c-layout-footer-10-list-item';
                }
                
                if($depth_li==0 && $item['haschild'] == 1){
                    static::$menu_footer .= '<li class="'.$span1.'"><a href="#">'.$item['namemenu'].'</a>';
                }else{
                    if($item['catnametype']=='link'){
                        static::$menu_footer .= '<li class="'.$span1.'"><a href="'.url('/').'/'.$item['url'].'">'.$item['namemenu'].'</a>';
                    }else{
                        static::$menu_footer .= '<li class="'.$span1.'"><a href="'.url('/').'/'.$item['slug'].'">'.$item['namemenu'].'</a>';
                    }
                }
                $char++;

                static::show_menu_footer($categories, $item['idmenuhascate'], $char, $item['depth'],'',''); 

                static::$menu_footer .= "</li>";

            }  

            static::$menu_footer .= '</ul>';

        } 

    }
    public static function update_view($idproduct){
         $iduser = Auth::id();
         if(!isset($iduser)){
            $iduser = 36;
         }
         $ipaddress = static::get_client_ip();
         $nametypeinteract ='view';
         DB::select('call UpdateviewProcedure(?,?,?,?)',array($idproduct, $iduser, $ipaddress, $nametypeinteract));
    }
    public static function get_client_ip() {
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
    public static function breadcrumb($categories, $curent_idcategory = 0, $char = 0, $depth = 0) {
        $cate_child = array();
        $cate_last =  array();
        foreach ($categories as $key => $item) {
            if($item['idcategory'] == $curent_idcategory) {
                $cate_child[] = $item;
                unset($categories[$key]);
                if( $item['idparent'] > 0) {
                        $char++;$depth++;
                        static::breadcrumb($categories, $item['idparent'], $char, $depth); 
                }
            }
        }               
        if($cate_child){ 
            foreach ($cate_child as $key => $item) {
                //echo '<li><a href="'.url('/').'/listproductbyidcate/'.$item['idcategory'].'">'.$item['namecat'].'</a></li>';
                echo '<li><a href="'.url('/').'/'.$item['slug'].'">'.$item['namecat'].'</a>';       
            }
        }       
    }
    public static function breadcrumbpost($categories, $curent_idcategory = 0, $char = 0, $depth = 0) {
        $cate_child = array();
        $cate_last =  array();
        foreach ($categories as $key => $item) {
            if($item['idcategory'] == $curent_idcategory) {
                $cate_child[] = $item;
                unset($categories[$key]);
                if( $item['idparent'] > 0) {
                        $char++;$depth++;
                        static::breadcrumbpost($categories, $item['idparent'], $char, $depth); 
                }
            }
        }
        if(isset($char)){
            echo '<li><a href="'.url('/').'">Home</a></li>';
        }               
        if($cate_child){ 
            foreach ($cate_child as $key => $item) {
                echo '<li><a href="'.url('/').'/'.$item['slug'].'">'.$item['namecat'].'</a></li>';       
            }
        }       
    }
    public static function Getrootcate($categories, $curent_idcategory = 0, $char = 0, $depth = 0) {

        $cate_child = array();

        $cate_last =  array();

        foreach ($categories as $key => $item) {

            if($item['idcategory'] == $curent_idcategory) {

                $cate_child[] = $item;

                unset($categories[$key]);

                if( $item['idparent'] > 0) {

                        $char++;$depth++;

                        Getrootcate($categories, $item['idparent'], $char, $depth); 

                }

            }

        }               

        if($cate_child){ 
            foreach ($cate_child as $key => $item) {
                //echo '<li><a href="'.url('/').'/listproductbyidcate/'.$item['idcategory'].'">'.$item['namecat'].'</a></li>';
                return $item['namecat'];    
            }
        }       

    }
    /* menu list category by idcate */
     public static function category_primary(Request $request, $_cattype='product', $idparent = 0){
        $qr_categories = DB::select('call ListAllCatByTypeProcedure(?)',array($_cattype));
        $categories = json_decode(json_encode($qr_categories), true);
        $char = 0; $depth = 0; $class_ul='sel-list'; $class_li='';
        static::show_category_primary($categories, $idparent, $char, $depth, $class_ul, $class_li);
        //return static::$list_menu;
        $str_html = static::$list_menu;
        $result = json_decode(json_encode($str_html), true);     
        return response()->json($result);
    }
    public static function show_category_primary($categories, $idparent = 0, $char = 0, $depth = 0, $class_ul, $class_li) {
        $cate_child = array();
        $arr_parent = array();
        foreach ($categories as $key => $item) {
            if($item['idparent'] == $idparent) {
                $cate_child[] = $item;
                unset($categories[$key]);
            }
        }                   
        if ($cate_child) {
            $depth_ul = $depth;
            if(!$char){
                static::$list_menu .= '<ul class="'.$class_ul.'">';
            }else{
                if($depth_ul == 0){
                     static::$list_menu .= '<ul class="sub-menu depth-'.$depth_ul.'">';
                }else if($depth_ul == 1){
                    static::$list_menu .= '<ul class="sub-menu depth-'.$depth_ul.'">';
                }else {
                     static::$list_menu .= '<ul class="sub-menu depth-'.$depth_ul.'">';
                }
            }
            foreach ($cate_child as $key => $item) {
                // Hiển thị tiêu đề chuyên mục
                //static::$list_menu .= '<li><a href="#">'.$item['namecat'].'</a>';
                static::$list_menu .= '<li><label class="main">'.$item['namecat'];
                static::$list_menu .= '<input type="checkbox" name="list_check[]" value="'.$item['idcategory'].'">';
                static::$list_menu .= '<span class="geekmark"></span>';
                static::$list_menu .= '</label>';
                $char++;
                static::show_category_primary($categories, $item['idcategory'], $char, 0, $class_ul, $class_li);  
                static::$list_menu .= "</li>";
            }  
            static::$list_menu .= '</ul>';
        } 
    }
    public static function getoptionbyid($idproduct){
        $qr_option = DB::select('call getoptionbyid(?)',array($idproduct));
        $rs_option = json_decode(json_encode($qr_option));
        return $rs_option;   
    }  
}
