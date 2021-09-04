<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $primaryKey = 'idproduct';
    protected $fillable = ['namepro','sku_category','sku_product','slug','short_desc','description','idsize','idcolor','id_post_type','idstatus_type','version','link', 'feature','template','seo_desc','keyword','idyoutube','post_author','idstatusprocess','iddirect','created_at','updated_at'];
}
