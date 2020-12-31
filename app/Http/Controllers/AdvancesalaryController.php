<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Salary\Advancesalary;

class AdvancesalaryController extends Controller
{
    public function index()
    {
    	$advancesalaries = Advancesalary::latest()->get();
    	$count = 1;
    	return view('admin.salary.advance.alladvance',compact('advancesalaries','count'));
    }

    public function create()
    {
    	$employees = Employee::all();
    	return view('admin.salary.advance.addsalary',compact('employees'));
    }

    public function store(Request $request)
    {
    	$advance = Advancesalary::where('emp_id',$request->emp_id)
    							->where('month',$request->month)
    							->where('year',$request->year)
    							->first();

    	if ($advance === NULL) {
    		$advancepay = Advancesalary::create($this->validateData());
    		if ($advancepay) {
	    		$notification = array(
	    			'messege' => 'Advance Payement Send Succsefully!',
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
    	}else{
    		$notification = array(
    			'messege' => 'Opps, Already Gave Advanced!',
    			'alert-type' => 'error'
    		);
    		return redirect()->back()->with($notification);
    	}
    }

    public function edit (Advancesalary $advancesalary)
    {
        return view('admin.salary.advance.editadvancesalary',compact('advancesalary'));
    }

    public function delete(Advancesalary $advancesalary)
    {
        $advancesalary->delete();
        if ($advancesalary) {
            $notification = array(
                'messege' => 'Employee Advance Salary Deleted Succsefully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'Sorry, Something Went Wrong!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function update(Advancesalary $advancesalary)
    {
        $amount = request()->salary;
        if ($advancesalary->Employee->salary < $amount) {
            $notification = array(
                'messege' => 'Amount is much for employee salary!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }else{
            $advancesalary->update($this->validateData());
            if ($advancesalary) {
                $notification = array(
                    'messege' => 'Employee AdvanceSalary Updated!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }else{
                $notification = array(
                    'messege' => 'Sorry, Update Failed!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        }
        
    }

    private function validateData()
    {
    	return request()->validate([
    		'emp_id' => 'required',
    		'month' => 'required',
    		'year' => 'required',
    		'salary' => 'required',
    	]);
    }

}
