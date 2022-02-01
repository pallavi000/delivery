<?php

namespace App\Http\Controllers;

use App\Models\DeliveryOrder;
use App\Models\Dealer;
use App\Models\Company;
use Illuminate\Http\Request;

class DeliveryOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliveryOrders= DeliveryOrder::all();
        return view('deliveryOrder.index',compact('deliveryOrders'));
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
        return view('deliveryOrder.create',compact('companies','dealers'));
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
            'do_number'=> 'required',
            'dealer_id'=> 'required',
            'item_type'=>'required',
            'brand'=> 'required',
            'quantity'=> 'required',
            'packing_type'=> 'required',
            'noofbags'=> 'required',
            'zone'=> 'required',
            'expire_date'=> 'required',
       
            
        ]);

        $deliveryOrder = DeliveryOrder::create([
            'company_id'=>$request->company_id,
            'do_number'=> $request->do_number,
            'dealer_id'=> $request->dealer_id,
            'item_type'=>$request->item_type,
            'brand'=> $request->brand,
            'quantity'=> $request->quantity,
            'packing_type'=> $request->packing_type,
            'noofbags'=> $request->quantity*20,
            'zone'=> $request->zone,
            'expire_date'=> $request->expire_date,
            'status'=>'open',
        ]);

     return redirect()->back()->with(['success' => 'Delivery Order created successfully!!']);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeliveryOrder  $deliveryOrder
     * @return \Illuminate\Http\Response
     */
    public function show(DeliveryOrder $deliveryOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeliveryOrder  $deliveryOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(DeliveryOrder $deliveryOrder)
    {
        $companies= Company::all();
        $dealers = Dealer::all();
        return view('deliveryOrder.edit',compact('companies','dealers','deliveryOrder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DeliveryOrder  $deliveryOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeliveryOrder $deliveryOrder)
    {
          $this->validate($request,[
            'company_id'=>'required',
            'do_number'=> 'required',
            'dealer_id'=> 'required',
            'item_type'=>'required',
            'brand'=> 'required',
            'quantity'=> 'required',
            'packing_type'=> 'required',
            'noofbags'=> 'required',
            'zone'=> 'required',
            'expire_date'=> 'required',
            
            
        ]);

        
           $deliveryOrder->company_id=$request->company_id;
           $deliveryOrder->do_number= $request->do_number;
           $deliveryOrder->dealer_id= $request->dealer_id;
           $deliveryOrder->item_type=$request->item_type;
           $deliveryOrder->brand= $request->brand;
           $deliveryOrder->quantity= $request->quantity;
           $deliveryOrder->packing_type= $request->packing_type;
           $deliveryOrder->noofbags= $request->quantity*20;
           $deliveryOrder->zone= $request->zone;
           $deliveryOrder->expire_date= $request->expire_date;

            $deliveryOrder->save();

     return redirect()->back()->with(['success' => 'DeliveryOrder updated successfully!!']);


        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeliveryOrder  $deliveryOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryOrder $deliveryOrder)
    {
        if($deliveryOrder){
            $deliveryOrder->delete();
             return redirect()->back()->with(['success' => 'Delivery Order deleted successfully!!']);

        }
    }
}
