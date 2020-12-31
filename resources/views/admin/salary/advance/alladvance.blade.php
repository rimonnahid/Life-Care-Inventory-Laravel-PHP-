@extends('admin.layouts.layout')

@section('css')
<link href="{{ asset('public/backend/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2 class="font-weight-bold">Advance Payment List <a href="{{ route('new.advancesalary') }}" class="float-right btn btn-primary btn-sm">New Advance pay</a></h2>
    </div>
</div>
<div class="wrapper wrapper-content">
	<div class="ibox-content">
		<div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
               	<thead>
                    <tr>
                        <th>SL</th>
                        <th>Employee Name</th>
                        <th>Salary</th>
                        <th>Month</th>
                        <th>Year</th>
                        <th>Advance Pay</th>
                        <th>Payment Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($advancesalaries as $advancesalary)
                    <tr class="gradeX">
                        <td>{{ $count++ }}</td>
                        <td>{{ $advancesalary->Employee->name }}</td>
                        <td>{{ $advancesalary->Employee->salary }}</td>
                        <td>{{ $advancesalary->month }}</td>
                        <td>{{ $advancesalary->year }}</td>
                        <td>{{ $advancesalary->salary }}</td>
                        <td>{{ $advancesalary->created_at }}</td>
                        <td class="center">
                            <a href="{{ route('edit.advancesalary',$advancesalary->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil text-white"></i></a>
                            <a href="{{ route('delete.advancesalary',$advancesalary->id) }}" id="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash text-white"></i></a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>SL</th>
                        <th>Employee Name</th>
                        <th>Month</th>
                        <th>Year</th>
                        <th>Advance Pay</th>
                        <th>Payment Date</th>
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
                {extend: 'excel', title: 'Advance Salary'},
                {extend: 'pdf', title: 'Advance Salary'},

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

