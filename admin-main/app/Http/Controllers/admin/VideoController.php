<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\File;
use DB;

class VideoController extends Controller
{
    public function list()
    {
        $videos = Video::all();
        return view('admin.video.list', compact(
            'videos'
        ));
    }

    public function add()
    {
        $video = new Video;
        return view('admin.video.add', compact(
            'video'
        ));
    }

    public function store(Request $request)
    {
        if ($request->id == null) {
            $slug = $this->srt_slug($request->title, 'video');
            
            $video = new Video;
            $video->title = $request->title;
            $video->video_link = $request->video_link;
            $video->slug = $slug;
            $video->save();

            session()->flash('message', 'Video Add Successfully');
        } else {
            $video = Video::find($request->id);
            if ($video == null) {
                session()->flash('error', 'Data Not Found!!');
                return redirect()->route('video-list');
            }
            
            if ($video->title != $request->title) {
                $slug = $this->srt_slug($request->title, 'video');
                $video->slug = $slug;
            }

            $video->video_link = $request->video_link;
            $video->title = $request->title;
            $video->update();
            session()->flash('message', 'Blog Update Successfully');
        }
        return redirect()->route('video-list');
    }

    public function edit($id)
    {
        $video = Video::find($id);
        if ($video != null) {
            return view('admin.video.add', compact(
                'video',
            ));
        }
        return redirect()->route('video-list');
    }

    public function delete($id)
    {
        $video = Video::find($id);
        if ($video) {
            $video->delete();
            session()->flash('message', 'Video Deleted Successfully');
        }
        return redirect()->route('video-list');
    }
}
