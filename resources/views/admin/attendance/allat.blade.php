@extends('admin.layouts.layout')

@section('css')
<link href="{{ asset('public/backend/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2 class="font-weight-bold">All Attendance <a href="{{ route('new.attendance') }}" class="btn btn-sm btn-primary float-right">Take Attendance</a> <a href="{{ route('current.attendance') }}" class="btn btn-sm btn-success float-right mr-1">monthly attendance</a>  <a href="{{ route('today.attendance') }}" class="btn btn-sm btn-success float-right mr-1">today attendance</a></h2>
    </div>
</div>
<div class="wrapper wrapper-content">
	<div class="ibox-content">
		<div class="table-responsive">
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
                {extend: 'excel', title: 'All Attendance'},
                {extend: 'pdf', title: 'All Attendance'},

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

