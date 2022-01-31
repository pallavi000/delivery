<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Models\Company;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicle.index',compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('vehicle.create',compact('companies'));
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
            'vehicle_no'=>'required',
            'registration_city'=>'required',
            'type'=>'required',
            'body_type'=>'required',
            'company_id'=>'required'
        ]);

        $vehicle = Vehicle::create([
            'vehicle_no'=>$request->vehicle_no,
            'registration_city'=>$request->registration_city,
            'type'=>$request->type,
            'body_type'=>$request->body_type,
            'company_id'=>$request->company_id

        ]);
        if($vehicle){
            return redirect()->back()->with(['success' => 'vehicle created successfully!!']);
        }else{
            return redirect()->back()->with(['error' => 'Internal server error']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        $companies = Company::all();
        return view('vehicle.edit',compact('companies','vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
         $this->validate($request,[
            'vehicle_no'=>'required',
            'registration_city'=>'required',
            'type'=>'required',
            'body_type'=>'required',
            'company_id'=>'required'
        ]);

            $vehicle->vehicle_no=$request->vehicle_no;
            $vehicle->registration_city=$request->registration_city;
            $vehicle->type=$request->type;
            $vehicle->body_type=$request->body_type;
            $vehicle->company_id=$request->company_id;
            $vehicle->save();
             return redirect()->back()->with(['success' => 'Vehicle updated successfully!!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
         if($vehicle){
            $vehicle->delete();
             return redirect()->back()->with(['success' => 'Vehicle deleted successfully!!']);
        }
    }
}
