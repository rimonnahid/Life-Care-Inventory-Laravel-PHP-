@extends('admin.layouts.layout')

@section('css')
<link href="{{ asset('public/backend/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h3 class="font-weight-bold mt-3">Attendance Sheet  <a href="{{ route('today.attendance') }}" class="btn btn-sm btn-danger float-right mr-1">today attendance</a> <a href="{{ route('attendances') }}" class="btn btn-sm btn-primary float-right mr-1">all attendance</a></h3>
    </div>
</div>
<div class="wrapper wrapper-content">
	<div class="ibox-content">
		<div class="table-responsive">
		<form action="{{ route('store.attendance') }}" method="POST">
			@csrf
			<h4 class="text-center">Today's Attendence ({{ date('d-m-Y') }}, {{ date('D') }})</h4>
            <table class="table table-bordered table-hover" >
               	<thead>
                    <tr>
                        <th>SL</th>
                        <th>Employee Name</th>
                        <th>Employee ID</th>
                        <th>Photo</th>
                        <th>Present/Absent</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($employees as $employee)
                    <tr class="gradeX">
                        <td>{{ $count++ }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->id }}</td>
                        <input type="hidden" name="employee_id[]" value="{{ $employee->id }}">
                        <td><img src="{{ asset('storage/app/public/'.$employee->photo) }}" class="img-fluid img-circle" style="height: 30px;"></td>
                        <td class="center">
                        	<div class="i-checks"><label> <input type="radio" value="1" name="attendance[{{ $employee->id }}]" required=""> <i></i> Present </label> <label> <input type="radio" value="0" name="attendance[{{ $employee->id }}]" required=""> <i></i> Absent </label></div>
                        	@error('attendance')
                        		<span class="text-danger">{{ $message }}</span>
                        	@enderror
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div align="center">
            	<input type="hidden" name="day" value="{{ date('D') }}">
            	<input type="hidden" name="date" value="{{ date('d-m-Y') }}">
            	<input type="hidden" name="month" value="{{ date('F') }}">
            	<input type="hidden" name="year" value="{{ date('Y') }}">
            	<button type="submit" class="btn btn-primary">Take Attendance</button>
            </div>
        </form>
        </div>
	</div>
</div>




@endsection

@section('js')
<script src="{{ asset('public/backend/js/plugins/iCheck/icheck.min.js') }}"></script>
<script>
	//checkbox-radio
	$(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });

</script>
@endsection

