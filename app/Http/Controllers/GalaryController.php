<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Supplier;
use App\Customer;

class GalaryController extends Controller
{
    public function employee()
    {
    	$employees = Employee::all();
    	return view('admin.galary.employee',compact('employees'));
    }

    public function supplier()
    {
    	$suppliers = Supplier::all();
    	return view('admin.galary.supplier',compact('suppliers'));
    }

    public function customer()
    {
    	$customers = Customer::all();
    	return view('admin.galary.customer',compact('customers'));
    }
}
