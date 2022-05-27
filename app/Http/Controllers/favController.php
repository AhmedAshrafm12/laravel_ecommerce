<?php

namespace App\Http\Controllers;

use App\Models\fav;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class favController extends Controller
{
    public  function store($itemId){
        if(Auth::check()){
        if(fav::where("userId",Auth::id())->where('itemId',$itemId)->count() > 0)
        return Redirect::back()->withErrors(['msg' => 'this item is already in your cart']);
          $fav = new fav();
          $fav->userId=Auth::id();
          $fav->itemId=$itemId;
          $fav->save();
          return Redirect::back();
        }
        else
        return redirect('/');
        }

        public  function show(){
            if(isset($_COOKIE['lang']))
            App::setLocale($_COOKIE['lang']);
        if(Auth::check()){
        $favs = fav::where("userId",Auth::id())->get();
        return view('front.favs',compact('favs'));
        }
        else
        return redirect('/');
        }

        public  function remove($id){
        if (Auth::check()) {
            fav::find($id)->delete();
            return Redirect::back();
        }
        else
        return redirect('/');
        }


        public  function update($id,$count){
            if(Auth::check()){
              $cart = cart::find($id);
              $cart->UserId=Auth::id();
              $cart->count=$count;
              $cart->update();
              return Redirect::back();;
            }
            else
            return redirect('/');
            }}
