<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*

|--------------------------------------------------------------------------

| API Routes

|--------------------------------------------------------------------------

|

| Here is where you can register API routes for your application. These

| routes are loaded by the RouteServiceProvider within a group which

| is assigned the "api" middleware group. Enjoy building your API!

|

*/


//Route::middleware('auth:api')->get('/user', function (Request $request) {

    //return $request->user();

//});

Route::post('/login', 'API\UserController@login');

Route::post('/register', 'API\UserController@register');

//Route::group(['middleware' => 'auth:api'], function(){

Route::post('/details', 'API\UserController@details');

//});

Route::post('/ladiregister', 'API\UserController@ladiregister');


Route::get('/svcustomers', 'API\svcustomerController@index');

//Route::get('svcustomers/{svcustomer}', 'API\svcustomerController@show');

Route::post('/svcustomers', 'API\svcustomerController@postcustomer');

Route::post('/ladicon', ['uses' =>'API\LadiController@register']);
Route::get('/ladicon', ['uses' =>'API\LadiController@register']);

//Route::group([
    //'middleware' => ['api', 'cors']
//], function () {
    Route::post('/middleladicon', ['uses' =>'API\LadiController@register']);
    Route::get('/middleladicon', ['uses' =>'API\LadiController@register']);
//});
Route::post('/getLoginStatus', ['uses' =>'API\LadiController@getLoginStatus']);
Route::get('/getLoginStatus', ['uses' =>'API\LadiController@getLoginStatus']);
//Route::put('svcustomers/{svcustomer}', 'API\svcustomerController@update');

//Route::delete('svcustomers/{svcustomer}', 'API\svcustomerController@delete');

Route::post('/customer/consultants', 'API\ConsultantController@createconsultant');
Route::get('/customer/consultants', 'API\ConsultantController@createconsultant');
/**/
//Route::post('/customer/consultants', 'API\svcustomerController@consultant');
//Route::post('/customer/game', 'API\svcustomerController@game');
//Route::post('/login/api', 'Auth\AuthController@login');
//Route::post('/signup/api', 'Auth\AuthController@signup');
Route::get('/logout', 'Auth\AuthController@logout');
Route::get('/user', 'Auth\AuthController@user');
Route::post('/user', 'Auth\AuthController@user');
// Route::group(['middleware' => 'auth:api'], function () {
// 	Route::get('/logout/api', 'Auth\AuthController@logout');
// 	Route::get('/user/api', 'Auth\AuthController@user');
// 	Route::post('/user/api', 'Auth\AuthController@user');
// }); 
/*Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
  
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});*/
Route::get('callvoip/getevent', 'API\CallVoipController@getdatavoip');
Route::post('callvoip/getevent', 'API\CallVoipController@getdatavoip');
