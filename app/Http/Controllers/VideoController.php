<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Videos;
class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Videos::orderBy('id', 'DESC')->paginate(5);

        // $video = Videos::all();
        return view('admin.video.index', compact('videos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $video = new Videos();
        $video->title = $data['title'];
        $video->slug = $data['slug'];
        $video->description = $data['description'];
        $video->status = $data['status'];
        $video->link = $data['link'];

        $get_image = $request->image;
        if($get_image){
            $path = 'uploads/video/';

            $get_name_image = $get_image->getClientOriginalName();

            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);

            $video->image = $new_image;
        }
        $video->save();
        return redirect()->route('video.index')->with('status','Thêm video game thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $videos = Videos::find($id);

        // $video = Videos::all();
        return view('admin.video.edit', compact('videos'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $video = Videos::find($id);
        $video->title = $data['title'];
        $video->slug = $data['slug'];
        $video->description = $data['description'];
        $video->status = $data['status'];
        $video->link = $data['link'];

        $get_image = $request->image;
        if($get_image){
            $path = 'uploads/video/';

            $get_name_image = $get_image->getClientOriginalName();

            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);

            $video->image = $new_image;
        }
        $video->save();
        return redirect()->route('video.index')->with('status','Cập nhập video game thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Videos::find($id)->delete();
        return redirect()->route('video.index');
    }
}
