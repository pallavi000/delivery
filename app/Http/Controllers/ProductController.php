<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('product.create', compact('companies'));
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
            'company_id' => 'required',
            'item_type' => 'required',
            'brand' => 'required',
            'quantity' => 'required',
            'package_type' => 'required',
        ]);

        Product::create([
            'company_id' => $request->company_id,
            'item_type' => $request->item_type,
            'brand' => $request->brand,
            'quantity' => $request->quantity,
            'package_type' => $request->package_type,
        ]);
        return redirect()->back()->with(['success'=>'Product Added Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $companies = Company::all();
        return view('product.edit', compact('product','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'company_id' => 'required',
            'item_type' => 'required',
            'brand' => 'required',
            'quantity' => 'required',
            'package_type' => 'required',
        ]);

        $product->company_id= $request->company_id;
        $product->item_type= $request->item_type;
        $product->brand= $request->brand;
        $product->quantity= $request->quantity;
        $product->package_type= $request->package_type;
        $product->save();
        return redirect()->back()->with(['success'=>'Product Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product) {
            $product->delete();
            return redirect()->back()->with(['success'=>'Product Deleted Successfully']);
        }
    }
}
