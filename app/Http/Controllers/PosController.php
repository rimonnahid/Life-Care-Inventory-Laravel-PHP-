<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product\Product;
use App\Product\Category;
use App\Customer;
use App\Order;
use Cart;

class PosController extends Controller
{
    public function index()
    {
    	$null = 0;
    	$products = Product::where('quantity','>',$null)->latest()->get();
    	$customers = Customer::all();
    	$categories = Category::all();
    	$count = 1;
    	return view('admin.pos.pos',compact('products','customers','categories','count'));
    }

    public function discount(Request $req)
    {
        // $cmp = Order::find($req->id);
        // $cmp->discount = $req->discount;
        // $cmp->save();
        $order_id = Order::where('tracking_code',$req->id)->first();
        $pay = $req->discount;
        $dis_price = 100 - $pay;
        $total = $order_id->amount * $dis_price / 100;
        $tracking_cod = $req->id;
        $order = Order::where('tracking_code',$req->id)->update(['discount' => $req->discount , 'total' =>$total]);


         if ($order) {
            $notification = array(
                'messege' => 'Order Completed!',
                'alert-type' => 'success'
            );
            return redirect('/dis_invoice/'.$order_id->customer_id.'/'.$tracking_cod)->with($notification);
        }else{
            $notification = array(
                'messege' => 'something went wrong!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function getSubcate($id)
    {
        $cus_id = Customer::where('id',$id)->get();
        return response()->json($cus_id);
    }
}
