<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Dealer;
use App\Models\Receiver;
use Illuminate\Http\Request;

class ReceiverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receivers = Receiver::all();
        return view('receiver.index', compact('receivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dealers = Dealer::all();
        $destinations = Area::all();
        return view('receiver.create', compact('dealers', 'destinations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'dealer_id' => 'required',
            'name' => 'required',
            'number' => 'required',
            'zone' => 'required',
            'area' => 'required',
            'address' => 'required',
        ]);

        Receiver::create([
            'dealer_id' => $request->dealer_id,
            'name' => $request->name,
            'number' => $request->number,
            'zone' => $request->zone,
            'area' => $request->area,
            'address' => $request->address,
        ]);
        return redirect()->back()->with(['success'=>'Receiver Added Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receiver  $receiver
     * @return \Illuminate\Http\Response
     */
    public function show(Receiver $receiver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receiver  $receiver
     * @return \Illuminate\Http\Response
     */
    public function edit(Receiver $receiver)
    {
        $dealers = Dealer::all();
        $destinations = Area::all();
        return view('receiver.edit', compact('receiver','dealers', 'destinations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receiver  $receiver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receiver $receiver)
    {
        $this->validate($request, [
            'dealer_id' => 'required',
            'name' => 'required',
            'number' => 'required',
            'zone' => 'required',
            'area' => 'required',
            'address' => 'required',
        ]);

        $receiver->dealer_id= $request->dealer_id;
        $receiver->name= $request->name;
        $receiver->number= $request->number;
        $receiver->zone= $request->zone;
        $receiver->area= $request->area;
        $receiver->address= $request->address;
        $receiver->save();
        return redirect()->back()->with(['success'=>'Receiver Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receiver  $receiver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receiver $receiver)
    {
        if($receiver) {
            $receiver->delete();
            return redirect()->back()->with(['success'=>'Receiver Deleted Successfully']);
        }
    }
}
