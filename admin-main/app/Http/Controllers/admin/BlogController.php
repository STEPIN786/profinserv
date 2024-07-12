<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Blogcategory;
use App\Models\Blogcomment;
use Illuminate\Support\Facades\File;
use DB;

class BlogController extends Controller
{
    public function list()
    {
        $Blog = DB::table('blog')
                ->join('blog_category','blog_category.id','=','blog.blog_cat_id')
                ->select('blog.*','blog_category.id AS blogcatid','blog_category.name AS bolgcatname')
                ->get();
        return view('admin.blog.list', compact(
            'Blog'
        ));
    }

    public function add()
    {
        $Blog = new Blog;
        $Blogcategory = Blogcategory::all();
        return view('admin.blog.add', compact(
            'Blog',
            'Blogcategory'
        ));
    }

    public function store(Request $request)
    {
        if ($request->id == null) {

            $request->validate([
                'title' => 'required|unique:blog',
            ]);

            $Blog = new Blog;
            $Blog->blog_cat_id = $request->blog_cat_id;
            $Blog->title = $request->title;
            $slug = $this->srt_slug($request->title, 'blog');
            $Blog->slug = $slug;
            $addslash = addslashes($request->description);
            $Blog->description = $addslash;

            $randomName = '';
            if($request->hasFile('thumb_image') && $request->thumb_image != '')
            {
                $file = $request->file('thumb_image');
                $path = '/upload/blog';
                $randomName = $this->imageStore($file, $path);
                $Blog->thumb_image = $randomName;
            }

            $randomName1 = '';
            if($request->hasFile('img_name') && $request->img_name != '')
            {
                $file1 = $request->file('img_name');
                $path1 = '/upload/blog';
                $randomName1 = $this->imageStore($file1, $path1);
                $Blog->img_name = $randomName1;
            }
            $Blog->save();

            session()->flash('message', 'Blog Add Successfully');
        } else {

            $checkName = Blog::where([['id','<>',$request->id],['title','=',$request->title]])->first();
            // dd($checkName); exit();
            if ($checkName) {
                return redirect()->route('blog-list')->with('error', 'The title is already taken.');
            }

            $request->validate([
                'title' => 'required',
            ]);

            $Blog = Blog::find($request->id);
            $Blog->blog_cat_id = $request->blog_cat_id;
            $Blog->title = $request->title;
            $addslash = addslashes($request->description);
            $Blog->description = $addslash;

            if($request->hasFile('thumb_image') && $request->thumb_image != '')
            {
                if ($Blog->thumb_image) {
                    $file_path = public_path().'/upload/blog/'.$Blog->thumb_image;
                    $unlink = $this->imageUnlink($file_path);
                }

                $file = $request->file('thumb_image');
                $path = '/upload/blog';
                $randomName = $this->imageStore($file, $path);

                $Blog->thumb_image = $randomName;
            }

            if($request->hasFile('img_name') && $request->img_name != '')
            {
                if ($Blog->img_name) {
                    $file_path1 = public_path().'/upload/blog/'.$Blog->img_name;
                    $unlink1 = $this->imageUnlink($file_path1);
                }

                $file1 = $request->file('img_name');
                $path1 = '/upload/blog';
                $randomName1 = $this->imageStore($file1, $path1);

                $Blog->img_name = $randomName1;
            }
            $Blog->update();
            session()->flash('message', 'Blog Update Successfully');
        }
        return redirect()->route('blog-list');
    }

    public function edit($id)
    {
        $Blog = Blog::find($id);
        $Blogcategory = Blogcategory::all();
        if ($Blog != null) {
            return view('admin.blog.add', compact(
                'Blog',
                'Blogcategory'
            ));
        }
        return redirect()->route('blog-list');
    }

    public function delete($id)
    {
        $Blog = Blog::find($id);

        if ($Blog) {
            if ($Blog->img_name) {
                $file_path1 = public_path().'/upload/blog/'.$Blog->img_name;
                $unlink1 = $this->imageUnlink($file_path1);
            }
            if ($Blog->thumb_image) {
                $file_path = public_path().'/upload/blog/'.$Blog->thumb_image;
                $unlink = $this->imageUnlink($file_path);
            }
            $Blog->delete();
            session()->flash('message', 'Blog Delete Successfully');
        }
        return redirect()->route('blog-list');
    }

    // blog comments

    public function commentList()
    {
        $blogComment = DB::table('blog_comments')
                            ->join('blog','blog.id','=','blog_comments.blog_id')
                            ->select('blog_comments.*','blog.title AS blogtitle')
                            ->get();
        return view('admin.blog.comment.list', compact(
            'blogComment'
        ));
    }

    public function commentActionAjax(Request $request)
    {
        $datetime = date('Y-m-d H:i:s');
        $id = $request->id;
        $status = $request->status;

        $bc = Blogcomment::find($id);

        if ($bc) {
                    
            $bc->status = $status;
            $bc->updated_at = $datetime;
            $bc->update();

            return [ 'status' => 'success', 'message' => 'Comment updated successfully.' ];
        }else{
            return [ 'status' => 'error', 'message' => 'Comment not found!!' ];
        }
    }

    public function commentStoreAjax(Request $request)
    {
        $comment_id = $request->comment_id;
        $reply = $request->reply;

        $replyToComment = Blogcomment::find($comment_id);
        if (!$replyToComment) {
            return [ 'status' => 'notfound', 'message' => 'Data Not Found!! Try Again.' ];
        }

        $replyToComment->reply = $reply;
        $replyToComment->status = '1';
        $replyToComment->update();

        if ($replyToComment) {
            return [ 'status' => 'success', 'message' => 'Replied Successfully.' ];
        }else{
            return [ 'status' => 'error', 'message' => 'Something Went Wrong!! Try Again.' ];
        }
    }
    
    public function commentDelete($id)
    {
        $Blog = Blogcomment::find($id);

        if ($Blog) {
            $Blog->delete();
            session()->flash('message', 'Comment Deleted Successfully');
        }
        return redirect()->route('comment-list');
    }
}
