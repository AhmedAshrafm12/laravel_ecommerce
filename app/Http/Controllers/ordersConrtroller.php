<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\orderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class ordersConrtroller extends Controller
{
public function index(){
    if(isset($_COOKIE['lang']))
    App::setLocale($_COOKIE['lang']);
    $orders = order::where("Userid",Auth::id())->get();
    return view("front.orders.index",compact("orders"));
}

public function view($id){
    if(isset($_COOKIE['lang']))
    App::setLocale($_COOKIE['lang']);
    $orderitems = orderItem::where("orderId",$id)->get();
    return view("front.orders.view",compact("orderitems"));
}

}
