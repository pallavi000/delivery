<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\DeliveryOrder;
use App\Models\DailyOrder;
use App\Models\Driver;
use App\Models\Company;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::all();
        return view('invoice.index',compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies= Company::all();
        $drivers = Driver::all();
        $vehicles = Vehicle::all();
        $dailyOrders = DailyOrder::all();
        $deliveryOrders = DeliveryOrder::all();

        return view('invoice.create',compact('companies','drivers','vehicles','dailyOrders','deliveryOrders'));
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
            'daily_order_id'=>'required',
            'delivery_order_id'=>'required',
            'daily_order_weight'=>'required',
            'delivery_order_weight'=>'required',
            'total_weight'=>'required',
            'company_id'=>'required',
            'destination'=>'required',
            'vehicle_id'=>'required',
            'driver_id'=>'required',
            'commission'=>'required',
        ]);

        $invoice = Invoice::create([
            'daily_order_id'=>json_encode($request->daily_order_id),
            'delivery_order_id'=>json_encode($request->delivery_order_id),
            'daily_order_weight'=>$request->daily_order_weight,
            'delivery_order_weight'=>$request->delivery_order_weight,
            'total_weight'=>$request->total_weight,
            'company_id'=>json_encode($request->company_id),
            'destination'=>json_encode($request->destination),
            'vehicle_id'=>json_encode($request->vehicle_id),
            'driver_id'=>json_encode($request->driver_id),
            'commission'=>$request->commission,
        ]);

         return redirect()->back()->with(['success' => 'Invoice Created successfully!!']);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return view('invoice.show',compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        if($invoice){
            $invoice->delete();

             return redirect()->back()->with(['success' => 'Invoice deleted successfully!!']);

        }
    }
}
