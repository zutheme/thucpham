<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use Auth; 
use Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\UrlGenerator;
use App\User;

// use App\Http\Controllers\ControllerName;
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    //private $main_menu = '';
    public function boot()
    {
        View::composer(array('admin.general'), function ($view) {
            if (Auth::check()) {
                  //$user = Auth::user(); 
                  $iduser = Auth::id(); 
                  $user = user::find($iduser);
                  $view->with(compact('user'));
                  
              } else {
                  return redirect('admin/login');
              }
            // $view->with(compact('rs_menu1'));
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register(){
        //
    }
  
   
}
