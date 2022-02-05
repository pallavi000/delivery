<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::all();
        return view('driver.index',compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('driver.create',compact('companies'));
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
            'name'=>'required',
            'mobile'=>'required',
            'address'=>'required',
            'cnic_no'=>'required',
            'picture'=>'required|mimes:jpeg,png,jpg',
            'cnic_front_pic'=>'required|mimes:jpeg,png,jpg',
            'cnic_back_pic'=>'required|mimes:jpeg,png,jpg'
        ]);
        $mobile = explode(',',$request->mobile);
        $result = false;
       foreach($mobile as $mobile){
           if(strlen($mobile)==11){

           }else{
               $result= true;
           }
       }
       if($result){
           return redirect()->back()->with(['error'=>'Enter Valid Mobile Number']);
       }
       if(strlen($request->cnic_no)){
         return redirect()->back()->with(['error'=>'Please Enter Valid CNIC Number']);

       }

         if($request->hasFile('picture')){
            $file = $request->file('picture');
            $path = time() . '-' . Str::random(6) . '.' . $file->extension();
            $request->file('picture')->move(public_path('images'), $path);
            $pictureUrl = '/images/'.$path;
            $pictureName = $request->file('picture')->getClientOriginalName();
        }

        if($request->hasFile('cnic_front_pic')){
            $file = $request->file('cnic_front_pic');
            $path = time() . '-' . Str::random(6) . '.' . $file->extension();
            $request->file('cnic_front_pic')->move(public_path('images'), $path);
            $frontUrl = '/images/'.$path;
            $frontName = $request->file('cnic_front_pic')->getClientOriginalName();
        }
        
        if($request->hasFile('cnic_back_pic')){
            $file = $request->file('cnic_back_pic');
            $path = time() . '-' . Str::random(6) . '.' . $file->extension();
            $request->file('cnic_back_pic')->move(public_path('images'), $path);
            $backUrl ='/images/'.$path;
            $backName = $request->file('cnic_back_pic')->getClientOriginalName();
        }

        $driver = Driver::create([
            'name'=> $request->name,
            'mobile'=>json_encode($mobile),
            'address'=>$request->address,
            'cnic_no'=>$request->cnic_no,
            'company_id'=>' ',
            'picture'=>$pictureUrl,
            'cnic_front_pic'=>$frontUrl,
            'cnic_back_pic' =>$backUrl
        ]);
         if($driver){
            return redirect()->back()->with(['success' => 'Driver created successfully!!']);
        }else{
            return redirect()->back()->with(['error' => 'Internal server error']);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {
        $companies = Company::all();
        return view('driver.edit',compact('companies','driver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Driver $driver)
    {

         $this->validate($request,[
            'name'=>'required',
            'mobile'=>'required',
            'address'=>'required',
            'cnic_no'=>'required',
        ]);
       
         $mobile = explode(',',$request->mobile);
        $result = false;
       foreach($mobile as $mobile){
           if(strlen($mobile)==11){

           }else{
               $result= true;
           }
       }
       if($result){
           return redirect()->back()->with(['error'=>'Enter Valid Mobile Number']);
       }

       if(strlen($request->cnic_no)!=15){
         return redirect()->back()->with(['error'=>'Please Enter Valid CNIC Number']);

       }


         if($request->hasFile('picture')){
            $file = $request->file('picture');
            $path = time() . '-' . Str::random(6) . '.' . $file->extension();
            $request->file('picture')->move(public_path('images'), $path);
            $pictureUrl = '/images/'.$path;
            $pictureName = $request->file('picture')->getClientOriginalName();
            $driver->picture=$pictureUrl;
           
        }

        if($request->hasFile('cnic_front_pic')){
            $file = $request->file('cnic_front_pic');
            $path = time() . '-' . Str::random(6) . '.' . $file->extension();
            $request->file('cnic_front_pic')->move(public_path('images'), $path);
            $frontUrl = '/images/'.$path;
            $frontName = $request->file('cnic_front_pic')->getClientOriginalName();
             $driver->cnic_front_pic=$frontUrl;
        }
        
        if($request->hasFile('cnic_back_pic')){
            $file = $request->file('cnic_back_pic');
            $path = time() . '-' . Str::random(6) . '.' . $file->extension();
            $request->file('cnic_back_pic')->move(public_path('images'), $path);
            $backUrl = '/images/'.$path;
            $backName = $request->file('cnic_back_pic')->getClientOriginalName();
            $driver->cnic_back_pic=$backUrl;
        }

    
            $driver->name= $request->name;
            $driver->mobile=json_encode($mobile);
            $driver->address=$request->address;
            $driver->cnic_no=$request->cnic_no;
            
            $driver->save();
    
     
            return redirect()->back()->with(['success' => 'Driver updated successfully!!']);
       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {

        
        if($driver){


                if(file_exists(public_path($driver->picture))){
                   
                    File::delete(public_path($driver->picture));
                }     
                
                 if(file_exists(public_path($driver->cnic_front_pic))) {
                    File::delete(public_path($driver->cnic_front_pic));
                }   

                  if(file_exists(public_path($driver->cnic_back_pic))) {
                    File::delete(public_path($driver->cnic_back_pic));
                } 
            
             
            $driver->delete();
            return redirect()->back()->with(['success' => 'Driver deleted successfully!!']);
        }

    }
}
