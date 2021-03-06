<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Events\WebsocketDemoEvent;
use App\Events\RealTimeMessage;

Route::get('/broadcast', function() {
    //event(new App\Events\RealTimeMessage('Hello World'));
    broadcast(new WebsocketDemoEvent("some data"));
    return "broadcast has been sent!";
});
Route::get('/pusher', function() {
    event(new RealTimeMessage('Hello World'));
    return "Event has been sent!";
});

Route::get('admin/chats', ['uses' =>'ChatsController@index']);

Route::get('get/orderhistory', function() {
 $str_session = session()->get('orderhistory');
 $Object = json_decode($str_session,true);
 var_dump($Object);
});

Route::get('test/log', 'API\CallVoipController@testlog');
Route::get('/chat', function() {
    return view('teamilk.chat');
});
/*-----------------Grabcall------------------------*/
//Route::get('grabcall/webhook',"GrabCallController@getDataGrabCall")->name('grabcall.webhook');
//Route::group(['middleware' => 'auth'], function() {
	Route::post('grabcall/webhook', ['uses' =>'GrabCallController@getDataGrabCall', 'as'=>'grabcall.webhook']);
	//Route::post('grabcall/getdatavoip', ['uses' =>'GrabCallController@getdatavoip', 'as'=>'grabcall.webhook']);
	
	//Route::get('grabcall/webhook', ['uses' =>'GrabCallController@getDataGrabCall', 'as'=>'grabcall.webhook']);
//});
Route::get('webhook/getevent', 'API\CallVoipController@getdatavoip');
/*-----------------END Grabcall------------------------*/
Route::get('/deletesession', function () {
      session()->forget('orderhistory');
      //session()->forget('profile');
});

//Route::get('/google8d563bc37a9098ac.html', function () {
	//return response()->view('verify-google')->header('Content-Type', 'text/html');
	//return view('verify-google'); 
//});
//Route::get('/robots.txt', function () {
	//return response()->view('robot')->header('Content-Type', 'text/html');
	//return view('robot');
//});
//api
//begin sitemap
// Route::get('/sitemap.xml', 'SitemapController@index');
// Route::get('/sitemap.xml/articles', 'SitemapController@articles');
// Route::get('/sitemap.xml/categories', 'SitemapController@categories');
//Route::get('/sitemap.xml/questions', 'SitemapController@questions');
//Route::get('/sitemap.xml/tags', 'SitemapController@tags');
//end sitemap
Route::get('/admin/testdata', function () {
        $totalSegsCount = count(\Request::segments());
        $url = '';
        for ($i = 0; $i < $totalSegsCount; $i++) { 
            $url .= \Request::segment($i+1)."/";
        }
        $url = rtrim($url, '/');
      	echo $url;
      	$_command = "select";
        $pattern_index = "/admin\/testdata$/";
        $pattern_create = "/admin\/aduser\/create$/";
        $pattern_edit = "/admin\/aduser\/[0-9]+\/edit$/";
        $matches = array();
        if (preg_match($pattern_index, $url, $matches)){
        	$_command = "select";
            $url = "admin/aduser";
        }elseif (preg_match($pattern_create, $url, $matches)){
        	$_command = "create";
            $url = "admin/aduser/create";
        }elseif (preg_match($pattern_edit, $url, $matches)){
        	$_command = "edit";
            $url = "admin/aduser/0/edit";
        }
        $result = array('url'=>$url,'command'=>$_command);
});

/*chat*/
//Route::get('messages',array( 'uses' => 'ChatsController@fetchMessages' ));
//Route::post('messages',array( 'uses' => 'ChatsController@sendMessage' ));
//Route::get('/chat/messages', ['uses' =>'ChatsController@fetchMessages', 'as'=>'admin']);
//Route::post('/chat/messages', ['uses' =>'ChatsController@sendMessage', 'as'=>'admin']);
//Broadcast::routes();
Broadcast::routes(['middleware' => ['auth:api']]);
Auth::routes();

/*end chat*/

