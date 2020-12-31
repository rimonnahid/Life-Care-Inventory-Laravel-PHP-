@extends('admin.layouts.layout')

@section('css')
<link href="{{ asset('public/backend/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h3 class="font-weight-bold mt-3"> 
        @if($month == date('F'))
            {{ date('F') }} Attendance {{ date('Y') }} <small>(current month)</small>
        @else
            {{ $month }} Attendance {{ date('Y') }}
        @endif
            <a href="{{ route('new.attendance') }}" class="btn btn-sm btn-primary float-right">Take Attendance</a> <a href="{{ route('attendances') }}" class="btn btn-sm btn-success float-right mr-1">all attendance</a>  <a href="{{ route('today.attendance') }}" class="btn btn-sm btn-success float-right mr-1">today attendance</a></h3>
    </div>
</div>
<div class="wrapper wrapper-content">
	<div class="ibox-content">
		<div class="table-responsive">
            <h3 class="text-center">
                <a href="{{ route('january.attendance') }}" class="btn btn-sm btn-outline-primary m-1">January</a>
                <a href="{{ route('february.attendance') }}" class="btn btn-sm btn-outline-info m-1">February</a>
                <a href="{{ route('march.attendance') }}" class="btn btn-sm btn-outline-secondary m-1">March</a>
                <a href="{{ route('april.attendance') }}" class="btn btn-sm btn-outline-dark m-1">April</a>
                <a href="{{ route('may.attendance') }}" class="btn btn-sm btn-outline-danger m-1">May</a>
                <a href="{{ route('june.attendance') }}" class="btn btn-sm btn-outline-success m-1">June</a>
                <a href="{{ route('july.attendance') }}" class="btn btn-sm btn-outline-primary m-1">July</a>
                <a href="{{ route('august.attendance') }}" class="btn btn-sm btn-outline-info m-1">August</a>
                <a href="{{ route('september.attendance') }}" class="btn btn-sm btn-outline-secondary m-1">September</a>
                <a href="{{ route('october.attendance') }}" class="btn btn-sm btn-outline-danger m-1">October</a>
                <a href="{{ route('november.attendance') }}" class="btn btn-sm btn-outline-secondary m-1">November</a>
                <a href="{{ route('december.attendance') }}" class="btn btn-sm btn-outline-dark m-1">December</a>
            </h3>
            <table class="table table-striped table-bordered table-hover dataTables-example" >
               	<thead>
                    <tr>
                        <th>SL</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($attendance as $attend)
                    <tr class="gradeX">
                        <td>{{ $count++ }}</td>
                        <td>{{ $attend->edit_date }}</td>
                        <td class="center">
                        	<a href="{{ route('view.attendance',$attend->edit_date) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                        	<a href="{{ route('edit.attendance',$attend->edit_date) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                        	<a href="{{ route('delete.attendance',$attend->edit_date) }}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>SL</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
	</div>
</div>


@endsection

@section('js')
<script src="{{ asset('public/backend/js/plugins/dataTables/datatables.min.js') }}"></script>
<script src="{{ asset('public/backend/js/plugins/dataTables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $('.dataTables-example').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'Monthly Attendance'},
                {extend: 'pdf', title: 'Monthly Attendance'},

                {extend: 'print',
                 customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                }
                }
            ]

        });

    });

</script>
@endsection

