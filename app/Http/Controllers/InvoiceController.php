<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\DeliveryOrder;
use App\Models\DailyOrder;
use App\Models\Driver;
use App\Models\Company;
use App\Models\Vehicle;
use Illuminate\Http\Request;
 use Barryvdh\DomPDF\Facade\Pdf;

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
            'dailyOrder_ids'=>'required',
            'dailyOrder_weight'=>'required',
            'deliveryOrder_weight'=>'required',
            'total_weight'=>'required',
            // 'company_id'=>'required',
            'destination'=>'required',
            'vehicle_id'=>'required',
            'driver_id'=>'required',
            // 'commission'=>'required',
        ]);

       
        
        $deliveryOrder_ids = explode(',',$request->deliveryOrder_ids);
        $dailyOrder_ids = explode(',',$request->dailyOrder_ids);
        $destinations = explode(',',$request->destination);
 
        $invoice = Invoice::create([
            'daily_order_id'=>json_encode($dailyOrder_ids),
            'delivery_order_id'=> $request->deliveryOrder_ids ? json_encode($deliveryOrder_ids) : ' ',
            'daily_order_weight'=>$request->dailyOrder_weight,
            'delivery_order_weight'=>$request->deliveryOrder_weight,
            'total_weight'=>$request->total_weight,
            'company_id'=>0,
            'destination'=>json_encode($destinations),
            'vehicle_id'=>json_encode($request->vehicle_id),
            'driver_id'=>json_encode($request->driver_id),
            'commission'=>$request->fixed_commission ?? 0,
            'erpt'=>$request->erpt ?? 0,
            'arpt'=>$request->arpt ?? 0,
            'cpt'=>$request->cpt ?? 0,
            'opt'=>$request->opt ?? 0,
            'total_quantity'=>$request->total_quantity,
            'fixed_commission'=>$request->fixed_commission ?? 0,
            'ofc'=>$request->ofc ?? 0,
            'advance_freight'=>$request->advance_freight ?? 0,
            'balance_freight'=>$request->balance_freight ?? 0,
            'total_freight'=>$request->total_freight ?? 0
        ]);

        foreach($deliveryOrder_ids as $delivery_id){
            DeliveryOrder::where('id',$delivery_id)->update([
                'status'=>'closed'
            ]);
        }

        

        

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
        $pdf = PDF::loadView('invoice.show', $invoice->toArray());
        return $pdf->stream();

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
