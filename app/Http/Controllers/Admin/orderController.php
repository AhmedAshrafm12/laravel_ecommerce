<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\orderItem;
use Illuminate\Http\Request;

class orderController extends Controller
{
    public function index()
    {
        $orders = order::where("status", 0)->get();
        return view("admin.orders.index", compact("orders"));
    }

    public function ordersHistory()
    {
        $orders = order::where("status", 1)->get();
        return view("admin.orders.ordersHistory", compact("orders"));
    }

    public function show(order $order)
    {
        return view("admin.orders.show", compact("order"));
    }

    public function update(order $order, request $req)
    {
        $order->status = $req->input('status');
        $order->update();
        return redirect('/order')->withErrors('order updated successfuly !');
    }
}
