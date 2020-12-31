@extends('admin.layouts.layout')

@section('css')
<link href="{{ asset('public/backend/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h3 class="font-weight-bold mt-3">Attendance Sheet  <a href="{{ route('today.attendance') }}" class="btn btn-sm btn-danger float-right mr-1">today attendance sheet</a> <a href="{{ route('attendances') }}" class="btn btn-sm btn-primary float-right mr-1">all attendance sheet</a></h3>
    </div>
</div>
<div class="wrapper wrapper-content">
	<div class="ibox-content">
		<div class="table-responsive">
		<form action="{{ route('update.attendance') }}" method="POST">
			@csrf
			<h4 class="text-center text-info">Update Attendence ({{ $date->date }}, {{ $date->day }}/{{ $date->month }}/{{ $date->year }})</h4>
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
                @foreach($attendances as $attendance)
                    <tr class="gradeX">
                        <td>{{ $count++ }}</td>
                        <td>{{ $attendance->Employee->name }}</td>
                        <td>{{ $attendance->Employee->id }}</td>
                        <td><img src="{{ asset('storage/app/public/'.$attendance->Employee->photo) }}" class="img-fluid img-circle" style="height: 30px;"></td>
                        <td class="center">
                        	<div class="i-checks"><label> <input type="radio" value="1" name="attendance[{{ $attendance->id }}]" required="" <?php if($attendance->attendance == 1){ echo "checked"; } ?>> <i></i> Present </label> <label> <input type="radio" value="0" name="attendance[{{ $attendance->id }}]" required="" <?php if($attendance->attendance == 0){ echo "checked"; } ?>> <i></i> Absent </label></div>
                        	@error('attendance')
                        		<span class="text-danger">{{ $message }}</span>
                        	@enderror
                        </td>
                    </tr>
                    <input type="hidden" name="id[]" value="{{ $attendance->id }}">
                    <input type="hidden" name="date" value="{{ $attendance->date }}">
                    <input type="hidden" name="month" value="{{ $attendance->month }}">
                    <input type="hidden" name="year" value="{{ $attendance->year }}">
                @endforeach
                </tbody>
            </table>
            <div align="center">
            	<button type="submit" class="btn btn-info">Update Attendance</button>
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

