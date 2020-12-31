<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Product\Product;
use App\Customer;
use App\Setting;
use App\Order;
use App\Pv;

use Cart;

class CartController extends Controller
{
    public function index($id)
    {
    	$product = Product::findorFail($id);
    	$cart = array();
    	$cart['id'] = $id;
    	$cart['name'] = $product->name;
    	$cart['code'] = $product->code;
    	$cart['qty'] = 1;
    	$cart['weight'] = 1;
    	$cart['price'] = $product->selling_price;
        $cart['options']['pv'] = $product->pv;
        $cart['options']['size'] = $product->size;
    	$cart['options']['product_id'] = $product->id;
    	$cart['options']['photo_1'] = $product->photo_1;

    	$carts = Cart::add($cart);

        if ($carts) {
            $notification = array(
                'messege' => 'Product Added On Cart List!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    	
    }

    public function update($rowId)
    {
        $carts = Cart::content();
        foreach($carts as $cart) {
            $product = Product::where('id',$cart->options->product_id)->first();
            if($product->quantity >= request()->qty ){
                Cart::update($rowId, request()->qty);
        
                $notification = array(
                    'messege' => 'Cart Updated Successfully',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }else{
                $notification = array(
                    'messege' => 'Quantity Limit Out',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        }

    }

    public function delete($rowId)
    {
    	Cart::remove($rowId);

    	$notification = array(
			'messege' => 'Cart Deleted Successfully',
			'alert-type' => 'success'
		);
		return redirect()->back()->with($notification);
    }

    public function invoice(Request $request,$id,$tracking_code)
    {
        
        
        $customer = Customer::where('id',$id)->first();
        $company = Setting::first();
        $pvs = Pv::where('order_id',$id)->get();
        $contents = Cart::content();
        $count = 1;

        return view ('admin.pos.invoice',compact('customer','company','contents','count','tracking_code','pvs'));
    }

    public function dis_invoice($id,$tracking_code)
    {
        $customer = Customer::where('id',$id)->first();
        $company = Setting::first();
        $order = Order::where('tracking_code',$tracking_code)->first();
        $orderdetails = $order->orderdetail;
        $contents = Cart::content();
        $count = 1;
        return view ('admin.pos.dis_invoice',compact('customer','company','contents','order','orderdetails','count'));
    }

    public function print($id,$tracking_code)
    {
        $customer = Customer::where('id',$id)->first();
        $company = Setting::first();
        $order = Order::where('tracking_code',$tracking_code)->first();
        $orderdetails = $order->orderdetail;
        $contents = Cart::content();
        $count = 1;
        return view ('admin.pos.pdf',compact('customer','company','contents','order','orderdetails','count'));
    }
}
