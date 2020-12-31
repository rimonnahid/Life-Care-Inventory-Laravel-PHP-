<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;

class ExpenseController extends Controller
{
    public function index()
    {
    	$expenses = Expense::latest()->get();
    	$count = 1;
        $sum = Expense::all()->sum('amount');
    	return view('admin.expense.allexp',compact('expenses','count','sum'));
    }

    public function today()
    {
        $date = date('d-m-Y');
        $expenses = Expense::where('date',$date)->latest()->get();
        $count = 1;
        $sum = Expense::where('date',$date)->sum('amount');
        return view('admin.expense.todayexp',compact('expenses','count','sum'));
    }

    public function month()
    {
        $month = date('F');
        $expenses = Expense::where('month',$month)->latest()->get();
        $sum = Expense::where('month',$month)->sum('amount');
        $count = 1;
        return view('admin.expense.monthlyexp',compact('expenses','count','sum','month'));
    }

    public function year()
    {
        $year = date('Y');
        $expenses = Expense::where('year',$year)->latest()->get();
        $count = 1;
        $sum = Expense::where('year',$year)->sum('amount');
        return view('admin.expense.yearlyexp',compact('expenses','count','sum'));
    }

    public function create()
    {
    	return view('admin.expense.newexp');
    }

    public function store()
    {
    	$expense = Expense::create($this->validateData());

    	if ($expense) {
            $notification = array(
                'messege' => 'Expense Added Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'Opps, Something Went Wrong!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function edit(Expense $expense)
    {
        return view('admin.expense.editexp',compact('expense'));
    }

    public function update(Expense $expense)
    {
        $expense->update($this->validateData());

        if ($expense) {
            $notification = array(
                'messege' => 'This Expense Information Updated!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'Opps, Something Went Wrong!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function delete(Expense $expense)
    {
        $expense->delete();

        if ($expense) {
            $notification = array(
                'messege' => 'Expense Deleted!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'Opps, Something Went Wrong!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    //Per Month Expense
    public function January()
    {
        $month = 'January';
        $expenses = Expense::where('month',$month)->latest()->get();
        $sum = Expense::where('month',$month)->sum('amount');
        $count = 1;
        return view('admin.expense.monthlyexp',compact('expenses','sum','month','count'));
    }
    public function February()
    {
        $month = 'Februry';
        $expenses = Expense::where('month',$month)->latest()->get();
        $sum = Expense::where('month',$month)->sum('amount');
        $count = 1;
        return view('admin.expense.monthlyexp',compact('expenses','sum','month','count'));
    }
    public function March()
    {
        $month = 'March';
        $expenses = Expense::where('month',$month)->latest()->get();
        $sum = Expense::where('month',$month)->sum('amount');
        $count = 1;
        return view('admin.expense.monthlyexp',compact('expenses','sum','month','count'));
    }
    public function April()
    {
        $month = 'April';
        $expenses = Expense::where('month',$month)->latest()->get();
        $sum = Expense::where('month',$month)->sum('amount');
        $count = 1;
        return view('admin.expense.monthlyexp',compact('expenses','sum','month','count'));
    }
    public function May()
    {
        $month = 'May';
        $expenses = Expense::where('month',$month)->latest()->get();
        $sum = Expense::where('month',$month)->sum('amount');
        $count = 1;
        return view('admin.expense.monthlyexp',compact('expenses','sum','month','count'));
    }
    public function June()
    {
        $month = 'June';
        $expenses = Expense::where('month',$month)->latest()->get();
        $sum = Expense::where('month',$month)->sum('amount');
        $count = 1;
        return view('admin.expense.monthlyexp',compact('expenses','sum','month','count'));
    }
    public function July()
    {
        $month = 'July';
        $expenses = Expense::where('month',$month)->latest()->get();
        $sum = Expense::where('month',$month)->sum('amount');
        $count = 1;
        return view('admin.expense.monthlyexp',compact('expenses','sum','month','count'));
    }
    public function August()
    {
        $month = 'August';
        $expenses = Expense::where('month',$month)->latest()->get();
        $sum = Expense::where('month',$month)->sum('amount');
        $count = 1;
        return view('admin.expense.monthlyexp',compact('expenses','sum','month','count'));
    }
    public function September()
    {
        $month = 'September';
        $expenses = Expense::where('month',$month)->latest()->get();
        $sum = Expense::where('month',$month)->sum('amount');
        $count = 1;
        return view('admin.expense.monthlyexp',compact('expenses','sum','month','count'));
    }
    public function October()
    {
        $month = 'October';
        $expenses = Expense::where('month',$month)->latest()->get();
        $sum = Expense::where('month',$month)->sum('amount');
        $count = 1;
        return view('admin.expense.monthlyexp',compact('expenses','sum','month','count'));
    }
    public function November()
    {
        $month = 'November';
        $expenses = Expense::where('month',$month)->latest()->get();
        $sum = Expense::where('month',$month)->sum('amount');
        $count = 1;
        return view('admin.expense.monthlyexp',compact('expenses','sum','month','count'));
    }
    public function December()
    {
        $month = 'December';
        $expenses = Expense::where('month',$month)->latest()->get();
        $sum = Expense::where('month',$month)->sum('amount');
        $count = 1;
        return view('admin.expense.monthlyexp',compact('expenses','sum','month','count'));
    }

    private function validateData()
    {
    	return Request()->validate([
    		'details' => 'required',
    		'amount' => 'required',
    		'date' => '',
    		'month' => '',
    		'year' => '',
    	]);
    }
}
