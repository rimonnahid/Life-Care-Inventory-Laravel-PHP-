<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Pv;
use App\Order;
use App\Product\Product;

class CustomerController extends Controller
{
    public function index()
    {
    	$customers = Customer::latest()->get();
    	$count = 1;
    	return view('admin.customer.allcus',compact('customers','count'));
    }

    public function show(Customer $customer)
    {
    	return view('admin.customer.profile',compact('customer'));
    }

    public function create()
    {
    	return view('admin.customer.addcus');
    }

    public function store()
    {

    	$customer = Customer::create($this->validateData());
    	// $this->storeImage($customer);

    	if ($customer) {
    		$notification = array(
    			'messege' => 'Successfully Joined Customer!',
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

    public function edit(Customer $customer)
    {
    	return view('admin.customer.editcus',compact('customer'));
    }

    public function update(Customer $customer)
    {
    	$customer->update($this->validateData());
    	// $this->storeImageUpdate($customer);

    	if ($customer) {
    		$notification = array(
    			'messege' => 'Successfully Updated Customer Information!',
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

    public function delete(Customer $customer)
    {
    	// if ($customer->photo) {
    	// 	unlink('storage/app/public/'.$customer->photo);
    	// }
    	$customer->delete();

    	if ($customer) {
    		$notification = array(
    			'messege' => 'Customer Removed Successfully!',
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

    private function validateData()
    {
    	return request()->validate([
            'name' => 'required',
    		'cus_id' => 'required',
    		'phone' => 'required',
    		'email' => '',
            'address' => 'required',
            'gender' => 'required',
    		// 'shopname' => '',
    		// 'bank_name' => '',
    		// 'bank_branch' => '',
    		// 'account_name' => '',
    		// 'account_number' => '',
    		// 'city' => '',
    		// 'photo' => '',
    	]);
    }

    public function allPv()
    {
        $orders = Order::latest()->get();
        $sl = 1;
        return view('admin.pvs.allpvs',compact('orders','sl'));
    }
    public function todayPv()
    {
        $dates = date('d-m-Y');
        $date = date('d');
        $month = date('F');
        $mon = date('m');
        $year = date('Y');
        $orders = Order::where('date',$date)->where('month',$mon)->where('year',$year)->get();
        $sl = 1;
        return view('admin.pvs.todaypvs',compact('orders','sl'));
    }
    public function customerPv()
    {
        $customers = Customer::latest()->get();
        
        $count = 1;
        return view('admin.pvs.customerpvs',compact('customers','count'));
    }

    public function singlepvs($id)
    {
        $dates = date('d-m-Y');
        $date = date('d');
        $month = date('F');
        $mon = date('m');
        $year = date('Y');
        $orders = Order::where('customer_id',$id)->where('date',$date)->where('month',$mon)->where('year',$year)->get();
        $customer = Customer::find($id);
        $count = 1;
        return view('admin.pvs.singlepvs',compact('orders','count','customer'));
    }
    public function thismonthSinglepvs($id)
    {
        $dates = date('d-m-Y');
        $date = date('d');
        $month = date('F');
        $mon = date('m');
        $year = date('Y');
        $orders = Order::where('customer_id',$id)->where('month',$mon)->where('year',$year)->get();
        $customer = Customer::find($id);
        $count = 1;
        return view('admin.pvs.monthlysinglepvs',compact('orders','count','customer'));
    }

    public function appPvs_singleDetails($id)
    {
        $order = Order::findorFail($id);
        $orders = $order->pv;
        $count = 1;
        return view ('admin.pvs.pvs_schedule.allpvsdetails',compact('orders','order','count'));
    }






















    // public function todaySinglepvs($id)
    // {
    //     $todaysinglepvs = Pv::where('date',date('d-m-y'))->get();
    //     $count = 1;
    //     return view('admin.pvs.pvs_schedule.today_singlepvs',compact('todaysinglepvs','count'));
    // }

    // private function storeImage($customer)
    // {
    // 	if (request()->has('photo')) {
    // 		$customer->update([
    // 			'photo' => request()->photo->store('image/customer','public'),
    // 		]);
    // 	}
    // }

    // private function storeImageUpdate($customer)
    // {
    // 	if(request()->has('photo')) {
    // 		if(request()->oldphoto){
    // 			unlink('storage/app/public/'.request()->oldphoto);
    // 		}
    //         $customer->update([
    //             'photo' => request()->photo->store('image/customer','public'),
    //         ]);
    // 	}
    // }
}