Route::get('/cache/clear', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::post('/admin/tags/trash', ['uses' =>'Admin\TagController@trashtag']);

Route::get('makecall', ['uses' =>'Admin\PostsController@CreateInteractive']);
Route::post('makecall', ['uses' =>'Admin\PostsController@CreateInteractive']);

Route::any('/', array( 'as' => 'teamilk', 'uses' => 'teamilk\ProductController@show' ));
Route::get('/admin/dashboard', ['uses' =>'Admin\LoginController@CheckLogin', 'as'=>'admin']);
Route::post('/admin/dashboard', ['uses' =>'Admin\LoginController@CheckLogin', 'as'=>'admin']);
Route::get('admin/login', ['uses' =>'Admin\LoginController@getLogin', 'as'=>'admin']);
Route::post('admin/login', ['uses' =>'Admin\LoginController@getLogin', 'as'=>'admin']);
Route::get('admin/logout', ['uses' =>'Admin\LoginController@logout', 'as'=>'admin']);
//postlogin
Route::get('admin/postLogin', ['uses' =>'Admin\LoginController@postLogin', 'as'=>'admin']);
Route::post('admin/postLogin', ['uses' =>'Admin\LoginController@postLogin', 'as'=>'admin']);
//list product
Route::get('listproductbyidcate/{_idcategory}', ['uses' =>'teamilk\ProductController@listviewproductbyidcate']);
Route::post('listproductbyidcate/{_idcategory}', ['uses' =>'teamilk\ProductController@listviewproductbyidcate']);
//list post
Route::get('listtypepostbyidcate/{_idcategory}/{_posttype}', ['uses' =>'teamilk\ProductController@ListTypePostbyIdcate']);
Route::post('listtypepostbyidcate/{_idcategory}/{_posttype}', ['uses' =>'teamilk\ProductController@ListTypePostbyIdcate']);
//end list post type by idcate
Route::get('listproductbypage/{_idcategory}/{_page}', ['uses' =>'teamilk\ProductController@listproductbypage']);
Route::post('listproductbypage/{_idcategory}/{_page}', ['uses' =>'teamilk\ProductController@listproductbypage']);
//search
//Route::get('/search/page/{_page}/{_patterm}', ['uses' =>'teamilk\ProductController@searchbypage']);
//Route::post('/search/page/{_page}/{_patterm}', ['uses' =>'teamilk\ProductController@searchbypage']);
Route::get('/search/{_patterm}/page/{_page}', ['uses' =>'teamilk\ProductController@searchform']);
Route::post('/search/{_patterm}/page/{_page}', ['uses' =>'teamilk\ProductController@searchform']);
//Route::post('/search/{_patterm}/page/{_page}/{_posttype}', ['uses' =>'teamilk\ProductController@searchform']);
//contact
Route::get('helper/contact', ['uses' =>'Helper\ContactController@contact']);
Route::post('helper/contact', ['uses' =>'Helper\ContactController@contact']);

Route::get('/{_slug}/page/{_page}', ['uses' =>'teamilk\ProductController@slugbypage']);
Route::post('/{_slug}/page/{_page}', ['uses' =>'teamilk\ProductController@slugbypage']);

Route::get('listproductbyidcategory/{_idcategory}/{_page}/{_limit}', ['uses' =>'teamilk\ProductController@listproductbyidcategory']);
Route::post('listproductbyidcategory/{_idcategory}/{_page}/{_limit}', ['uses' =>'teamilk\ProductController@listproductbyidcategory']);
Route::get('latestproductbyidcate/{_idcategory}/{_limit}', ['uses' =>'teamilk\ProductController@LatestProductByIdcate']);
Route::post('latestproductbyidcate/{_idcategory}/{_limit}', ['uses' =>'teamilk\ProductController@LatestProductByIdcate']);
//show post type
Route::get('showpost/{_namecattype}/{idproduct}', ['uses' =>'teamilk\ProductController@showposttype']);
Route::post('showpost/{_namecattype}/{idproduct}', ['uses' =>'teamilk\ProductController@showposttype']);
//add cart
Route::post('teamilk/deletesession', ['uses' =>'teamilk\ProductController@delete_sesstion']);
Route::get('teamilk/deletesession', ['uses' =>'teamilk\ProductController@delete_session']);
Route::post('teamilk/getsesstion', ['uses' =>'teamilk\ProductController@get_sesstion']);
Route::get('teamilk/getsesstion', ['uses' =>'teamilk\ProductController@get_sesstion']);
Route::get('orderhistory', ['uses' =>'teamilk\ProductController@orderhistory']);
Route::post('orderhistory', ['uses' =>'teamilk\ProductController@orderhistory']);
//change session quality
Route::get('teamilk/changequality', ['uses' =>'teamilk\ProductController@changequality']);
Route::post('teamilk/changequality', ['uses' =>'teamilk\ProductController@changequality']);
Route::get('teamilk/cartnumber', ['uses' =>'teamilk\ProductController@cartnumber']);
Route::post('teamilk/cartnumber', ['uses' =>'teamilk\ProductController@cartnumber']);
Route::get('cart/shopcart', ['uses' =>'teamilk\ShopCartController@index']);
Route::post('cart/shopcart', ['uses' =>'teamilk\ShopCartController@index']);
//add cart
Route::get('cart/checkout', ['uses' =>'teamilk\ShopCartController@checkout']);
Route::post('cart/checkout', ['uses' =>'teamilk\ShopCartController@checkout']);
//submit checkout
Route::get('cart/submitcheckout', ['uses' =>'teamilk\ShopCartController@submitcheckout']);
Route::post('cart/submitcheckout', ['uses' =>'teamilk\ShopCartController@submitcheckout']);
//add cart
Route::get('teamilk/complete/{ordernumber}', ['uses' =>'teamilk\ShopCartController@complete']);
Route::post('teamilk/complete/{ordernumber}', ['uses' =>'teamilk\ShopCartController@complete']);

//product
Route::resource('product','teamilk\ProductController', array('as'=>'teamilk'));
//post
Route::resource('post','teamilk\PostController', array('as'=>'teamilk'));
//user

//oute::post('login', ['uses' => 'Auth\LoginController@getLogin']);
Route::get('client/login', ['as' => 'login', 'uses' => 'Auth\LoginController@getLogin']);
Route::post('client/login', ['as' => 'login', 'uses' => 'Auth\LoginController@getLogin']);
Route::get('client/postlogin', ['as' => 'Auth', 'uses' => 'Auth\LoginController@postLogin']);
Route::post('client/postlogin', ['as' => 'Auth', 'uses' => 'Auth\LoginController@postLogin']);
Route::get('client/register', ['as' => 'Auth', 'uses' => 'Auth\RegisterController@register']);
Route::post('client/register', ['as' => 'Auth', 'uses' => 'Auth\RegisterController@register']);
//login modal
Route::get('teamilk/complete', ['uses' =>'teamilk\ShopCartController@complete']);
Route::post('teamilk/complete', ['uses' =>'teamilk\ShopCartController@complete']);
//login modal
Route::get('loginmodal', 'Auth\LoginController@postloginmodal');
Route::post('loginmodal', 'Auth\LoginController@postloginmodal');
Route::get('client/logout','Auth\LoginController@logout');
Route::get('client/signout','Auth\LoginController@signout');
Route::post('client/signout','Auth\LoginController@signout');
Route::get('profile/{_iduser}', function () {
     if (!Auth::check()) {
     		return redirect('admin/login');
        } 
});
Route::post('ckeditor/upload', 'CKEditorController@uploadDataULR')->name('ckeditor.upload');
//Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function()
Route::group(['middleware' => 'auth'], function() {
	/*tag*/
	Route::get('admin/listtag', 'Admin\TagController@listtag');
	Route::post('admin/listtag', 'Admin\TagController@listtag');
	Route::resource('admin/tag' , 'Admin\TagController', array('as'=>'admin') );
	/*end tag*/
	/*dashboard*/
	Route::get('admin/dashboard/report', ['uses' =>'Admin\ReportController@dashboardreport', 'as'=>'Admin']);
	Route::post('admin/dashboard/report', ['uses' =>'Admin\ReportController@dashboardreport', 'as'=>'Admin']);
	/*end dashboard*/
	//account
	Route::get('profile/{_iduser}', 'account\AccountController@getprofile');
	Route::post('profile/{_iduser}', 'account\AccountController@getprofile');
	Route::get('updateprofile/{_iduser}', 'account\AccountController@update');
	Route::post('updateprofile/{_iduser}', 'account\AccountController@update');
	Route::get('changepassword/{_iduser}', 'account\AccountController@changepassword');
	Route::post('changepassword/{_iduser}', 'account\AccountController@changepassword');
	Route::post('profile/uploadavatar/{iduser}/{idprofile}',['uses' =>'account\AccountController@uploadavatar']);
	Route::get('profile/uploadavatar/{iduser}/{idprofile}',['uses' =>'account\AccountController@uploadavatar']);
	Route::resource('svcustomer','SvCustomerController');
	Route::resource('svposttype','SvPostTypeController');
	//Route::get('svpost/makepost', 'SvPostController@makepost');
	//Route::post('svpost/makepost', 'SvPostController@makepost');
	Route::resource('svpost','SvPostController');
	Route::resource('category','CategoryController');
	Route::get('admin/aduser/departmentby/{_idcatetype}', 'Admin\AduserController@catebyidcatetype');
	Route::post('admin/aduser/departmentby/{_idcatetype}', 'Admin\AduserController@catebyidcatetype');
    Route::resource('admin/aduser' , 'Admin\AduserController', array('as'=>'admin') );
	Route::resource('admin/adsvcustomer' , 'Admin\AdsvcustomerController', array('as'=>'admin') );
	Route::get('admin/category/listcategorybyid', 'Admin\CategoryController@listcatbyidcat');
	Route::post('admin/category/listcategorybyid', 'Admin\CategoryController@listcatbyidcat');
	Route::get('admin/category/catebyidcatetype/{_idcatetype}', 'Admin\CategoryController@category_by_idcatetype');
	Route::post('admin/category/catebyidcatetype/{_idcatetype}', 'Admin\CategoryController@category_by_idcatetype');
	Route::get('admin/categoryby/{_namecattype}', ['uses' =>'Admin\CategoryController@CategoryBynametype', 'as'=>'admin']);
	Route::post('admin/categoryby/{_namecattype}', ['uses' =>'Admin\CategoryController@CategoryBynametype', 'as'=>'admin']);

	Route::get('admin/categoryby/{_namecattype}/{_cattype}', ['uses' =>'Admin\CategoryController@storebynametype', 'as'=>'admin']);
	Route::post('admin/categoryby/{_namecattype}/{_cattype}', ['uses' =>'Admin\CategoryController@storebynametype', 'as'=>'admin']);

	Route::get('admin/category/createby/{_namecattype}' , ['uses' =>'Admin\CategoryController@createby', 'as'=>'admin'] );
	Route::post('admin/category/createby/{_namecattype}' , ['uses' =>'Admin\CategoryController@createby', 'as'=>'admin'] );
	Route::get('admin/category/storeby/{_namecattype}' , ['uses' =>'Admin\CategoryController@storeby', 'as'=>'admin'] );
	Route::post('admin/category/storeby/{_namecattype}' , ['uses' =>'Admin\CategoryController@storeby', 'as'=>'admin'] );
	Route::get('admin/category/editbycatetype/{_idcategory}/{_idcattype}', ['as' => 'admin.category.editbycatetype', 'uses' => 'Admin\CategoryController@editbycatetype']);
	Route::post('admin/category/editbycatetype/{_idcategory}/{_idcattype}', ['as' => 'admin.category.editbycatetype', 'uses' => 'Admin\CategoryController@editbycatetype']);
	Route::resource('admin/category' , 'Admin\CategoryController', array('as'=>'admin') );
	Route::get('admin/menu/hasidcate/{_idmenu}', 'Admin\MenuController@menuhasidcate');
	Route::post('admin/menu/hasidcate/{_idmenu}', 'Admin\MenuController@menuhasidcate');
	Route::resource('admin/menu' , 'Admin\MenuController', array('as'=>'admin') );
	Route::resource('admin/perm_command' , 'Admin\perm_commandContronler', array('as'=>'admin') );
	Route::get('admin/menu/additem/{_idmenu}', 'Admin\MenuHasCateController@AddMenuItem');
	Route::post('admin/menu/additem/{_idmenu}', 'Admin\MenuHasCateController@AddMenuItem');
	Route::get('admin/menuhascate/bytype/{_namecattype}', 'Admin\MenuHasCateController@catebytype');
	Route::post('admin/menuhascate/bytype/{_namecattype}', 'Admin\MenuHasCateController@catebytype');
	Route::get('admin/menuhascate/bytypeperm/{_namecattype}','Admin\MenuHasCateController@catepermissionbytype');
	Route::post('admin/menuhascate/bytypeperm/{_namecattype}', 'Admin\MenuHasCateController@catepermissionbytype');
	Route::get('admin/menuhascate/trash/{_idmenuhascate}','Admin\MenuHasCateController@trashidmenucate');
	Route::post('admin/menuhascatebyidmenu/{_idmenu}','Admin\MenuHasCateController@menuhascatebyidmenu');
	Route::get('admin/menuhascatebyidmenu/{_idmenu}','Admin\MenuHasCateController@menuhascatebyidmenu');
	Route::post('admin/menuhascate/trash/{_idmenuhascate}','Admin\MenuHasCateController@trashidmenucate');
	Route::resource('admin/menuhascate' , 'Admin\MenuHasCateController', array('as'=>'admin') );
	Route::get('admin/svpost/makepost', 'Admin\SvPostController@makepost');
	Route::post('admin/svpost/makepost', 'Admin\SvPostController@makepost');
	Route::resource('admin/svpost' , 'Admin\SvPostController', array('as'=>'admin') );
	Route::resource('admin/svposttype' , 'Admin\SvPostTypeController', array('as'=>'admin') );
	//customer register
	Route::get('admin/customerreg/interactive', 'Admin\CustomerRegController@make_interactive');
	Route::post('admin/customerreg/interactive', 'Admin\CustomerRegController@make_interactive');
	Route::get('admin/customerreg/interactivecustomer', ['uses' =>'Admin\CustomerRegController@interactive_customer', 'as'=>'admin']);
	Route::post('admin/customerreg/interactivecustomer', ['uses' =>'Admin\CustomerRegController@interactive_customer', 'as'=>'admin']);
	Route::get('admin/customerreg/listcustomerbydate/{_idcategory}/{_id_post_type}/{_id_status_type}', ['uses' =>'Admin\CustomerRegController@ListCustomerByDate', 'as'=>'admin']);
	Route::post('admin/customerreg/listcustomerbydate/{_idcategory}/{_id_post_type}/{_id_status_type}', ['uses' =>'Admin\CustomerRegController@ListCustomerByDate', 'as'=>'admin']);
	Route::get('admin/customerreg/listcustomerbycat/{_idcategory}/{_id_post_type}/{_id_status_type}', ['uses' =>'Admin\CustomerRegController@ListCustomerByCat', 'as'=>'admin']);
	Route::post('admin/customerreg/listcustomerbycat/{_idcategory}/{_id_post_type}/{_id_status_type}', ['uses' =>'Admin\CustomerRegController@ListCustomerByCat', 'as'=>'admin']);
	//show detail
	Route::get('admin/customerreg/{_idimport}', ['uses' =>'Admin\CustomerRegController@show', 'as'=>'admin']);
	Route::post('admin/customerreg/{_idimport}', ['uses' =>'Admin\CustomerRegController@show', 'as'=>'admin']);
	//end show detail
	Route::resource('admin/customerreg' , 'Admin\CustomerRegController', array('as'=>'admin') );
	//post management

	Route::post('admin/listpost/{posttype}',['uses' =>'Admin\PostsController@listpost', 'as'=>'admin']);
	Route::get('admin/listpost/{posttype}',['uses' =>'Admin\PostsController@listpost', 'as'=>'admin']);
	//create by posttype
	Route::post('admin/createby/{posttype}',['uses' =>'Admin\PostsController@createby', 'as'=>'admin']);
	Route::get('admin/createby/{posttype}',['uses' =>'Admin\PostsController@createby', 'as'=>'admin']);

	Route::post('admin/createcrosby/{posttype}/{idparent}',['uses' =>'Admin\PostsController@createcrossby', 'as'=>'admin']);
	Route::get('admin/createcrosby/{posttype}/{idparent}',['uses' =>'Admin\PostsController@createcrossby', 'as'=>'admin']);
	//store by post type
	Route::post('admin/storeby/{posttype}',['uses' =>'Admin\PostsController@storeby', 'as'=>'admin']);
	Route::get('admin/storeby/{posttype}',['uses' =>'Admin\PostsController@storeby', 'as'=>'admin']);
	//list type
	Route::post('admin/listpostbytype/{posttype}',['uses' =>'Admin\PostsController@listpostbytype', 'as'=>'admin']);
	Route::get('admin/listpostbytype/{posttype}',['uses' =>'Admin\PostsController@listpostbytype', 'as'=>'admin']);

	Route::post('admin/latestpostbytype/{posttype}',['uses' =>'Admin\PostsController@latestpostbytype', 'as'=>'admin']);
	Route::get('admin/latestpostbytype/{posttype}',['uses' =>'Admin\PostsController@latestpostbytype', 'as'=>'admin']);

	Route::get('admin/post/listcatbyidcat', 'Admin\CategoryController@listcatbyidcat');
	Route::post('admin/post/listcatbyidcat', 'Admin\CategoryController@listcatbyidcat');
	Route::get('admin/post/editbycattype/{idproduct}/{namcattype}/{idposttype}', 'Admin\PostsController@editbycattype');
	Route::post('admin/post/editbycattype/{idproduct}/{namcattype}{idposttype}', 'Admin\PostsController@editbycattype');

	Route::post('admin/post/makenewcrosstype/{_idproduct}',['uses' =>'Admin\PostsController@makenewcrosstype', 'as'=>'admin']);
	Route::get('admin/post/makenewcrosstype/{_idproduct}',['uses' =>'Admin\PostsController@makenewcrosstype', 'as'=>'admin']);

	Route::post('admin/post/cross/{_idproduct}',['uses' =>'Admin\PostsController@crossproduct', 'as'=>'admin']);
	Route::get('admin/post/cross/{_idproduct}',['uses' =>'Admin\PostsController@crossproduct', 'as'=>'admin']);

	Route::post('/admin/post/listproductbyidcate',['uses' =>'Admin\PostsController@listproductbyidcate', 'as'=>'admin']);
	Route::get('/admin/post/listproductbyidcate/{_idcat}/{_idproduct}',['uses' =>'Admin\PostsController@listproductbyidcate', 'as'=>'admin']);

	Route::post('admin/post/updatecategory/{_idcat}/{_idproduct}/{_checked}/{__hidden_idcate}',['uses' =>'Admin\PostsController@updateidcategory', 'as'=>'admin']);
	Route::get('admin/post/updatecategory/{_idcat}/{_idproduct}/{_checked}/_hidden_idcate',['uses' =>'Admin\PostsController@updateidcategory', 'as'=>'admin']);
	
	Route::resource('admin/post' , 'Admin\PostsController', array('as'=>'admin') );
	Route::resource('admin/posttype' , 'Admin\PostTypeController', array('as'=>'admin') );
	Route::resource('admin/cattype' , 'Admin\CategoryTypeController', array('as'=>'admin') );
	Route::resource('admin/statustype' , 'Admin\StatusTypeController', array('as'=>'admin') );
	Route::resource('admin/option' , 'Admin\OptionController', array('as'=>'admin') );
	//upload file
	Route::post('admin/upload' , 'Admin\UploadController@upload');
	Route::get('admin/upload' , 'Admin\UploadController@upload');
	Route::post('admin/uploadfile' , 'Admin\UploadController@uploadfile');
	Route::get('admin/uploadfile' , 'Admin\UploadController@uploadfile');
	Route::post('admin/files/uploaddataurl' , 'Admin\FilesController@uploadDataULR');
	Route::get('admin/files/uploaddataurl' , 'Admin\FilesController@uploadDataULR');
	Route::post('admin/files/uploadfile' , 'Admin\FilesController@uploadfile');
	Route::get('admin/files/uploadfile' , 'Admin\FilesController@uploadfile');
	Route::resource('admin/files' , 'Admin\FilesController', array('as'=>'admin'));
	//deparment
	Route::get('admin/department/listdepartmentbyid', 'Admin\DepartmentController@listdepartmentbyid');
	Route::post('admin/department/listdepartmentbyid', 'Admin\DepartmentController@listdepartmentbyid');
	Route::resource('admin/department','Admin\DepartmentController', array('as'=>'admin'));
	//products
	Route::post('admin/producthasfile/delete',['uses' =>'Admin\ProductsController@trash', 'as'=>'admin']);
	Route::get('admin/producthasfile/delete',['uses' =>'Admin\ProductsController@trash', 'as'=>'admin']);

	Route::post('admin/product/categorybyid/{_cattype}/{_idcat}',['uses' =>'Admin\ProductsController@categorybyid', 'as'=>'admin']);
	Route::get('admin/product/categorybyid/{_cattype}/{_idcat}',['uses' =>'Admin\ProductsController@categorybyid', 'as'=>'admin']);

	Route::post('admin/product/categorybyid/{_cattype}/{_idcat}/{_idproduct}',['uses' =>'Admin\ProductsController@categorybyid', 'as'=>'admin']);
	Route::get('admin/product/categorybyid/{_cattype}/{_idcat}/{_idproduct}',['uses' =>'Admin\ProductsController@categorybyid', 'as'=>'admin']);
	Route::post('admin/product/listcategorybyid/{_cattype}/{_idcat}/{_idproduct}',['uses' =>'Admin\ProductsController@listcategorybyid', 'as'=>'admin']);
	Route::get('admin/product/listcategorybyid/{_cattype}/{_idcat}/{_idproduct}',['uses' =>'Admin\ProductsController@listcategorybyid', 'as'=>'admin']);
	Route::post('admin/product/updatecategory/{_idcat}/{_idproduct}/{_checked}/{__hidden_idcate}',['uses' =>'Admin\ProductsController@updateidcategory', 'as'=>'admin']);
	Route::get('admin/product/updatecategory/{_idcat}/{_idproduct}/{_checked}/_hidden_idcate',['uses' =>'Admin\ProductsController@updateidcategory', 'as'=>'admin']);
	Route::post('/admin/product/listproductbyidcate',['uses' =>'Admin\ProductsController@listproductbyidcate', 'as'=>'admin']);
	Route::get('/admin/product/listproductbyidcate/{_idcat}/{_idproduct}',['uses' =>'Admin\ProductsController@listproductbyidcate', 'as'=>'admin']);

	Route::post('admin/product/cross/{_idproduct}',['uses' =>'Admin\ProductsController@crossproduct', 'as'=>'admin']);
	Route::get('admin/product/cross/{_idproduct}',['uses' =>'Admin\ProductsController@crossproduct', 'as'=>'admin']);

	Route::post('admin/product/makenewcrosstype/{_idproduct}',['uses' =>'Admin\ProductsController@makenewcrosstype', 'as'=>'admin']);
	Route::get('admin/product/makenewcrosstype/{_idproduct}',['uses' =>'Admin\ProductsController@makenewcrosstype', 'as'=>'admin']);

	Route::post('admin/listproduct',['uses' =>'Admin\ProductsController@listproduct', 'as'=>'admin']);
	Route::get('admin/listproduct',['uses' =>'Admin\ProductsController@listproduct', 'as'=>'admin']);

	Route::post('admin/lstcategorybyid/{_idcat}/{_cattype}',['uses' =>'Admin\PostsController@lstcategorybyid', 'as'=>'admin']);
	Route::get('admin/lstcategorybyid/{_idcat}/{_cattype}',['uses' =>'Admin\PostsController@lstcategorybyid', 'as'=>'admin']);

	Route::post('admin/LstcatebyIdcate/{_cattype}/{_idcat}',['uses' =>'Helper\HelperController@category_primary', 'as'=>'admin']);
	Route::get('admin/LstcatebyIdcate/{_cattype}/{_idcat}',['uses' =>'Helper\HelperController@category_primary', 'as'=>'admin']);

	Route::post('admin/ListCateByTypeId/{_cattype}/{_idcat}',['uses' =>'Admin\ProductsController@ListCateByTypeId', 'as'=>'admin']);
	Route::get('admin/ListCateByTypeId/{_cattype}/{_idcat}',['uses' =>'Admin\ProductsController@ListCateByTypeId', 'as'=>'admin']);

	Route::post('admin/ListCateByTypeId/{_cattype}/{_idcat}',['uses' =>'Admin\ProductsController@ListCateByTypeId', 'as'=>'admin']);
	Route::get('admin/ListCateByTypeId/{_cattype}/{_idcat}',['uses' =>'Admin\ProductsController@ListCateByTypeId', 'as'=>'admin']);

	Route::resource('admin/product','Admin\ProductsController', array('as'=>'admin'));
	//grant permistio
	Route::resource('admin/roles','Admin\RoleController', array('as'=>'admin'));

	Route::get('admin/permission/bytype/{_namecattype}', 'Admin\PermissionController@catebytypehtml');
	Route::post('admin/permission/bytype/{_namecattype}', 'Admin\PermissionController@catebytypehtml');
	Route::resource('admin/permission','Admin\PermissionController', array('as'=>'admin'));
	
    Route::resource('admin/impperm','Admin\ImpPermController', array('as'=>'admin'));
    Route::resource('admin/grantperm','Admin\GrantController', array('as'=>'admin'));
    Route::resource('admin/supplier','Admin\SupplierControler', array('as'=>'admin'));
    //profile
    Route::post('admin/profile/uploadavatar/{iduser}/{idprofile}',['uses' =>'ProfileController@uploadavatar']);
	Route::get('admin/profile/uploadavatar/{iduser}/{idprofile}',['uses' =>'ProfileController@uploadavatar']);
    Route::get('admin/profile/{iduser}', ['uses' =>'ProfileController@show']);
	Route::post('admin/profile/{iduser}', ['uses' =>'ProfileController@show']);
	Route::get('admin/profile/update/{iduser}', ['uses' =>'ProfileController@update']);
	Route::post('admin/profile/update/{iduser}', ['uses' =>'ProfileController@update']);
	Route::get('admin/profile/changepassword/{iduser}', ['uses' =>'ProfileController@changepassword']);
	Route::post('admin/profile/changepassword/{iduser}', ['uses' =>'ProfileController@changepassword']);
	Route::resource('admin/profile','ProfileController');
	//list order
	Route::post('admin/orderlist/show/{_ordernumber}/{_idstore}',['uses' =>'Admin\OrdersManagementController@show']);
	Route::get('admin/orderlist/show/{_ordernumber}/{_idstore}',['uses' =>'Admin\OrdersManagementController@show']);
	//epos printer
	Route::post('admin/orderlist/epos/{_ordernumber}/{_idstore}',['uses' =>'Admin\OrdersManagementController@epos']);
	Route::get('admin/orderlist/epos/{_ordernumber}/{_idstore}',['uses' =>'Admin\OrdersManagementController@epos']);
	//end epos
	Route::post('admin/orderlist/{_idstore}',['uses' =>'Admin\OrdersManagementController@listorder']);
	Route::get('admin/orderlist/{_idstore}',['uses' =>'Admin\OrdersManagementController@listorder']);
	Route::post('admin/orderlist/moveto/{_ordernumber}/{_idstore}',['uses' =>'Admin\OrdersManagementController@moveto']);
	Route::get('admin/orderlist/moveto/{_ordernumber}/{_idstore}',['uses' =>'Admin\OrdersManagementController@moveto']);
	Route::resource('admin/importproduct','Admin\ImportProductController', array('as'=>'admin'));
});
Route::get('/{_slug}' , ['uses' =>'teamilk\ProductController@productbyslug'] );