<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product\Product;
use App\Employee;
use App\Customer;
use App\Order;
use App\Supplier;
use App\Expense;

class AdminController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $dates = date('d-m-Y');
        $date = date('d');
        $month = date('F');
        $mon = date('m');
        $year = date('Y');
        $products = Product::all();
        $subproducts = Product::sum('quantity');
        $employees = Employee::all();
        $customers = Customer::all();
        $suppliers = Supplier::all();
        $todayexpenses = Expense::where('date',$dates)->where('month',$month)->where('year',$year)->get();
        $monthlyexpenses = Expense::where('month',$month)->where('year',$year)->get();
        $yearlyexpenses = Expense::where('year',$year)->get();
        $todayorders = Order::where('date',$date)->where('month',$mon)->where('year',$year)->get();
        $monthlyorders = Order::where('month',$mon)->where('year',$year)->get();
        $yearlyorders = Order::where('year',$year)->get();
    	return view('admin.index',compact('products','subproducts','employees','customers','suppliers','todayexpenses','monthlyexpenses','yearlyexpenses','todayorders','monthlyorders','yearlyorders'));
    }
}
