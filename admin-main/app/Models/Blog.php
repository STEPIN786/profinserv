<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blog';
    protected $fillable = ['blog_cat_id','title','slug','img_name','thumb_image','description','created_at', 'updated_at'];
}
