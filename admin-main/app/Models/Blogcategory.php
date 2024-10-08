<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogcategory extends Model
{
    use HasFactory;
    protected $table = 'blog_category';
    protected $fillable = ['name','created_at', 'updated_at'];
}
