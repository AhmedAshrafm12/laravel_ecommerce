<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\orderItem;
use Illuminate\Http\Request;

class orderController extends Controller
{
    public function index(){
        $orders = order::where("status",0)->get();
        return view("admin.orders.index",compact("orders"));
    }
    public function ordersHistory(){
        $orders = order::where("status",1)->get();
        return view("admin.orders.ordersHistory",compact("orders"));
    }

    public function view($id){
        $order=order::find($id);
        $orderitems = orderItem::where("orderId",$id)->get();
        return view("admin.orders.view",compact("orderitems","order"));
    }
    public function updateOrder($id,request $req){
   $order  = order::find($id);
 $order->status = $req->input('status');
 $order->update();
 return redirect('/orders')->withErrors('order updated successfuly !');
}
    }
