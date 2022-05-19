<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use DB;
use App\Ads;
use Illuminate\Http\Request;
use App\Category;

class userController extends Controller
{
    public function index(){
        $categories=Category::all();
        //dd($categories);
        return view('users.index',compact('categories'));
    }

    public function profile($custId){
        $users = User::find($custId);
        if ($users){
            return view('users.profile')->withUser($users);}
            else {
        return redirect()->back();}
    }

   public function edit(){
      if (Auth::user()){
          $users=User::find(Auth::user()->custId);
          if ($users){
          return view('users.edit')->withUser($users);   
         }  else{
        return redirect()->back();
      } 
    }else{
        return redirect()->back();
      }
    }

    public function update(Request $request){
        $users=User::find(Auth::user()->custId);

        if ($users){
            $validate=null;
            if (Auth::user()->email===$request['email']){
                $validate=$request->validate([
                    'custFullName'=>'required|string|max:255',
                    'custPhoneNo'=>'required|string|max:13',
                    'custAddress'=>'required|string|max:1000',
                    'email'=>'required|email',
                ]);
            }else {
                $validate=$request->validate([
                    'custFullName'=>'required|string|max:255',
                    'custPhoneNo'=>'required|string|max:13',
                    'custAddress'=>'required|string|max:1000',
                    'email'=>'required|email|unique:users',
                ]);
            }
            if ($validate){
                $users->custFullName=$request['custFullName'];
                $users->custUserName=$request['custUserName'];
                $users->custPhoneNo=$request['custPhoneNo'];
                $users->custAddress=$request['custAddress'];
                $users->email=$request['email'];
    
                $users->save();
                
                $request->session()->flash('success','Your details updated');
                return redirect()->back();
        }else{
            return redirect()->back();
          }
        

        }
    }
   

    
}