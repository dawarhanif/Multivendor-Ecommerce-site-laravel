<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands=Brand::orderBy('id','DESC')->paginate(5);

        return view('backend.brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
        'title'=>'string|required',
        'photo'=>'required',
        'status'=>'nullable|in:active,inactive',

        ]);
        $data=$request->all();
        $slug=Str::slug($request->input('title'));
        $slug_count=Brand::where('slug',$slug)->count();
        if($slug_count>0){
            $slug = time().'-'.$slug;
        }
        $data['slug']=$slug;
        
        $status=Brand::create($data);
        if ($status) {
            return redirect()->route('brand.index')->with('success','Brand Created Successfully');
        }
        else
        {
            return back()->with('error','Oops! Something went wrong');
        }
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
        
        $brand=Brand::find($id);
      if($brand)
      {
        return view('backend.brands.edit',compact('brand'));
      }  
      else{
        return back()->with('error','Data Not Found');
      }


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
        $brand=Brand::find($id);
         $this->validate($request,[
        'title'=>'string|required',
        'photo'=>'required',
        'status'=>'nullable|in:active,inactive',

        ]);
        $data=$request->all();
        
        
        $status=$brand->fill($data)->save();
        if ($status) {
            return redirect()->route('brand.index')->with('success','Brand Updated Successfully');
        }
        else
        {
            return back()->with('error','Oops! Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand=Brand::find($id);
      if($brand)
      {
        $status=$brand->delete();
        if($status)
        {
            return redirect()->route('brand.index')->with('success','Brand Deleted Successfully');
        }
        else{
          return back()->with('error','Something Went Wrong!!');
            }
        
      }  
      else{
        return back()->with('error','Data Not Found');
      }
    }
    public function brandstatus(Request $request)
    {
        if($request->mode=='true')
        {
            DB::table('brands')->where('id',$request->id)->update(['status'=>'active']);

        }
        else
        {
            DB::table('brands')->where('id',$request->id)->update(['status'=>'inactive']);

        }
        return response()->json(['msg'=>'Successfully Updated Status','status'=>true]);
    }
}
