<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogcomment extends Model
{
    use HasFactory;
    protected $table = 'blog_comments';
    protected $fillable = ['blog_id','name','email','comment','reply','status','created_at','updated_at'];
}
