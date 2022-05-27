<?php

namespace App\Http\Controllers;

use App\Models\cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class cartController extends Controller
{
public  function store($itemId,$count){
if(Auth::check()){
if(cart::where("UserId",Auth::id())->where('itemId',$itemId)->count() > 0)
return Redirect::back()->withErrors(['msg' => 'this item is already in your cart']);
  $cart = new cart();
  $cart->UserId=Auth::id();
  $cart->itemId=$itemId;
  $cart->count=$count;
  $cart->save();
  return Redirect::back();
}
else
return redirect('/');
}

public  function show(){
    if(isset($_COOKIE['lang']))
    App::setLocale($_COOKIE['lang']);
if(Auth::check()){
$cart = cart::where("UserId",Auth::id())->get();
return view('front.cart',compact('cart'));
}
else
return redirect('/');
}

public  function remove($id){
if (Auth::check()) {
    cart::where("itemId", $id)->where("UserId", Auth::id())->first()->delete();
    return Redirect::back();
}
else
return redirect('/');
}


public  function update($id,$count){
    if(Auth::check()){
      $cart = cart::find($id);
if($cart->product->qty < $count)
return Redirect::back()->withErrors("out of the stock");
      $cart->UserId=Auth::id();
      $cart->count=$count;
      $cart->update();
      return Redirect::back();;
    }
    else
    return redirect('/');
    }
}
