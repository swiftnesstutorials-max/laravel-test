<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request){
         $validator=validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=> 'required|confirmed'
         ]);
         if($validator->passes()){
            $user=User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
                 ]);
                $user->save();
                return redirect()->route('login')->with('success','You are registers successfully');

           
         }else{
             return redirect()->route('register')->withInput()->withErrors($validator);
         }
            
    
}
 public function login(Request $request){
       $validator=Validator::make($request->all(),[
            'email'=> 'required|email',
            'password'=> 'required'

       ]);
       if($validator->passes()){
         if(Auth::guard('admin')->attempt(['email'=>$request->email,
            'password'=>$request->password])){
            return redirect()->route('admin_dashboard');

         }else{
            return redirect()->route('admin_login')->with('error','You email or pwd is incorrect');
         }
       }else{
        return redirect()->route('admin_login')->withInput()->withErrors($validator);
       }
}
public function dasboard(){
    return view('admin.dashboard');
}
public function logout(){
    Auth::logout();
    return redirect('admin_login');
}
}
