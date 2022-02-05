<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Bank;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('company.index',compact('companies')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
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
            'office_address'=>'required',
            'email'=>'required',
            'fax'=>'required',
            'phone'=>'required',
            'office_location'=>'required',
            'factory_address'=>'required',
            'factory_location'=>'required',
            'ntn'=>'required',
            'strn'=>'required',
        ]);

        $company = Company::create([
            'name'=>$request->name,
            'office_address'=>$request->office_address,
            'email'=>$request->email,
            'fax'=>$request->fax,
            'phone'=>$request->phone,
            'office_location'=>$request->office_location,
            'factory_address'=>$request->factory_address,
            'factory_location'=>$request->factory_location,
            'ntn'=>$request->ntn,
            'strn'=>$request->strn,

        ]);
        if($company){
            $titles = $request->title;
            $account_nos = $request->account_no;
            $banks = $request->bank;

            for($i=0;$i<sizeof($titles);$i++){
              Bank::create([
                'title'=> $titles[$i],
                'account_no'=>$account_nos[$i],
                'bank' => $banks[$i],
                'company_id'=>$company->id
              ]); 
            }

            return redirect()->back()->with(['success' => 'Company created successfully!!']);
        }else{
            return redirect()->back()->with(['error' => 'Internal server error']);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
         $this->validate($request,[
            'name'=>'required',
            'office_address'=>'required',
            'email'=>'required',
            'fax'=>'required',
            'phone'=>'required',
            'office_location'=>'required',
            'factory_address'=>'required',
            'factory_location'=>'required',
            'ntn'=>'required',
            'strn'=>'required',
        ]);
            $company->name=$request->name;
            $company->office_address=$request->office_address;
            $company->email=$request->email;
            $company->fax=$request->fax;
            $company->phone=$request->phone;
            $company->office_location=$request->office_location;
            $company->factory_address=$request->factory_address;
            $company->factory_location=$request->factory_location;
            $company->ntn=$request->ntn;
            $company->strn=$request->strn;
             $company->save(); 

       

        $titles = $request->title;
        $account_nos = $request->account_no;
        $banks = $request->bank;

        for($i=0;$i<sizeof($titles);$i++){
            $bank= Bank::updateOrCreate([
                'account_no' => $account_nos[$i],
                'company_id' =>$company->id
            ],[
            'title'=> $titles[$i],
            'account_no'=>$account_nos[$i],
            'bank' => $banks[$i],
            'company_id'=>$company->id
            ]); 
        }

        return redirect()->back()->with(['success' => 'Company updated successfully!!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
         if($company){
            $company->delete();
             return redirect()->back()->with(['success' => 'Company deleted successfully!!']);
        }
    }
}
