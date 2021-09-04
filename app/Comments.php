<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    //use HasFactory;
    protected $primaryKey = 'comment_ID';
    protected $fillable = ['comment_post_ID','comment_author','comment_author_email','comment_author_url','comment_author_IP','comment_date_gmt','comment_content','comment_karma','comment_approved','comment_agent','comment_type','comment_parent','user_id','comment_phone','comment_address','created_at','updated_at'];
}
