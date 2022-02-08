<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


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
            'units' => 'required',
            'unit_type' => 'required',
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $path = time() . '-' . Str::random(6) . '.' . $file->extension();
            $request->file('image')->move(public_path('images'), $path);
            $pictureUrl = '/images/'.$path;
        }

        Product::create([
            'company_id' => $request->company_id,
            'item_type' => $request->item_type,
            'brand' => $request->brand,
            'quantity' => json_encode($request->quantity),
            'package_type' => json_encode($request->package_type),
            'units' => json_encode($request->units),
            'unit_type' => json_encode($request->unit_type),
            'image' => $pictureUrl ?? ''
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
            'units' => 'required',
            'unit_type' => 'required',
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $path = time() . '-' . Str::random(6) . '.' . $file->extension();
            $request->file('image')->move(public_path('images'), $path);
            $pictureUrl = '/images/'.$path;
            $product->image = $pictureUrl;
        }

        $product->company_id= $request->company_id;
        $product->item_type= $request->item_type;
        $product->brand= $request->brand;
        $product->quantity= json_encode($request->quantity);
        $product->package_type= json_encode($request->package_type);
        $product->units = json_encode($request->units);
        $product->unit_type = json_encode($request->unit_type);
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
            if(file_exists(public_path($product->image))){
                File::delete(public_path($product->image));
            } 
            $product->delete();
            return redirect()->back()->with(['success'=>'Product Deleted Successfully']);
        }
    }
}
