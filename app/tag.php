<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    use HasFactory;
	protected $primaryKey = 'idtag';
    protected $fillable = ['nametag','created_at','updated_at'];
}
