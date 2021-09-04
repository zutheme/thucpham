<?php
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Validator;
//use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;
use Log;


class LoginController extends Controller
{
    private $main_menu = '';
    public function checklogin(){
      if (Auth::check()) {
          $user = Auth::user(); 
          $iduser = Auth::id(); 
          $str_dashboard = $this->ListAllCateByTypeId($iduser,'select','dashboard',0);
          session()->put('sidebar-admin', $str_dashboard);
          $qr_select_profile = DB::select('call SelectProfileProcedure(?)',array($iduser));
          $profile = json_encode($qr_select_profile);
          session()->put('profile', $profile);
          return view('admin.welcome.loginsuccess');
      } else {
          return redirect('admin/login');
      }
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('admin/login');
    }
    public function getLogin()
    {
        $_idcate_logo_header = 187;
        $qr_logo_header = DB::select('call listcustompostbyidcategory(?,?,?)',array($_idcate_logo_header, 'option', 1 ));
        $rs_logo_header = json_decode(json_encode($qr_logo_header), true);
        if (Auth::check()) {
            $user = Auth::user(); 
            return view('admin.welcome.loginsuccess')->with(compact('rs_logo_header'));
            //return redirect()->route('admin.welcome.loginsuccess')->with('success',$user->name);
        } else {
            return view('admin.login')->with(compact('rs_logo_header'));;
        }

    }
    
    public function postLogin(Request $request) {
     
        $name = $request->input('name');
        $password = $request->input('password');
        $credentials = $request->only('name', 'password');
        //if( Auth::attempt(['email' => $email, 'password' =>$password])) {
        //['name' => $name, 'password' =>$password]
        if( Auth::attempt($credentials)) {
           $user = Auth::user();
           $iduser = Auth::id(); 
           $request->session()->regenerate();
           $success['token'] =  $user->createToken('MyApp')->accessToken;
           $str_dashboard = $this->ListAllCateByTypeId($iduser,'select','dashboard',0);
           $request->session()->put('sidebar-admin', $str_dashboard);    
           //profile
           $qr_select_profile = DB::select('call SelectProfileProcedure(?)',array($iduser));
           $profile = json_encode($qr_select_profile);
           $request->session()->put('profile', $profile);
           $errors = new MessageBag(['errorlogin' => $user->name]);
           //return redirect()->intended('admin.welcome.loginsuccess')->with('success',$user->name);;
           return view('admin.welcome.loginsuccess');
           //return redirect()->back()->withInput()->withErrors($errors);
        } else {
          $errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng']);
          return redirect()->back()->withInput()->withErrors($errors);
        }
    }
    public function ListAllCateByTypeId( $_iduser,$_command,$_catnametype,$result) {
        $qr_cate = DB::select('call ListCatPermDashboardByTypeProcedure(?,?,?)',array($_iduser , $_command, $_catnametype));
        //$result = DB::select('call ListCatPermissionByTypeProcedure(?)',array($_catnametype));
        $categories = json_decode(json_encode($qr_cate), true);
        if(!isset($categories)){
          return redirect('/');
        }
        $this->showCategories($categories, 0, 0);   
        $str_html = $this->main_menu;
        return $str_html; 
    }
    public function showCategories($categories, $idparent = 0, $level = 0){
        $cate_child = array();
        foreach ($categories as $key => $item){
            if (isset($item['idparent']) && $item['idparent'] == $idparent){
                $cate_child[] = $item;
                unset($categories[$key]);
            }
        }
        $list_cat="";       
        if ($cate_child){
            if($level == 0 ){
             $this->main_menu = '<div class="menu_section"><ul class="nav side-menu depth-'.$level.'">';
            }else{
                $this->main_menu .= '<ul class="nav child_menu depth-'.$level.'">';
            }
            foreach ($cate_child as $key => $item){    
               $route = "#";
               if(isset($item['pathroute'])&&$item['haschild'] < 1){
                    $route = $item['pathroute'];
                }
                $this->main_menu .= '<li><a href="'.asset($route).'">'.$item['namecat'].'</a>';
                $this->showCategories($categories, $item['idcategory'], $level+1);
                $this->main_menu .= '</li>';
            }
            if($level == 0){
                $this->main_menu .= '</ul></div>';
            }else{
                $this->main_menu .= '</ul>';
            }
            
        }
    }
    
}
