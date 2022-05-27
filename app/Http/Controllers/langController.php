<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class langController extends Controller
{
    public function lang_change($lang)
    {
        $cookie_name = "lang";
        $cookie_value = $lang;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        App::setLocale('ar');
        Session::flash('lang','ar');
      return Redirect::back();
    }
}
