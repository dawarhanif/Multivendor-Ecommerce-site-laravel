<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use Session;




class IndexController extends Controller
{
    public function home()
    {

        $banners=Banner::where(['status'=>'active','condition'=>'banner'])->orderBy('id','DESC')->limit('4')->get();
        $categories=Category::where(['status'=>'active','is_parent'=>'1'])->limit('3')->orderBy('id','DESC')->get();
        return view('frontend.index',compact(['banners','categories']));
    }

    public function productCategory(Request $request,$slug)
    {
        $category=Category::with('products')->where('slug',$slug)->first();
        $route='/product-category';
        $sort='';
        if($request->sort !=null ){
            $sort=$request->sort;

        }
        if($category==null)
        {
            return view ("frontend.404");
        }
        else
        {
            if ($sort=='price') {
                $products=Product::where(['status'=>'active','category_id'=>$category->id])->orderBy('offer_price','ASC')->paginate(12);
            }
            elseif ($sort=='price-desc') {
                $products=Product::where(['status'=>'active','category_id'=>$category->id])->orderBy('offer_price','DESC')->paginate(12);
            }
            elseif ($sort=='discAsc') {
                $products=Product::where(['status'=>'active','category_id'=>$category->id])->orderBy('price','ASC')->paginate(12);
            }
            elseif ($sort=='discDsc') {
                $products=Product::where(['status'=>'active','category_id'=>$category->id])->orderBy('price','DESC')->paginate(12);
            }
            elseif ($sort=='nameDsc') {
                $products=Product::where(['status'=>'active','category_id'=>$category->id])->orderBy('title','DESC')->paginate(12);
            }
            elseif ($sort=='nameAsc') {
                $products=Product::where(['status'=>'active','category_id'=>$category->id])->orderBy('title','Asc')->paginate(12);
            }
            else
            {
                $products=Product::where(['status'=>'active','category_id'=>$category->id])->paginate(4);
            }
        if ($request->ajax()) {
            $view=view('frontend.layouts.single_product',compact('products'))->render();
            return response()->json(['html'=>$view]);
                   }
        }
        return view('frontend.productCategory',compact(['category','route','products']));
    }
    public function productDetail($slug)
    {
        $product=Product::with('related_products')->where('slug',$slug)->first();
        if($product)
        {
             return view('frontend.productDetail',compact(['product']));
        }
        else
        {
            return view('frontend.404');
        }
       
    }
    public function userAuth()
    {
        return view('frontend.auth.auth');
    }
    public function loginSubmit(Request $request)
    {

       $this->validate($request,[
            'email'=>'email|required|exists:users,email',
            'password'=>'required|min:4',
            
        ]);


       if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'status'=>'active']))
       {
            
            Session::put('user',$request->email);
            if (Session::get('uri.intended')) {
                return Redirect::to(Session::get('uri.intended'));
            }
            else
            {
              return redirect()->route('homepage')->with('success','Successfully Logged in');  
            }
            
       }
       else
       {
        return back()->with('error','Invalid Email or Password');
       }
    }
    public function registerSubmit(Request $request)
    {
       
       $this->validate($request,[

            'email'=>'email|required|unique:users,email',
            'username'=>'nullable|string',
            'full_name'=>'required|string',
            'password'=>'required|min:4|required|confirmed',
            
        ]);
       $data=$request->all();
       $check=$this->create($data);
       if($check)
       {
        return redirect()->route('homepage')->with('success','Registered Successfully');
       }
       else
       {
        return back()->with('error',['Please check your credentials and try again']);
       }

       
    }
    private function create(array $data)
    {
        return User::create([
        'full_name'=>$data['full_name'],
        'username'=>$data['username'],
        'email'=>$data['email'],
        'password'=>Hash::make($data['password']),

        ]);
    }
    public function userDashboard()
    {
        $user=Auth::user();
        return view('frontend.user.dashboard',compact('user'));
    }
    public function userOrders()
    {
        $user=Auth::user();
        return view('frontend.user.orders',compact('user'));
    }
    public function userAddresses()
    {
        $user=Auth::user();
        return view('frontend.user.addresses',compact('user'));
    }
     public function userAccount()
    {
        $user=Auth::user();
        return view('frontend.user.account',compact('user'));
    }
     public function shippingAddress(Request $request,$id)
    {
        
        $user=User::find($id);
        $user->update(['address'=>$request->address]);
        if ($user) {
            
           return back()->with('success','Address Updated Successfully');


        }
        else {

           return back()->with('error','Something went Wrong');

        }
        
    }
    public function updateAccount(Request $request,$id)
    {
        $this->validate($request,[

            'newpassword'=>'nullable|min:4',
            'oldpassword'=>'nullable|min:4',
            'full_name'=>'required|string',
            'username'=>'nullable|string',
            'phone'=>'nullable|min:10'

        ]);
        $hashpassword=Auth::user()->password;
       

        if($request->oldpassword==null && $request->newpassword==null){


        $user=User::where('id',$id)->update(['full_name'=>$request->full_name,'username'=>$request->username,'phone'=>$request->phone]);
            return back()->with('success', 'Account updated Successfully');
        }
        else{
            if(Hash::check($request->oldpassword,$hashpassword)){
                if(!Hash::check($request->newpassword,$hashpassword)){
                    $user=User::where('id',$id)->update(['full_name'=>$request->full_name,'username'=>$request->username,'phone'=>$request->phone,'password'=>Hash::make($request->newpassword)]);
                         return back()->with('success', 'Account updated Successfully');


                }
             else
                {
                    return back()->with('error','New Password and old password cannot be same ');
                }
            
            }
            else
            {
                return back()->with('error', 'Old password is incorrect or New password is empty');
            } 
           
        }
        
    }
}
