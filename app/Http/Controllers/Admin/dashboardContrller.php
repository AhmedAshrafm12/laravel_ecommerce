<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class dashboardContrller extends Controller
{
    public function index(){
        $users = User::All();
        return view("admin.users.index",compact("users"));
    }


    public function view($id){
        $user=User::find($id);
        return view("admin.users.view",compact("user"));
    }
}
