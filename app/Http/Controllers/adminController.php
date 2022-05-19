<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use App\Media;
use App\Ads;
use App\Slots;

class adminController extends Controller
{   
   
    
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    //public function __construct()
   // {$this->middleware('auth:admin');//tambah:admin}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admins.index');
    }
    public function adslist()
    {
        
        $ads = Ads::orderBy('date', 'ASC')->get();
        return view('admins.adslist',compact('ads'));
    }
    public function custlist()
    {
        $users=User::all();
        return view('admins.custlist',compact('users'));
    } 

    public function record($custId)
    {
        $users = User::findOrFail($custId);
        $ads = Ads::all();
        $ads = DB::table('ads')
        ->where('custId',$users->custId)->get();
        return view('admins.record',compact('users','ads'));
    }

    public function showads()
    {
        return view('admins.showads');
    }  

    public function editstatus($adsId)
    {  
        $media = Media::where('adsId', $adsId)->first();
        $ads = Ads::findOrFail($adsId);
        return view('admins.editstatus',compact('ads','media'));   
    }

    public function updatestatus(Request $request,$adsId)
    {
        $this->validate($request,
        [
            'adsStatus' => 'required',  
        ]);
  
        $ads=Ads::find($adsId);

        $ads->date=$request->input('date');
        $ads->timeslot=$request->input('timeslot');
        $ads->adsTitle=$request->input('adsTitle');
        $ads->adsCompany=$request->input('adsCompany');
        $ads->adsCaption=$request->input('adsCaption');
        $ads->adsStatus=$request->input('adsStatus');
  
        $ads->save();
        
        $dbdata = DB::table('users')->where('custId', $ads->custId) -> get();
      
        //dd($dbdata[0]->email);
        $emaildata = [
            "sender" =>
            [
                "email_here@domain.com",
                "your app name here"
            ],
                "recipient" => $dbdata[0]->email,
                "subject" => "Booking Status ",
                'content' => []
            ];
            
                array_push($emaildata['content'],'Hello '. $dbdata[0]->custUserName ,'from '. $ads->adsCompany);
                array_push($emaildata['content'],'Your Ads, for ' . $ads->adsTitle, 'has been ' .$ads->adsStatus);
                array_push($emaildata['content'],'Thanks for choosing us :)');
                
            
        EmailController::send($emaildata);    
        
        $request->session()->flash('success','Your status updated');
                return redirect()->route('admins.adslist');
    }
}
