<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use App\Models\Company;
use Illuminate\Http\Request;
use  Illuminate\Support\Str;

class DealerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $dealers = Dealer::all();
        return view('dealer.index',compact('dealers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('dealer.create',compact('companies'));
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
            'contact'=>'required',
            'email'=>'required',
            'address'=>'required',
            'picture'=>'required',
            'ntn'=>'required',
            'strn'=>'required',
            'company_id'=>'required',
            'customer_name'=>'required',
            'customer_number'=>'required',
        ]);

        if($request->hasFile('picture')){
             $file = $request->file('picture');
            $path = time() . '-' . Str::random(6) . '.' . $file->extension();
            $request->file('picture')->move(public_path('images'), $path);
            $pictureUrl = '/images/'.$path;
            $pictureName = $request->file('picture')->getClientOriginalName();
            
        }

     
        $dealer= Dealer::create([
            'name'=>$request->name,
            'contact'=>$request->contact,
            'email'=>$request->email,
            'address'=>$request->address,
            'picture'=>$pictureUrl,
            'ntn'=>$request->ntn,
            'strn'=>$request->strn,
            'company_id'=>$request->company_id,
            'customer_name'=>$request->customer_name,
            'customer_number'=>$request->customer_number,
            'sales_group'=>$request->sales_group,
            'sales_district'=>$request->sales_district,
            'customer_address'=>$request->customer_address,
            'customer_territory'=>$request->customer_territory

          
        ]);
     
        return redirect()->back()->with(['success' => 'Dealer created successfully!!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dealer  $dealer
     * @return \Illuminate\Http\Response
     */
    public function show(Dealer $dealer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dealer  $dealer
     * @return \Illuminate\Http\Response
     */
    public function edit(Dealer $dealer)
    {
        $companies = Company::all();
        return view('dealer.edit',compact('companies','dealer'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dealer  $dealer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dealer $dealer)
    {
         $this->validate($request,[
            'name'=>'required',
            'contact'=>'required',
            'email'=>'required',
            'address'=>'required',
            'ntn'=>'required',
            'strn'=>'required',
            'company_id'=>'required',
            'customer_name'=>'required',
            'customer_number'=>'required',
        ]);

        if($request->hasFile('picture')){
             $file = $request->file('picture');
            $path = time() . '-' . Str::random(6) . '.' . $file->extension();
            $request->file('picture')->move(public_path('images'), $path);
            $pictureUrl = '/images/'.$path;
            $pictureName = $request->file('picture')->getClientOriginalName();
            $dealer->picture=$pictureUrl;
              
        }

            $dealer->name=$request->name;
            $dealer->contact=$request->contact;
            $dealer->email=$request->email;
            $dealer->address=$request->address;
            $dealer->ntn=$request->ntn;
            $dealer->strn=$request->strn;
            $dealer->company_id=$request->company_id;
            $dealer->customer_name=$request->customer_name;
            $dealer->customer_number=$request->customer_number;
            $dealer->sales_group=$request->sales_group;
            $dealer->sales_district=$request->sales_district;
            $dealer->customer_address=$request->customer_address;
            $dealer->customer_territory=$request->customer_territory;
            $dealer->save();
     
        return redirect()->back()->with(['success' => 'Dealer updated successfully!!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dealer  $dealer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dealer $dealer)
    {
        if($dealer){
            if(file_exists(public_path($dealer->picture))){
               unlink(public_path($dealer->picture));
            }
            $dealer->delete();
            return redirect()->back()->with(['success' => 'Dealer deleted successfully!!']);

        }
    }
}
