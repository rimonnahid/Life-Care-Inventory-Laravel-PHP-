<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product\Product;
use App\Order;
use App\Orderdetail;
use App\Shipping;
use App\Customer;
use App\Setting;
use App\Pv;
use Cart;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::latest()->get();
        $count = 1;
        return view('admin.orders.orders',compact('orders','count'));
    }

    public function pending()
    {
        $orders = Order::where('status',0)->latest()->get();
        $count = 1;
        return view('admin.orders.pending',compact('orders','count'));
    }

    public function approve()
    {
        $orders = Order::where('status',1)->latest()->get();
        $count = 1;
        return view('admin.orders.approve',compact('orders','count'));
    }
    public function newOrder()
    {
        $orders = Order::where('status',0)->latest()->get();
        $count = 1;
        return view('admin.orders.neworder',compact('orders','count'));
    }
    // public function processing()
    // {
    //     $orders = Order::where('status',2)->latest()->get();
    //     $count = 1;
    //     return view('admin.orders.processing',compact('orders','count'));
    // }
    // public function delivery()
    // {
    //     $orders = Order::where('status',3)->latest()->get();
    //     $count = 1;
    //     return view('admin.orders.delivery',compact('orders','count'));
    // }
    public function cancel()
    {
        $orders = Order::where('status',2)->latest()->get();
        $count = 1;
        return view('admin.orders.cancel',compact('orders','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart_content = Cart::count();
        if ($cart_content > 0) {
            
            $data = array();
            $data['customer_id'] = $request->customer_id; 
            $data['total_products'] = $request->total_products; 
            $data['amount'] = $request->amount; 
            $data['vat'] = $request->vat; 
            $data['shipping'] = $request->shipping; 
            $data['total_amount'] = $request->total_amount; 
            $data['date'] = $request->date;
            $data['month'] = $request->month;
            $data['year'] = $request->year;
            $data['payby'] = $request->payby;
            $data['card_number'] = $request->card_number;
            $data['tracking_code'] = $request->tracking_code;
            $data['status'] = $request->status;

            $order = Order::create($data);
            $tracking_code = $request->tracking_code;


            $contents = Cart::content();


            foreach($contents as $content)
            {
                Request()->validate([
                    'customer_id' => '',

                ]);
                $data = array();
                $data['order_id'] = $order->id;
                $data['product_id'] = $content->options->product_id;
                $data['customer_id'] = $request->customer_id;
                $data['pv'] = $content->options->pv * $content->qty;

                $data['date'] = date('d-m-y');
                $data['month'] = date('F');
                $data['year'] = date('Y');
                $pvs = Pv::create($data);

            }

            foreach($contents as $content)
            {
                $data = array();
                $data['order_id'] = $order->id;
                $data['pvs_id'] = $pvs->id;
                $data['product_id'] = $content->options->product_id;
                $data['product_name'] = $content->name;
                $data['size'] = $content->options->size;
                $data['color'] = $content->options->color;
                $data['qty'] = $content->qty;
                $data['single_price'] = $content->price;
                $data['total_price'] = $content->qty * $content->price;

                $product = Product::where('id',$content->options->product_id)->first();
                $qty = $product->quantity - $content->qty;
                $product->update(['quantity' => $qty]);
                $orderdetails = Orderdetail::create($data);
            }


            $customer = Customer::where('id',$request->customer_id)->first();

            $data = array();
            $data['order_id'] = $order->id;
            $data['name'] = $customer->name;
            $data['phone'] = $request->phone;
            $data['email'] = $request->email;
            $data['address'] = $request->address;
            $data['zipcode'] = $request->zipcode;
            $data['city'] = $request->city;
            $data['district'] = $request->district;

            $shipping = Shipping::create($data);

            $company = Setting::first();
            $count = 1;

            if ($order && $orderdetails && $shipping) {
                $notification = array(
                    'messege' => 'Order Completed!',
                    'alert-type' => 'success'
                );
                return redirect('/invoice/'.$customer->id.'/'.$tracking_code)->with($notification);
            }else{
                $notification = array(
                    'messege' => 'something went wrong!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        }else{
            $notification = array(
                'messege' => 'Cart is empty!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($order)
    {
        $order = Order::where('id',$order)->first();
        $orderdetails = $order->orderdetail;
        $company = Setting::first();
        return view ('admin.orders.order',compact('order','orderdetails','company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    //STATUS METHOD ARE HERE
    public function approveOrder(Request $request,Order $order)
    {
        $order->update(['status' => 1]);


        if ($order) {
            $notification = array(
                'messege' => 'Order Approved Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'something went wrong!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    // public function processingOrder(Order $order)
    // {
    //     $order->update(['status' => 2]);

    //     if ($order) {
    //         $notification = array(
    //             'messege' => 'Order Sending To Customer!',
    //             'alert-type' => 'success'
    //         );
    //         return redirect()->back()->with($notification);
    //     }else{
    //         $notification = array(
    //             'messege' => 'something went wrong!',
    //             'alert-type' => 'error'
    //         );
    //         return redirect()->back()->with($notification);
    //     }
    // }

    // public function deliveryOrder(Order $order)
    // {
    //     $order->update(['status' => 3]);

    //     if ($order) {
    //         $notification = array(
    //             'messege' => 'Order Delivery Done!',
    //             'alert-type' => 'info'
    //         );
    //         return redirect()->back()->with($notification);
    //     }else{
    //         $notification = array(
    //             'messege' => 'something went wrong!',
    //             'alert-type' => 'error'
    //         );
    //         return redirect()->back()->with($notification);
    //     }
    // }

    public function cancelOrder(Order $order)
    {
        $order->update(['status' => 2]);

        if ($order) {
            $notification = array(
                'messege' => 'Ops, Order Canceled!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'something went wrong!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function delete(Order $order)
    {
        $order->delete();
        if ($order) {
            $notification = array(
                'messege' => 'Order Deleted Successfully!',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'something went wrong!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
