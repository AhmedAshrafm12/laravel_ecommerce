<?php

namespace App\Http\Controllers\Admin;
use App\Models\categorie;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = categorie::all();
        return view('admin.category.index', compact('categories'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:4',
            'slug'=>'required',
            'description'=>'required|min:8',
            'file'=>'required|image'
        ]);
        
        
        $path =  $request->file->store('uploads/categories','public');
        $status = $request->input('status') == true ? '1' : 0;
        $popular = $request->input('popular') == true ? '1' : 0;
        categorie::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'slug'=>$request->slug,
            'status'=>$status,
            'popular'=>$popular,
            'file'=>$path
        ]);
        
        return redirect()->back()->with('category added successfuly'); 
       }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(categorie $category)
    {    
        return view('admin.category.edit', ["category" => $category]);   
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categorie $category)
    {

        $request->validate([
            'name'=>'required|min:4',
            'slug'=>'required',
            'description'=>'required|min:8',
        ]);
     $path = $category->file;
    if ($request->has('file')) {
        $path =  $request->file->store('uploads/categories','public');
        Storage::delete('public/'.$category->file);
        }        
        $status = $request->input('status') == true ? '1' : 0;
        $popular = $request->input('popular') == true ? '1' : 0;
        $category->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'slug'=>$request->slug,
            'status'=>$status,
            'popular'=>$popular,
            'file'=>$path
        ]);
        return redirect()->back()->with('category added successfuly');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(categorie $category)
    {   
        Storage::delete('public/'.$category->file);
        $category->delete();
        return redirect()->back()->with('delete','deleted');
        }
}
