<?php

namespace App\Http\Controllers;

use App\Models\Product_sub;
use App\Models\ProductExtra;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerGenarelController extends Controller
{
    public function card(Request $request)
    {
        $userid = user::first()->id;
        $data = ProductExtra::where('type', 0)->with('productcard')->whereHas('productcard')->where('user_id', $userid)->get();
        return $data;
    }
    public function wishlist(Request $request)
    {
        $userid = user::first()->id;
        $data = ProductExtra::where('type', 1)->with('productcard')->whereHas('productcard')->where('user_id', $userid)->get();
        return $data;
    }
    public function manage(Request $request, $name)
    {
        if ($name == 'card') {
            $x = 0;
        }else if ($name == 'wishlist') {
            $x = 1;
        }
        $userid = user::first()->id;
        $data = ProductExtra::manage($request, $userid, $x);
        return $data;
    }
}
