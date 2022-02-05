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
            'capacity' => 'required',
            'intentions' => 'required',
            'owner_name' => 'required',
            'owner_number' => 'required',
            'reliable' => 'required',
            'punctuality' => 'required',
        ]);

        if(strlen($request->owner_number)!=11) {
            return redirect()->back()->with(['error'=> 'Owner Number should be of 11 digits only.']);
        }

        $vehicle = Vehicle::create([
            'vehicle_no'=>$request->vehicle_no,
            'registration_city'=>$request->registration_city,
            'type'=>$request->type,
            'body_type'=>$request->body_type,
            'company_id'=> 0,
            'capacity' => $request->capacity,
            'intentions' => json_encode($request->intentions),
            'owner_name' => $request->owner_name,
            'owner_number' => $request->owner_number,
            'reliable' => $request->reliable,
            'punctuality' => $request->punctuality
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
            'capacity' => 'required',
            'intentions' => 'required',
            'owner_name' => 'required',
            'owner_number' => 'required',
            'reliable' => 'required',
            'punctuality' => 'required',
        ]);

         if(strlen($request->owner_number)!=11) {
            return redirect()->back()->with(['error'=> 'Owner Number should be of 11 digits only.']);
        }

            $vehicle->vehicle_no=$request->vehicle_no;
            $vehicle->registration_city=$request->registration_city;
            $vehicle->type=$request->type;
            $vehicle->body_type=$request->body_type;

            $vehicle->capacity = $request->capacity;
            $vehicle->intentions = json_encode($request->intentions);
            $vehicle->owner_name = $request->owner_name;
            $vehicle->owner_number = $request->owner_number;
            $vehicle->reliable = $request->reliable;
            $vehicle->punctuality = $request->punctuality;
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

    public function addToDLV($id, Request $request) {
        Vehicle::where('id', $id)->update(['dlv'=> 1]);
        return redirect()->back()->with(['success' => 'Vehicle added to Daily Lineup!!']);
    }

    public function addToDLVMulti(Request $request) {
        $vehicles = explode(",", $request->vehicles);
        foreach($vehicles as $vehicle_id) {
            Vehicle::where('id', $vehicle_id)->update(['dlv'=> 1]);
        }
        return redirect()->back()->with(['success' => 'Selected Vehicles added to Daily Lineup!!']);
    }

    public function removeFromDLV($id, Request $request) {
        Vehicle::where('id', $id)->update(['dlv'=> 0]);
        return redirect()->back()->with(['success' => 'Vehicle removed from Daily Lineup!!']);   
    }

    public function removeFromDLVMulti(Request $request) {
        $vehicles = explode(",", $request->vehicles);
        foreach($vehicles as $vehicle_id) {
            Vehicle::where('id', $vehicle_id)->update(['dlv'=> 0]);
        }
        return redirect()->back()->with(['success' => 'Selected Vehicles removed from Daily Lineup!!']);
    }

    public function showDLV() {
        $vehicles = Vehicle::where('dlv', 1)->get();
        return view('vehicle.DLV', compact('vehicles'));
    }
}
