<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::orderBy('id','Desc')->paginate(5);
        $total_users=count(User::all());

        return view('backend.users.index',compact('users','total_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
         return view('backend.users.create');
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
        'full_name'=>'string|required',
        'username'=>'string|nullable',
        'email'=>'email|required|unique:users,email',
        'password'=>'min:4|required',
        'phone'=>'string|nullable',
        'photo'=>'required',
        'address'=>'string|nullable',
        'role'=>'required|in:admin,customer,vendor',
        'status'=>'required|in:active,inactive',

        ]);

        $data=$request->all();
        $data['password']=Hash::make($request->password);
        $status=User::create($data);
        if ($status) {
            return redirect()->route('users.index')->with('success','User Created Successfully');
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
        
      $user=User::find($id);
          if($user)
          {
            return view('backend.users.edit',compact('user'));
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
        $user=User::find($id);
        if($user){
        $this->validate($request,[
        'full_name'=>'string|required',
        'username'=>'string|nullable',
        'email'=>'email|required|exists:users,email',
        'phone'=>'string|nullable',
        'photo'=>'required',
        'address'=>'string|nullable',
        'role'=>'required|in:admin,customer,vendor',
        'status'=>'required|in:active,inactive',

        ]);

        $data=$request->all();
        
        $status=$user->fill($data)->save();
        }
        if ($status) {
            return redirect()->route('users.index')->with('success','User Edited Successfully');
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
         $user=User::find($id);
      if($user)
      {
        $status=$user->delete();
        if($status){    
        
            return redirect()->route('users.index')->with('success','User Deleted Successfully');
        }
        else{
          return back()->with('error','Something Went Wrong!!');
            }
        
      }  
      else{
        return back()->with('error','Data Not Found');
      }
    }
    public function userstatus(Request $request)
    {
        

        if($request->mode=='true')
        {
            DB::table('users')->where('id',$request->id)->update(['status'=>'active']);

        }
        else
        {
            DB::table('users')->where('id',$request->id)->update(['status'=>'inactive']);

        }
        return response()->json(['msg'=>'Successfully Updated Status','status'=>true]);
    }
}
