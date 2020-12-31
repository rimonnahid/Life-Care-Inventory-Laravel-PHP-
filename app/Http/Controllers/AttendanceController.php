<?php

namespace App\Http\Controllers;

use App\Attendance;
use Illuminate\Http\Request;
use App\Employee;
use DB;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendance = Attendance::select('edit_date')->groupBy('edit_date')->get();
        $count = 1;

        return view('admin.attendance.allat',compact('attendance','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();
        $count = 1;
        return view('admin.attendance.newat',compact('employees','count'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = $request->date;
        $taken = Attendance::where('date',$date)->first();

        if ($taken) {
            $notification = array(
                'messege' => 'Opps, Already Taken!',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification); 
        }else{
            foreach($request->employee_id as $id){
                $attend = new Attendance();
                $attend->employee_id = $id;
                $attend->attendance = $request->attendance[$id];
                $attend->day = $request->day;
                $attend->date = $request->date;
                $attend->month = $request->month;
                $attend->year = $request->year;
                $attend->edit_date = date('d_m_Y');
                $attend->save();

            }

            if ($attend) {
                $notification = array(
                    'messege' => 'Attendance Taked Successfully!',
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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show($edit_date)
    {
        $date = Attendance::where('edit_date',$edit_date)->first();
        $attendances = Attendance::where('edit_date',$edit_date)->get();
        $count = 1;
        return view('admin.attendance.dayat',compact('date','attendances','count'));
    }

    public function today()
    {
        $today = date('d_m_Y');
        $date = Attendance::where('edit_date',$today)->first();
        if(!$date){
            $notification = array(
                'messege' => 'Please, At First Take Attendance!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
            
        }else{
            $attendances = Attendance::where('edit_date',$today)->get();
            $count = 1;
            return view('admin.attendance.dayat',compact('date','attendances','count'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit($edit_date)
    {
        $date = Attendance::where('edit_date',$edit_date)->first();
        $attendances = Attendance::where('edit_date',$edit_date)->get();
        $count = 1;
        return view('admin.attendance.editat',compact('date','attendances','count'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        foreach($request->id as $id){
            $attendance = Attendance::where('date',$request->date)->where('id',$id)->first();
            $attendance->attendance = $request->attendance[$id]; 
            $attendance->update();
        }

        if ($attendance) {
            $notification = array(
                'messege' => 'Attendance Updated!',
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function delete($edit_date)
    {  
        $attendances = Attendance::where('edit_date',$edit_date)->get();

        foreach ($attendances as $attend) {
            $attend->delete();
        }

        if ($attend) {
            $notification = array(
                'messege' => "This Day's Attendance Deleted!",
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

    //MONTHLY CONTROLLER METHOD
    public function current()
    {
        $month = date('F');
        $year = date('Y');
        $attendance = Attendance::where('month',$month)->where('year',$year)->select('edit_date')->groupBy('edit_date')->get();  
        $count = 1;
        return view('admin.attendance.monthly',compact('attendance','count','month'));
    }
    public function monthly($month)
    {
        $year = date('Y');
        $attendance = Attendance::where('month',$month)->where('year',$year)->select('edit_date')->groupBy('edit_date')->get();  
        $count = 1;
        return view('admin.attendance.monthly',compact('attendance','count','month','year'));
    }
    public function January()
    {
        $month = 'January';
        $year = date('Y');
        $attendance = Attendance::where('month',$month)->where('year',$year)->select('edit_date')->groupBy('edit_date')->get();
        $count = 1;
        return view('admin.attendance.monthly',compact('attendance','count','month'));
    }
    public function February()
    {
        $month = 'February';
        $year = date('Y');
        $attendance = Attendance::where('month',$month)->where('year',$year)->select('edit_date')->groupBy('edit_date')->get();
        $count = 1;
        return view('admin.attendance.monthly',compact('attendance','count','month'));
    }
    public function March()
    {
        $month = 'March';
        $year = date('Y');
        $attendance = Attendance::where('month',$month)->where('year',$year)->select('edit_date')->groupBy('edit_date')->get();
        $count = 1;
        return view('admin.attendance.monthly',compact('attendance','count','month'));
    }
    public function April()
    {
        $month = 'April';
        $year = date('Y');
        $attendance = Attendance::where('month',$month)->where('year',$year)->select('edit_date')->groupBy('edit_date')->get();
        $count = 1;
        return view('admin.attendance.monthly',compact('attendance','count','month'));
    }
    public function May()
    {
        $month = 'May';
        $year = date('Y');
        $attendance = Attendance::where('month',$month)->where('year',$year)->select('edit_date')->groupBy('edit_date')->get();
        $count = 1;
        return view('admin.attendance.monthly',compact('attendance','count','month'));
    }
    public function June()
    {
        $month = 'June';
        $year = date('Y');
        $attendance = Attendance::where('month',$month)->where('year',$year)->select('edit_date')->groupBy('edit_date')->get();
        $count = 1;
        return view('admin.attendance.monthly',compact('attendance','count','month'));
    }
    public function July()
    {
        $month = 'July';
        $year = date('Y');
        $attendance = Attendance::where('month',$month)->where('year',$year)->select('edit_date')->groupBy('edit_date')->get();
        $count = 1;
        return view('admin.attendance.monthly',compact('attendance','count','month'));
    }
    public function August()
    {
        $month = 'August';
        $year = date('Y');
        $attendance = Attendance::where('month',$month)->where('year',$year)->select('edit_date')->groupBy('edit_date')->get();
        $count = 1;
        return view('admin.attendance.monthly',compact('attendance','count','month'));
    }
    public function September()
    {
        $month = 'September';
        $year = date('Y');
        $attendance = Attendance::where('month',$month)->where('year',$year)->select('edit_date')->groupBy('edit_date')->get();
        $count = 1;
        return view('admin.attendance.monthly',compact('attendance','count','month'));
    }
    public function October()
    {
        $month = 'October';
        $year = date('Y');
        $attendance = Attendance::where('month',$month)->where('year',$year)->select('edit_date')->groupBy('edit_date')->get();
        $count = 1;
        return view('admin.attendance.monthly',compact('attendance','count','month'));
    }
    public function November()
    {
        $month = 'November';
        $year = date('Y');
        $attendance = Attendance::where('month',$month)->where('year',$year)->select('edit_date')->groupBy('edit_date')->get();
        $count = 1;
        return view('admin.attendance.monthly',compact('attendance','count','month'));
    }
    public function December()
    {
        $month = 'December';
        $year = date('Y');
        $attendance = Attendance::where('month',$month)->where('year',$year)->select('edit_date')->groupBy('edit_date')->get();
        $count = 1;
        return view('admin.attendance.monthly',compact('attendance','count','month'));
    }

    public function yearly()
    {
        $year = date('Y');
        $attendance = Attendance::where('year',$year)->select('month')->groupBy('month')->get();
        $count = 1;
        return view('admin.attendance.yearly',compact('attendance','count','year'));
    }

    //PRIVATE METHOD
    private function validateData()
    {
        return request()->validate([
            'employee_id' => '',
            'attendance' => 'required',
            'day' => '',
            'date' => '',
            'month' => '',
            'year' => '',

        ]);
    }
}
