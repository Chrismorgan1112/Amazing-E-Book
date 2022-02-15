<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CartController extends Controller
{
    //
    public function index($id,$localization='en'){
        App::setLocale($localization);
        $orders = Order::where('account_id', $id)->get();
        return view('cart',['orders'=>$orders]);
    }

    public function deleteItemCart($order_id, $localization='en'){
        App::setLocale($localization);
        Order::where('order_id',$order_id)->delete();
        return back();
    }

    public function cartSubmit($id, $localization='en'){
        App::setLocale($localization);
        Order::where('account_id',$id)->delete();
        return view('success');
    }

}
