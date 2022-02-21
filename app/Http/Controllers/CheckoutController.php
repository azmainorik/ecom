<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{


    //
   public function index()
   { 
   
     return view('front.checkout.checkout',[
      
      'cart_products' => Cart::content()

     ]);
     
   
   }


}
