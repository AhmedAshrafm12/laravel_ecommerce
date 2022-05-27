<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class categoryController extends Controller
{
public function index()
{
$cats = categorie::all();
return view('admin.category.index', compact('cats'));
}

public function add()
{
return view('admin.category.add');
}

public function insert(request $request)
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

public function edit($id)
{
$mycat = categorie::find($id);
return view('admin.category.edit', ["mycat" => $mycat]);
}

public function update(request $request, $id)
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
return redirect('/categories')->with('category added successfuly');
}

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
