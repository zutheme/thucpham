<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;
    protected $primaryKey = 'idclient';
    protected $fillable = ['firstname','middle','lastname','address','phone','email','facebookName','facebookUid','created_at','updated_at'];
}
