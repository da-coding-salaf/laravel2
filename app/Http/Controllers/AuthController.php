<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Session;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:register_info',
            'password'=>'required|min:5|max:10'
        ]);
        $insert=DB::insert("insert into register_info value(?,?,?,?)",[0,$request->name,$request->email,Hash::make($request->password)]);
        if($insert){
            return back()->with('success','You have successfully register');
        }else{
            return back()->with('fail','Fail to Register');   
        }

    }
    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:10'
        ]);
        $select=DB::select("select * from register_info where email=?",[$request->email]);
        if($select){
                if(Hash::check($request->password,$select[0]->password)){
                        $request->session()->put('email',$select[0]->email);
                        return redirect('/dashboard');
                }else{
                    return back()->with('fail','Incorrect Password');
                }
        }else{
            return back()->with('fail','User email entry no found');
        }
    }
    public function dashboard(){
        if(Session::has('email')){
            $select=DB::select("select * from register_info where email=?",[Session::get('email')]);
            return view('/dashboard',['name'=>$select[0]->name,'email'=>$select[0]->email]);
        }else{
            return redirect('/loginpage');
        }
    }
        public function logout(){

            if(Session::has('email')){
                Session::pull('email');
                return redirect('/loginpage');
            }
        }
        public function loginpage(){
            if(Session::has('email')){
                return redirect('/dashboard');
            }else{
                return view('login');
            }
        }
    
}
