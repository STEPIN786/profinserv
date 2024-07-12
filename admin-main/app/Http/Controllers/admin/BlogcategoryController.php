<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Blogcategory;
use Illuminate\Support\Facades\File;

class BlogcategoryController extends Controller
{
    public function list()
    {
        $Blogcategory = Blogcategory::all();
        return view('admin.blogcategory.list', compact(
            'Blogcategory'
        ));
    }

    public function add()
    {
        $Blogcategory = new Blogcategory;
        return view('admin.blogcategory.add', compact(
            'Blogcategory'
        ));
    }

    public function store(Request $request)
    {
        if ($request->id == null) {

            $request->validate([
                'name' => 'required|unique:blog_category'
            ]);

            $Blog = new Blogcategory;
            $Blog->name = $request->name;
            $Blog->save();

            session()->flash('message', 'Blog Category Add Successfully');
        } else {

            $checkName = Blogcategory::where([['id','<>',$request->id],['name','=',$request->name]])->first();
            if ($checkName) {
                return redirect()->route('blog-cat-list')->with('error', 'The name is already taken.');
            }

            $request->validate([
                'name' => 'required'
            ]);

            $Blog = Blogcategory::find($request->id);
            $Blog->name = $request->name;
            $Blog->update();
            session()->flash('message', 'Blog Category Update Successfully');
        }
        return redirect()->route('blog-cat-list');
    }

    public function edit($id)
    {
        $Blogcategory = Blogcategory::find($id);
        if ($Blogcategory != null) {
            return view('admin.blogcategory.add', compact(
                'Blogcategory'
            ));
        }
        return redirect()->route('blog-cat-list');
    }

    public function delete($id)
    {
        $Blogcategory = Blogcategory::find($id);
        if ($Blogcategory != null) {
            $blog = Blog::where(['blog_cat_id'=>$id])->get();
            if ($blog) {
                foreach ($blog as $value) {
                    $value->delete();
                }
            }

            $Blogcategory->delete();
            session()->flash('message', 'Blog Category Delete Successfully');
        }

        return redirect()->route('blog-cat-list');
    }
}
