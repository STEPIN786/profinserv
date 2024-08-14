<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogsDetailsController extends Controller
{
    public function index()
    {
        return view('frontend.blogsdetails');   
    }
    
      public function detail($id)
    {

        return view('frontend.blogsdetails', compact(
            'blog', 'recent_blogs', 'categories', 'comments'
        ));  
    }
    
    
}
