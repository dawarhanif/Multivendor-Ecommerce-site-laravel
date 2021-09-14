<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::orderBy('id','DESC')->paginate(5);
        
        return view('backend.products.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand=Brand::get();
        $category=Category::where('is_parent',1)->get();
        
        return view('backend.products.create')->with('categories',$category)->with('brands',$brand);
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
            'summary'=>'string|required',
            'description'=>'string|nullable',
            'photo'=>'string|required',
            'size'=>'nullable',
            'stock'=>"required|numeric",
            'category_id'=>'required|exists:categories,id',
            'brand_id'=>'nullable|exists:brands,id',
            'child_category_id'=>'nullable|exists:categories,id',
            'status'=>'required|in:active,inactive',
            'conditions'=>'required|in:default,new,hot,popular,winter,summer,featured',
            'price'=>'required|numeric',
            'discount'=>'nullable|numeric',
        ]);

        $data=$request->all();
        $slug=Str::slug($request->input('title'));
        $slug_count=Product::where('slug',$slug)->count();
        if($slug_count>0){
            $slug = time().'-'.$slug;
        }
        $data['slug']=$slug;
        $data['offer_price']=($request->price-(($request->price*$request->discount)/100));
        $status=Product::create($data);
        if ($status) {
            return redirect()->route('products.index')->with('success','Product Created Successfully');
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
        $product=Product::find($id);
        if ($product) {
            return view('backend.products.edit',compact('product'));
        }
        else
        {
            return back()->with('error','Product Not found');
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
        $product=Product::find($id);
        if($product){
        $this->validate($request,[
        'title'=>'string|required',
            'summary'=>'string|required',
            'description'=>'string|nullable',
            'photo'=>'string|required',
            'size'=>'nullable',
            'stock'=>"required|numeric",
            'category_id'=>'required|exists:categories,id',
            'brand_id'=>'nullable|exists:brands,id',
            'child_category_id'=>'nullable|exists:categories,id',
            'status'=>'required|in:active,inactive',
            'conditions'=>'required|in:default,new,hot,popular,winter,summer,featured',
            'price'=>'required|numeric',
            'discount'=>'nullable|numeric',

        ]);

        $data=$request->all();
        $data['offer_price']=($request->price-(($request->price*$request->discount)/100));
        $status=$product->fill($data)->save();
        }
        if ($status) {
            return redirect()->route('products.index')->with('success','Product Edited Successfully');
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
        $product=Product::find($id);
      if($product)
      {
        $status=$product->delete();
        if($status)
        {
            return redirect()->route('products.index')->with('success','Product Deleted Successfully');
        }
        else{
          return back()->with('error','Something Went Wrong!!');
            }
        
      }  
      else{
        return back()->with('error','Data Not Found');
      }
    }

    public function productstatus(Request $request)
    {
        if($request->mode=='true')
        {
            DB::table('products')->where('id',$request->id)->update(['status'=>'active']);

        }
        else
        {
            DB::table('products')->where('id',$request->id)->update(['status'=>'inactive']);

        }
        return response()->json(['msg'=>'Successfully Updated Status','status'=>true]);
    }


}
