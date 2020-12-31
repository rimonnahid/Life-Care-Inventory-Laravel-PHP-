<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Salary\Salary;
use App\Employee;

class SalaryController extends Controller
{
    public function index()
    {
    	$salaries = Salary::latest()->get();
        $count = 1;
    	return view ('admin.salary.allsalary',compact('salaries','count'));
    }

    public function lastMonth()
    {
        $salaries = Salary::where('month', date('F', strtotime('-1 month')))->get();
        $count = 1;
        return view('admin.salary.lastmonthsalary',compact('salaries','count'));
    }


    public function create()
    {
    	$employees = Employee::all();
    	return view('admin.salary.addsalary',compact('employees'));
    }

    public function store(Request $request)
    {
        $employee = Employee::where('id',$request->employee_id)->first();
        $salarypaid = Salary::where('employee_id',$request->employee_id)
                            ->where('month',$request->month)
                            ->where('year',$request->year)
                            ->where('paid_amount',$employee->salary)
                            ->first();
    	if ($salarypaid === NULL) {
            $salary = Salary::where('employee_id',$request->employee_id)
                            ->where('month',$request->month)
                            ->where('year',$request->year)
                            ->first();
            if ($salary === NULL) {
                $amount = $request->paid_amount;
                if ($employee->salary < $amount) {
                    $notification = array(
                        'messege' => 'Amount is much for employee salary!',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                }else{
                    $salarypay = Salary::create($this->validateData());
                    if ($salarypay) {
                        $notification = array(
                            'messege' => 'Employee Salary Paid Succsefully!',
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
            }
            else{
                $salary = Salary::where('employee_id',$request->employee_id)
                                ->where('month',$request->month)
                                ->where('year',$request->year)
                                ->first();
                $amount = $salary->paid_amount + $request->paid_amount;
                if ($employee->salary < $amount) {
                    $notification = array(
                        'messege' => 'Amount is much for employee salary!',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);

                }else{
                    $salary->update(['paid_amount' => $salary->paid_amount + $request->paid_amount]);
                    $notification = array(
                        'messege' => 'Employee Salary Updated!',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                }
            } 

    	}else{
            $notification = array(
                'messege' => "Warning! Employee's Salary Already Paid!",
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function edit (Salary $salary)
    {
        return view('admin.salary.editsalary',compact('salary'));
    }

    public function update(Salary $salary)
    {
        $amount = request()->paid_amount;
        if ($salary->Employee->salary < $amount) {
            $notification = array(
                'messege' => 'Amount is much for employee salary!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }else{
            $salary->update($this->validateData());
            if ($salary) {
                $notification = array(
                    'messege' => 'Employee Salary Updated!',
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

    public function delete(Salary $salary)
    {
        $salary->delete();
        if ($salary) {
            $notification = array(
                'messege' => 'Employee Salary Deleted Succsefully!',
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

    private function validateData()
    {
    	return Request()->validate([
    		'employee_id' => 'required',
    		'month' => 'required',
    		'year' => 'required',
    		'paid_amount' => 'required'
    	]);
    }
}
