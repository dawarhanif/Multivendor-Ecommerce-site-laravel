<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::orderBy('id','DESC')->paginate(5);

        return view('backend.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_categories=Category::where('is_parent',1)->orderBy('title','ASC')->get();
         return view('backend.categories.create',compact('parent_categories'));
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
        'summary'=>'string|nullable',
        'is_parent'=>'sometimes|in:1',
        'parent_id'=>'nullable|exists:categories,id',
        'status'=>'nullable|in:active,inactive',

        ]);

        $data=$request->all();
        $slug=Str::slug($request->input('title'));
        $slug_count=Category::where('slug',$slug)->count();
        if($slug_count>0){
            $slug = time().'-'.$slug;
        }
        $data['slug']=$slug;
        $data['is_parent']=$request->input('is_parent',0);
        $status=Category::create($data);
        if ($status) {
            return redirect()->route('category.index')->with('success','Category Created Successfully');
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
        $parent_categories=Category::where('is_parent',1)->orderBy('title','ASC')->get();
        $category=Category::find($id);
      if($category)
      {
        return view('backend.categories.edit',compact('category','parent_categories'));
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
        $category=Category::find($id);
        if($category){
        $this->validate($request,[
        'title'=>'string|required',
        'summary'=>'string|nullable',
        'is_parent'=>'sometimes|in:1',
        'parent_id'=>'nullable',
        'status'=>'nullable|in:active,inactive',

        ]);

        $data=$request->all();
        if($request->is_parent==1)
        {
            $data['parent_id']=null;
        }
        $data['is_parent']=$request->input('is_parent',0);
        $status=$category->fill($data)->save();
        }
        if ($status) {
            return redirect()->route('category.index')->with('success','Category Edited Successfully');
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
         $category=Category::find($id);
         $child_cat_id=Category::where('parent_id',$id)->pluck('id');
      if($category)
      {
        $status=$category->delete();
        if($status){    
            if(count($child_cat_id)>0){
                Category::shiftChild($child_cat_id);
            }
        
            return redirect()->route('category.index')->with('success','Category Deleted Successfully');
        }
        else{
          return back()->with('error','Something Went Wrong!!');
            }
        
      }  
      else{
        return back()->with('error','Data Not Found');
      }
    }
    public function categorystatus(Request $request)
    {
        

        if($request->mode=='true')
        {
            DB::table('categories')->where('id',$request->id)->update(['status'=>'active']);

        }
        else
        {
            DB::table('categories')->where('id',$request->id)->update(['status'=>'inactive']);

        }
        return response()->json(['msg'=>'Successfully Updated Status','status'=>true]);
    }
    public function getChildByParentID(Request $request,$id)
    {
        $category=Category::find($request->id);
        
        if($category)
        {
            $child_id=Category::getChildByParentID($request->id);
            if(count($child_id)<=0)
            {
                return response()->json(['status'=>false,'data'=>null,'msg'=>'']);
            }
            return response()->json(['status'=>true,'data'=>$child_id,'msg'=>'']);

        }
        else
        {
            return response()->json(['status'=>false,'data'=>null,'msg'=>'']);
        }
        
    }
}
