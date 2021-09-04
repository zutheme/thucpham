<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    protected $primaryKey = 'option_id';
    protected $fillable = ['option_name','option_value','autoload','created_at','updated_at'];
}
