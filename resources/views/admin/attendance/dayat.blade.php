@extends('admin.layouts.layout')

@section('css')
<link href="{{ asset('public/backend/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h3 class="font-weight-bold mt-3">Attendance Sheet  <a href="{{ route('new.attendance') }}" class="btn btn-sm btn-danger float-right mr-1">Take Attendance</a>  <a href="{{ route('attendances') }}" class="btn btn-sm btn-primary float-right mr-1">all sheet</a></h3>
    </div>
</div>
<div class="wrapper wrapper-content">
	<div class="ibox-content">
		<div class="table-responsive">
			<h4 class="text-center text-info">
			@if($date->date == date('d-m-Y'))
				Today {{ $date->date }}
			@else 
				{{ $date->date }} Attendence 
			@endif 
				({{ $date->day }}/{{ $date->month }}/{{ $date->year }})</h4>
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
                        @if($attendance->attendance == '1')
                        	<div class="i-checks"><label class="text-success font-weight-bold"> <input type="radio" checked="" disabled=""> <i></i> Present </label></div>
                        @else
                        	<div class="i-checks"><label class="text-primary font-weight-bold"> <input type="radio" disabled=""> <i></i> Absent </label></div>
                        @endif
                        	
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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

