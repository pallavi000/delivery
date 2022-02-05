<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::all();
        return view('area.index',compact('areas')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('area.create');
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
            'area'=>'required',
            'zone'=>'required',
            'address'=>'required',
            'destination_type'=>'required',
            'location'=>'required',
        ]);

        $area = Area::create([
            'area'=>$request->area,
            'zone'=>$request->zone,
            'address'=>$request->address,
            'destination_type'=>$request->destination_type,
            'location'=>$request->location,
        ]);
        if($area){
            return redirect()->back()->with(['success' => 'Destination created successfully!!']);
        }else{
            return redirect()->back()->with(['error' => 'Internal server error']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $destination)
    {
        return view('area.edit',compact('destination'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $destination)
    {
        $this->validate($request,[
            'area'=>'required',
            'zone'=>'required',
            'address'=>'required',
            'destination_type'=>'required',
            'location'=>'required',
        ]);

        $destination->area = $request->area;
        $destination->zone = $request->zone;
        $destination->address = $request->address;
        $destination->destination_type = $request->destination_type;
        $destination->location = $request->location;
        $destination->save();
        return redirect()->back()->with(['success' => 'Destination updated successfully!!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $destination)
    {
        if($destination){
            $destination->delete();
             return redirect()->back()->with(['success' => 'Destination deleted successfully!!']);

        }
    }
}
