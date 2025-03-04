<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nick;
use App\Models\Category;
use App\Models\Accessories;
class NickController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nicks = Nick::with('category')->orderBy('id', 'desc')->paginate(20);
        return view('admin.nick.index',compact('nicks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderBy('id','DESC')->get();
        return view('admin.nick.create', compact('category'));
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
        $attribute = [];
        foreach($data['attribute'] as $key => $attri){
            foreach($data['name_attribute'] as $key2 => $name_attri){
                if($key==$key2){
                    $attribute[] = $name_attri.': '.$attri;
                }
            }
        }
        $nick = new Nick();
        $nick->title = $data['title'];
        $nick->ms = random_int(100000, 999999);
        $nick->attribute = json_encode($attribute, JSON_UNESCAPED_UNICODE);
        $nick->description = $data['description'];
        $nick->category_id = $data['category_id'];
        $nick->price = $data['price'];
        $nick->status = $data['status'];

        $get_image = $request->image;
        $path = 'uploads/nick/';

        $get_name_image = $get_image->getClientOriginalName();

        $name_image = current(explode('.',$get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path,$new_image);

        $nick->image = $new_image;
        $nick->save();
        return redirect()->route('nick.create')->with('status','Thêm nick game thành công');
    }

    public function choose_category(Request $request){
        $data = $request->all();
        // dd($data);
        $access = Accessories::where('category_id', $data['category_id'])->where('status', 1)->get();
        $output="";
        foreach($access as $key => $acce){
            $output.='<div class="form-group">
                        <label for="exampleFormControlSelect1">'.$acce->title.'</label>
                        <input type="hidden" value="'.$acce->title.'" name="name_attribute[]">
                        <input type="text" class="form-control" required name="attribute[]" placeholder="...">
                    </div>';
        }
        echo $output;
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
        $nick = Nick::find($id);
        $category = Category::orderBy('id','DESC')->get();
        return view('admin.nick.edit', compact('nick', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   $data = $request->all();
        $nick = Nick::find($id);
        $nick->title = $data['title'];
        $nick->ms = random_int(100000, 999999);
        $nick->attribute = $data['attribute'];
        $nick->description = $data['description'];
        $nick->category_id = $data['category_id'];
        $nick->price = $data['price'];
        $nick->status = $data['status'];

        $get_image = $request->image;
        if($get_image){
            $path = 'uploads/nick/';

            $get_name_image = $get_image->getClientOriginalName();

            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);

        $nick->image = $new_image;
        }

        $nick->save();
        return redirect()->route('nick.index')->with('status','Cập nhập nick game thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nick = Nick::find($id)->delete();
        return redirect()->route('nick.index');
    }
}
