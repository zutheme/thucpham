<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class flcustomer extends Model
{
    use HasFactory;
    protected $primaryKey = 'idflcustomer';
    protected $fillable = ['ip','phone','time','url','facebookName','facebookUid','carrier','created_at','updated_at'];
}
