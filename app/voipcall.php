<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class voipcall extends Model
{
    use HasFactory;
	protected $primaryKey = 'idvoip';
    protected $fillable = ['idproduct','linkedid','extend','state','phone','type','content','created_at','updated_at'];
}
