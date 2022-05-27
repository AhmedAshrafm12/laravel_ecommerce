<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\User;
use App\Models\order;
use App\Models\orderItem;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use function PHPUnit\Framework\isEmpty;
use phpDocumentor\Reflection\Types\Null_;

class checkoutController extends Controller
{
    public function index(){
        if(isset($_COOKIE['lang']))
        App::setLocale($_COOKIE['lang']);
        $cart = cart::where("UserId",Auth::id())->get();
        return view('front.checkout',compact('cart'));
    }

    public function placeOrder(request $req){
        $cart = cart::where("UserId",Auth::id())->get();
        if(Auth::check()){
            foreach ($cart as $item)
            if($item->product->qty < $item->count)
            return Redirect::back()->withErrors("there is item out of the stock");
      $order  = new order();
      $order->firstName = $req->input('firstName');
      $order->lastName = $req->input('lastName');
      $order->Userid = Auth::id();
      $order->country = $req->input('country');
      $order->city = $req->input('city');
      $order->address = $req->input('address');
      $order->mobile = $req->input('mobile');
      $order->email = $req->input('email');
      $order->status =0;
      $order->trakcking_number=rand(0,1000);
      $order->total=$req->input('total');
      $order->payment_id=rand(0,1000);
      $order->payment_mood=rand(0,100).'payment';
       $order->save();
    $order->id;
  foreach ($cart as $item) {
      $product = products::find($item->product->id);
      $product->qty=$product->qty -  $item->count;
      $product->update();
    orderItem::create([
        'orderId'=>$order->id,
        'itemId'=>$item->itemId,
        'count'=>$item->count,
        'price'=>$item->product->selling_price,

    ]);
  }


  if(isEmpty(Auth::user()['address'])){
    $user  = User::find(Auth::id());
    $user->firstName = $req->input('firstName');
    $user->lastName = $req->input('lastName');
    $user->country = $req->input('country');
    $user->city = $req->input('city');
    $user->address = $req->input('address');
    $user->mobile = $req->input('mobile');
    $user->email = $req->input('email');
    $user->update();
  }
cart::destroy($cart);
return redirect('/')->withErrors(['msg' => 'order placed successfully !']);
        }

    }
}
