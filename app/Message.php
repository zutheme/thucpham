<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //use HasFactory;
    protected $fillable = ['message']; 
	public function user(){
		$this->belongsTo(User::class);
	}
}
