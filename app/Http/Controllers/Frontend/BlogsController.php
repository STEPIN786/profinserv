<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Blogcategory;
use App\Models\Blogcomment;
use Illuminate\Support\Facades\File;
use DB;

class BlogsController extends Controller
{
    public function index()
    {
        $blogs = DB::table('blog')
        ->join('blog_category','blog_category.id','=','blog.blog_cat_id')
        ->select('blog.*','blog_category.id AS blogcatid','blog_category.name AS bolgcatname')
        ->orderBy('blog.id', 'desc')
        ->paginate(6);

        foreach ($blogs as $blog) {
            $blog->img_name = "https://profinser.in/admin-main/public/upload/blog/".$blog->img_name;
            $blog->thumb_image = "https://profinser.in/admin-main/public/upload/blog/".$blog->thumb_image;
            $blog->blog_date = date('F d, Y', strtotime($blog->created_at));
        }
        $categories = Blogcategory::all();
        foreach ($categories as $category) {
            $blog_count = Blog::where('blog_cat_id', $category->id)->count();
            $category->blog_count = $blog_count;
        }
        return view('frontend.blogs', compact(
            'blogs' , 'categories'
        ));  
    }
    
    public function catagory_list($id)
    {
        $blogs = DB::table('blog')
            ->join('blog_category','blog_category.id','=','blog.blog_cat_id')
            ->where('blog.blog_cat_id','=',$id)
            ->select('blog.*','blog_category.id AS blogcatid','blog_category.name AS bolgcatname')
            ->paginate(6);
            
                
        if ($blogs->count() == 0) {
            return redirect()->back();
        }

        foreach ($blogs as $blog) {
            $blog->img_name = "https://profinser.in/admin-main/public/upload/blog/".$blog->img_name;
            $blog->thumb_image = "https://profinser.in/admin-main/public/upload/blog/".$blog->thumb_image;
            $blog->blog_date = date('F d, Y', strtotime($blog->created_at));
        }

        return view('frontend.blogs', compact(
            'blogs' , 'categories'
        ));  
    }
    
    public function detail($id)
    {
        $blog = DB::table('blog')
                ->join('blog_category','blog_category.id','=','blog.blog_cat_id')
                ->where('blog.id','=',$id)
                ->select('blog.*','blog_category.id AS blogcatid','blog_category.name AS bolgcatname')
                ->first();
        if (empty($blog)) {
            return redirect()->back();
        }
        $blog->img_name = "https://profinser.in/admin-main/public/upload/blog/".$blog->img_name;
        $blog->thumb_image = "https://profinser.in/admin-main/public/upload/blog/".$blog->thumb_image;
        $blog->blog_date = date('F d, Y', strtotime($blog->created_at));


        $recent_blogs = DB::table('blog')
                ->join('blog_category','blog_category.id','=','blog.blog_cat_id')
                ->where('blog.id','<>',$id)
                ->select('blog.*','blog_category.id AS blogcatid','blog_category.name AS bolgcatname')
                ->orderBy('blog.id', 'desc')
                ->get();
                
        foreach ($recent_blogs as $recent_blog) {
            $recent_blog->img_name = "https://profinser.in/admin-main/public/upload/blog/thumbnail/".$recent_blog->img_name;
            $recent_blog->thumb_image = "https://profinser.in/admin-main/public/upload/blog/thumbnail/".$recent_blog->thumb_image;
            $recent_blog->blog_date = date('F d, Y', strtotime($recent_blog->created_at));
        }


        $categories = Blogcategory::all();
        foreach ($categories as $category) {
            $blog_count = Blog::where('blog_cat_id', $category->id)->count();
            $category->blog_count = $blog_count;
        }
        
        $comments  = Blogcomment::where('blog_id', $id)->where('status', 1)->get();
        foreach ($comments as $comment) {
            $comment->date = date('F d, Y', strtotime($comment->created_at));
        }

        return view('frontend.blogsdetails', compact(
            'blog', 'recent_blogs', 'categories', 'comments'
        ));  
    }
    
    public function comment_store(Request $request) {
        if (!$request->blog_id) {
            return redirect()->back();
        }
        $datetime = date('Y-m-d H:i:s');
        $Blogcomment = new Blogcomment;
        $Blogcomment->blog_id = $request->blog_id;
        $Blogcomment->name = $request->name;
        $Blogcomment->email = $request->email;
        $Blogcomment->comment = $request->comment;
        $Blogcomment->status = 2;
        $Blogcomment->created_at = $datetime;
        $Blogcomment->updated_at = $datetime;
        $Blogcomment->save();

        return redirect()->route('blog-detail', $request->blog_id);
    }
}
