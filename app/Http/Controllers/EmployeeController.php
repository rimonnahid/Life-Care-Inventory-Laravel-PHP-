<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
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
    	$employees = Employee::all();
    	$count = 1;
    	return view ('admin.employee.allemp',compact('employees','count'));
    }

    public function create()
    {
    	return view ('admin.employee.addemp');
    }

    public function store()
    {
    	$data = request()->validate([
    		'name' => 'required',
    		'email' => '',
    		'phone' => '',
    		'address' => 'required',
    		'experience' => '',
    		'salary' => 'required',
    		'nid_no' => '',
    		'vacation' => '',
    		'city' => '',
    		'photo' => '',
    	]);

    	$employee = Employee::create($data);
    	$this->storeImage($employee);

    	if ($employee) {
    		$notification = array(
    			'messege' => 'Successfully Joined Employee!',
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

    public function show(Employee $employee)
    {
    	return view('admin.employee.profile',compact('employee'));
    }

    public function edit(Employee $employee)
    {
    	return view('admin.employee.editemp',compact('employee'));
    }

    public function update(Employee $employee)
    {
    	$data = request()->validate([
    		'name' => 'required',
    		'email' => '',
    		'phone' => 'required',
    		'address' => '',
    		'experience' => '',
    		'salary' => 'required',
    		'nid_no' => '',
    		'vacation' => '',
    		'city' => '',
    		'photo' => '',
    	]);

    	$employee->update($data);
    	$this->storeImageUpdate($employee);

    	if ($employee) {
    		$notification = array(
    			'messege' => 'Updated Successfully!',
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

    public function delete(Employee $employee)
    {
    	unlink('storage/app/public/'.$employee->photo);
    	$employee->delete();

    	if ($employee) {
    		$notification = array(
    			'messege' => 'Employee Removed Successfully!',
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

    public function storeImage($employee)
    {
    	if (request()->has('photo')) {
    		$employee->update([
    			'photo' => request()->photo->store('image/employee','public'),
    		]);
    	}
    }

    public function storeImageUpdate($employee)
    {
    	if (request()->has('photo')) {
    		if(request()->oldphoto){
    			unlink('storage/app/public/'.request()->oldphoto);
    		}
    		$employee->update([
    			'photo' => request()->photo->store('image/employee','public'),
    		]);
    	}
    }

}
