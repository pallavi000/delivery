<?php

namespace App\Http\Controllers;

use App\Models\DailyOrder;
use App\Models\Dealer;
use App\Models\Company;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\DeliveryOrder;
use Illuminate\Http\Request;

class DailyOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dailyOrders = DailyOrder::all();
        $companies = Company::all();
        $dealers = Dealer::all();
         $drivers = Driver::all();
        $vehicles = Vehicle::all();
        $deliveryOrders= DeliveryOrder::all();
        return view('dailyOrder.index',compact('companies','vehicles','drivers','dealers','dailyOrders','deliveryOrders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $dealers = Dealer::all();
        return view('dailyOrder.create',compact('companies','dealers'));
        
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
            'company_id'=>'required',
            'item_type'=>'required',
            'destination'=> 'required',
            'quantity'=> 'required',
            'dealer_id'=> 'required',
            'brand'=> 'required',
            'rate_per_ton'=> 'required',
            'additional_charges'=> 'required',  
            'status'=>'required',
            'receiver'=>'required'
        ]);

            $destination = explode(',',$request->destination);
           
               $error = false;

                foreach($request->quantity as $quantity){
                    $arr = explode('-', $quantity);
                    if(is_int(intval($arr[1]))){
                        
                    } else {
                        $error = true;
                    }
                }

              
                if($error){
                    return redirect()->back()->with(['error'=>'Quantity is not valid.']);
                }

        $dailyOrder= DailyOrder::create([
            'company_id'=>$request->company_id,
            'date'=> Date('Y-m-d H:i:s'),
            'order_number'=> 1,
            'item_type'=>json_encode($request->item_type),
            'destination'=>json_encode($destination),
            'quantity'=>json_encode($request->quantity),
            'dealer_id'=> $request->dealer_id,
            'brand'=>json_encode($request->brand),
            'rate_per_ton'=> $request->rate_per_ton,
            'additional_charges'=> $request->additional_charges,  
            'status'=>$request->status,
            'receiver'=>$request->receiver
        ]);

        $dailyOrder->order_number = $dailyOrder->id;
        $dailyOrder->save();


     return redirect()->back()->with(['success' => 'DeliveryOrder updated successfully!!']);


        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DailyOrder  $dailyOrder
     * @return \Illuminate\Http\Response
     */
    public function show(DailyOrder $dailyOrder)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DailyOrder  $dailyOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(DailyOrder $dailyOrder)
    {
         $companies = Company::all();
        $dealers = Dealer::all();
        return view('dailyOrder.edit',compact('companies','dealers','dailyOrder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DailyOrder  $dailyOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DailyOrder $dailyOrder)
    {
         $this->validate($request,[
            'company_id'=>'required',
            'item_type'=>'required',
            'destination'=> 'required',
            'quantity'=> 'required',
            'dealer_id'=> 'required',
            'brand'=> 'required',
            'rate_per_ton'=> 'required',
            'additional_charges'=> 'required',  
            'status'=>'required',
            'receiver'=>'required'
        ]);

                $error = false;
                foreach($request->quantity as $quantity){
                    $arr = explode('-', $quantity);
                    if(is_int(intval($arr[1]))){
                        
                    } else {
                        $error = true;
                    }
                }
                if($error){
                    return redirect()->back()->with(['error'=>'Quantity is not valid.']);
                }



         $destination = explode(',',$request->destination);

 
            $dailyOrder->company_id =$request->company_id;
            $dailyOrder->item_type=json_encode($request->item_type);
            $dailyOrder->destination=json_encode($destination);
            $dailyOrder->quantity=json_encode($request->quantity);
            $dailyOrder->dealer_id= $request->dealer_id;
            $dailyOrder->brand=json_encode($request->brand);
            $dailyOrder->rate_per_ton= $request->rate_per_ton;
            $dailyOrder->additional_charges= $request->additional_charges;  
            $dailyOrder->status=$request->status;
            $dailyOrder->receiver = $request->receiver;
            $dailyOrder->save();


     return redirect()->back()->with(['success' => 'DeliveryOrder updated successfully!!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DailyOrder  $dailyOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(DailyOrder $dailyOrder)
    {
        if($dailyOrder){
            $dailyOrder->delete();

            return redirect()->back()->with(['success' => 'DeliveryOrder deleted successfully!!']);
        }
    }
}
