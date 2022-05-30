<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::all();
        return view("admin.products.index",['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
       $cats = categorie::all();
       return view("admin.products.add",['cats'=>$cats]);
    }


    public function store(Request $req)
    {
        $prod = new product();
       if($req->has('avatar')){
           $file = $req->file('avatar');
           $ext=$file->getClientOriginalExtension();
           $fileName = time().'.'.$ext;
           $file->move('assets/uploads/products/',$fileName);
           $prod->avatar = $fileName;
       }
       $prod->name = $req->input('name');
       $prod->cat_id = $req->input('cat_id');
       $prod->description = $req->input('description');
       $prod->meta_description = $req->input('meta_descrip');
       $prod->small_description	 = $req->input('small_description');
       $prod->qty = $req->input('qty');
       $prod->meta_title = $req->input('meta_title');
       $prod->original_price = $req->input('original_price');
       $prod->selling_price = $req->input('selling_price');
       $prod->tax= $req->input('tax');
       $prod->meta_keywords = $req->input('meta_keywords');
       $prod->status = $req->input('status') == true ? '1' :0;
       $prod->trending = $req->input('trending') == true ? '1' :0;
       $prod->save();
       return redirect('/products')->with('category added successfuly');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = product::find($id);
        return view("admin.products.edit",["product"=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update (Request $req, $id)
    {
        $prod = product::find($id);
        if($req->has('avatar')){
            $path = 'assets/uploads/products/'.$prod->avatar;
            if(File::exists($path)){
            File::delete($path);
            }
            $file = $req->file('avatar');
            $ext=$file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $file->move('assets/uploads/products/',$fileName);
            $prod->avatar = $fileName;
        }
        $prod->name = $req->input('name');
        $prod->description = $req->input('description');
        $prod->meta_description = $req->input('meta_descrip');
        $prod->small_description	 = $req->input('small_description');
        $prod->qty = $req->input('qty');
        $prod->meta_title = $req->input('meta_title');
        $prod->original_price = $req->input('original_price');
        $prod->selling_price = $req->input('selling_price');
        $prod->tax= $req->input('tax');
        $prod->meta_keywords = $req->input('meta_keywords');
        $prod->status = $req->input('status') == true ? '1' :0;
        $prod->trending = $req->input('trending') == true ? '1' :0;
        $prod->update();
        return redirect('/products')->with('category added successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = product::find($id);
        $path = 'assets/uploads/products/'.$product->file;
        if(File::exists($path)){
        File::delete($path);
        }
        $product->delete();
        return redirect('/products')->with('prod$productegory added successfuly');    }
}
