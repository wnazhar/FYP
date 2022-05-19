<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ads;
use App\Media;
use App\Category;
use DB;
use Auth;

class adsController extends Controller
{
    public function event(){
        $categories=Category::all();
        //dd($fair_events);
        return view('categories.event',compact('categories')); 
    }
    public function food()
    {
        $categories=Category::all();
        //dd($food_beverages);
        return view('categories.food',compact('categories'));
    }
    public function product()
    {
        $categories=Category::all();
        //dd($product_merchs);
        return view('categories.product',compact('categories'));
    }
  
    public function calendar()
    {
        return view('ads.calendar');
    }
    public function book()
    {
        $categories = Category::pluck('categoryId', 'categoryName','plan','price');
        return view('ads.book', compact('categories'));
    }

    protected $ads,$media;
    public function __construct(){
        $this->ads=new Ads();
        $this->media=new Media();
    }
    public function store(Request $request){

            DB::beginTransaction();
        try{

            $ads = $this->ads->create([
                'adsTitle'=>$request->adsTitle,
                'adsCompany'=>$request->adsCompany,
                'adsCaption'=>$request->adsCaption,
                'date'=>$request->date,
                'timeslot'=>$request->timeslot,
                'categoryId' => $request->categoryId,
                'custId'=> Auth::user()->custId,
            ]);
            
            if ($request->hasFile('media')) {
                $media = $request->file('media');
                foreach ($media as $files) {
                    $file_name = $files->getClientOriginalName();
                    $files->move(public_path().'/files/', $file_name);
                    $data[] = $file_name;
                }
            }

            $media = $this->media->create([
                'media' => $request->media=json_encode($data),
                'adsId' => $ads->adsId
            ]);
            
            //insert bookings to array
            $date = $ads->date;
            $result = DB::table('ads')
                ->where('date', '=', $date)
                ->get();
            $bookings = array();
            foreach($result as $r){
               
                $bookings[]=$r->timeslot;
                
            } 

            if ($ads && $media){
                DB::commit(); 
            }else{
                DB::rollback();
            }

            $dbdata = DB::table('users')->where('custId', $ads->custId) -> get();

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
                    array_push($emaildata['content'],'Your Ads, for ' . $ads->adsTitle, 'has been submitted ' );
                    array_push($emaildata['content'],'Please pay RM2500 and upload the receipt:)');
                    array_push($emaildata['content'],'Thanks for choosing us :)');
                    
                
            EmailController::send($emaildata); 


            $request->session()->flash('success','Your ads created');
                return redirect()->route('ads.list');
        }
        catch (Exception $ex){
            DB:rollback();
            $request->session()->flash('success','Your ads created');
                return redirect()->route('ads.list');
        }
    }

    public function list()
    {  
        $ads = Ads::all();
        $users=Auth::user();
        $ads = DB::table('ads')
        ->where('custId',$users->custId)->get();
        return view('ads.list',compact('ads'));  
    }
    
  
    public function show($adsId)
    {
        $media = Media::where('adsId', $adsId)->first();
        $ads = Ads::findOrFail($adsId);
        return view('ads.show',compact('ads','media'));   
    }
  
    public function edit($adsId)
    {  
        $media = Media::pluck('mediaId', 'media');
        $ads = Ads::findOrFail($adsId);
        return view('ads.edit',compact('ads','media'));   
    }

    public function update(Request $request,$adsId)
    {
        $this->validate($request,
        [
            'date'=>'required',
            'timeslot'=>'required',
            'adsTitle' => 'required',
            'adsCompany' => 'required',
            'adsCaption' => 'required',  
        ]);

        $ads=Ads::find($adsId);

        $ads->date=$request->input('date');
        $ads->timeslot=$request->input('timeslot');
        $ads->adsTitle=$request->input('adsTitle');
        $ads->adsCompany=$request->input('adsCompany');
        $ads->adsCaption=$request->input('adsCaption');
    
       $ads->update($request->all());
        $request->session()->flash('success','Your ads updated');
                return redirect()->route('ads.list');

    }

    public function editreceipt($adsId)
    {  
        $ads = Ads::findOrFail($adsId);
        return view('ads.editreceipt',compact('ads'));   
    }

    public function updatereceipt(Request $request,$adsId)
    {

        $this->validate($request,
        [
            'receipt' => 'image|mimes:jpeg,jpg,png,pdf,svg|max:2048|required',
            
        ]);

        if ($request->hasFile('receipt')) {
            $receipt = $request->file('receipt');
            $file_name = $receipt->getClientOriginalName();
            $receipt->move(public_path().'/files/', $file_name);
        }

        $ads = Ads::findOrFail($adsId);
        $ads->receipt=$file_name;

        $ads->save($request->all());
        $request->session()->flash('success','Receipt Uploaded');
                return redirect()->route('ads.list');
       
    }

    public function destroy($adsId)
    {
        DB::table('ads')->where('adsId', $adsId)->delete();
        //$request->session()->flash('success','Deleted Successfully');
                return redirect()->route('ads.list');
    }
   
}
