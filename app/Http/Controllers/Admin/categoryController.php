<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


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
        ]);
        
        
        if ($request->has('file')) {
            $file = $request->file('file');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $file->move('assets/uploads/categories/', $fileName);
        }
        $status = $request->input('status') == true ? '1' : 0;
        $popular = $request->input('popular') == true ? '1' : 0;
        categorie::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'slug'=>$request->slug,
            'status'=>$status,
            'popular'=>$popular,
            'file'=>$fileName
        ]);
        
        return redirect('/categories')->with('category added successfuly'); 
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
    public function edit($id)
    {    
         
        $category = categorie::find($id);
        return view('admin.category.edit', ["category" => $category]);    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|min:4',
            'slug'=>'required',
            'description'=>'required|min:8',
        ]);
        
        $cat = categorie::find($id);
        if ($request->has('file')) {
            $path = 'assets/uploads/categories/' . $cat->file;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('file');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $file->move('assets/uploads/categories/', $fileName);
            $cat->file = $fileName;
        }
        
        
        $status = $request->input('status') == true ? '1' : 0;
        $popular = $request->input('popular') == true ? '1' : 0;
        categorie::find($id)->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'slug'=>$request->slug,
            'status'=>$status,
            'popular'=>$popular,
            'file'=>$fileName
        ]);
        return redirect('/categories')->with('category added successfuly');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = categorie::find($id);
        $path = 'assets/uploads/categories/' . $cat->file;
        if (File::exists($path)) {
            File::delete($path);
        }
        $cat->delete();
        return redirect('/categories')->with('category added successfuly');
        }
}
