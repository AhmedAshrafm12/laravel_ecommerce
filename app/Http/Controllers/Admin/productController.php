<?php

namespace App\Http\Controllers\admin;

use App\Models\product;
use App\Models\categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::all();
        return view("admin.products.index", ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = categorie::all();
        return view("admin.products.create", ['categorie' => $categories]);}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $request->validate([
            'name' => 'required|min:4',
            'description' => 'required|min:8',
            'avatar' => 'required|image',
        ]);
        $status = $request->input('status') == true ? 1 : 0;
        $trending = $request->input('trending') == true ? 1: 0;
        $path = $request->avatar->store('uploads/products', 'public');
        product::create([
            'name' => $request->name,
            'category_id' => $request->cat_id,
            'description' => $request->description,
            'qty' => $request->qty,
            'tax' => $request->tax,
            'original_price' => $request->original_price,
            'selling_price' => $request->selling_price,
            'status' => $status,
            'trending' => $trending,
            'avatar' => $path,
        ]);
        return redirect()->back()->with('category added successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        return view('admin.products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        $request->validate([
            'name' => 'required|min:4',
            'description' => 'required|min:8',
        ]);

        $path = $product->avatar;
        if ($request->has('avatar')) {
            $path =  $request->avatar->store('uploads/products','public');
            Storage::delete('public/'.$product->avatar);
            }   

        $status = $request->input('status') == true ? '1' : 0;
        $trending = $request->input('trending') == true ? '1' : 0;
      $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'qty' => $request->qty,
            'tax' => $request->tax,
            'original_price' => $request->original_price,
            'selling_price' => $request->selling_price,
            'status' => $status,
            'trending' => $trending,
            'avatar' => $path,
        ]);
        return redirect()->back()->with('category added successfuly');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        Storage::delete('public/'.$product->avatar);
        $product->delete();
        return redirect()->back()->with('delete','deleted');    }
}
