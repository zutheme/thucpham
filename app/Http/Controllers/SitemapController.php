<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Products;
use App\category;

//use App\Question;
//use App\Tag;
class SitemapController extends Controller
{
    public function index(){
      return response()->view('sitemap.index')->header('Content-Type', 'text/xml');
    }
    public function articles() {
        $result = DB::select('call SitemapAllCustomPostProcedure(?)',array('post'));
        $articles = json_decode(json_encode($result));
        return response()->view('sitemap.articles', [
            'articles' => $articles,
        ])->header('Content-Type', 'text/xml');
    }

    public function categories(){
        //$categories = category::all();
        $result = DB::select('call ListAllCateSiteMapProcedure()');
        $categories = json_decode(json_encode($result));
        return response()->view('sitemap.categories', [
            'categories' => $categories,
        ])->header('Content-Type', 'text/xml');
    }
}
