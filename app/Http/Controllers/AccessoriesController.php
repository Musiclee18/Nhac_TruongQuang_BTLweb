<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accessories;
use App\Models\Category;
class AccessoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accessories = Accessories::with('category')->orderBy("id","desc")->paginate(10);
        return view('admin.accessories.index', compact('accessories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderBy("id","desc")->get();
        return view('admin.accessories.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->all();
        $access = new Accessories();
        $access->title = $data['title'];
        $access->category_id = $data['category_id'];
        $access->status = $data['status'];
        $access->save();
        return redirect()->route('accessories.index')->with('status','Thêm phụ kiện thành công');

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
        $category = Category::orderBy("id","desc")->get();
        $accessories = Accessories::find($id);
        return view('admin.accessories.edit',compact('category','accessories'));
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
        $data = request()->all();
        $access = Accessories::find( $id );
        $access->title = $data['title'];
        $access->category_id = $data['category_id'];
        $access->status = $data['status'];
        $access->save();
        return redirect()->route('accessories.index')->with('status','Cập nhập thành công');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $access = Accessories::find($id)->delete();
        return redirect()->route('accessories.index');
    }
}
