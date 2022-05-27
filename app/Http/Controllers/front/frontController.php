<?php

namespace App\Http\Controllers\front;
use App\Models\products;

use App\Models\categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class frontController extends Controller
{
   public function home(){
    if(isset($_COOKIE['lang']))
    App::setLocale($_COOKIE['lang']);
       return redirect('/');
   }

    public function index(){
        if(isset($_COOKIE['lang']))
            App::setLocale($_COOKIE['lang']);
        $featured_prdocuts =  products::where('trending','1')->take(15)->get();
        return view('front.index' , compact('featured_prdocuts'));
    }

    public function category(){
        if(isset($_COOKIE['lang']))
        App::setLocale($_COOKIE['lang']);

        $featured_cats =  categorie::where('status','0')->get();
        $trending_cats =  categorie::where('popular','1')->get();
        return view('front.category' , compact('featured_cats','trending_cats'));
    }

    public function viewProducts($slug){
        if(isset($_COOKIE['lang']))
        App::setLocale($_COOKIE['lang']);

        $categorie =  categorie::where('slug',$slug)->first();
        $products =  products::where('cat_id',$categorie->id)->where('status','0')->take(15)->get();
        return view('front.products.index' , compact('categorie','products'));
    }
    public function prodcutDetails($id){
        if(isset($_COOKIE['lang']))
        App::setLocale($_COOKIE['lang']);

        $product =  products::find($id);
        $categorie =  categorie::where('id',$product->cat_id)->first();
        return view('front.products.view' , compact('categorie','product'));
    }


    public function updateUser(request $req){
        $user  = User::find(Auth::id());
        $user->firstName = $req->input('firstName');
        $user->lastName = $req->input('lastName');
        $user->country = $req->input('country');
        $user->city = $req->input('city');
        $user->address = $req->input('address');
        $user->mobile = $req->input('mobile');
        $user->email = $req->input('email');
        $user->update();
        return Redirect::back();
    }

}
