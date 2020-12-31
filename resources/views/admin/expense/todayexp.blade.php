@extends('admin.layouts.layout')

@section('css')
<link href="{{ asset('public/backend/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h3 class="font-weight-bold mt-3">Today Expense List ({{ date('d-m-Y') }}) <a href="{{ route('expenses') }}" class="btn btn-sm btn-success float-right">all expenses</a> <a href="{{ route('year.expenses') }}" class="btn btn-sm btn-secondary float-right mr-1">this year</a> <a href="{{ route('month.expenses') }}" class="btn btn-sm btn-primary float-right mr-1">this month</a> <a href="{{ route('today.expenses') }}" class="btn btn-sm btn-danger float-right mr-1">today</a></h3>
    </div>
</div>
<div class="wrapper wrapper-content">
	<div class="ibox-content">
		<div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
               	<thead>
                    <tr>
                        <th>SL</th>
                        <th>Details</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Month</th>
                        <th>Year</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($expenses as $expense)
                    <tr class="gradeX">
                        <td>{{ $count++ }}</td>
                        <td>{{ Str::words($expense->details,12,'..') }}</td>
                        <td>৳{{ $expense->amount }}</td>
                        <td>{{ $expense->date }}</td>
                        <td>{{ $expense->month }}</td>
                        <td>{{ $expense->year }}</td>
                        <td class="center">
                        	<a href="{{ route('edit.expense',$expense->id) }}" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                        	<a href="{{ route('delete.expense',$expense->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>SL</th>
                        <th>Details</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Month</th>
                        <th>Year</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
            <h2 class="text-center font-weight-bold">Total Expense: <span class="text-success">{{ $sum }}/= Taka</span></h2>
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
                {extend: 'excel', title: 'Today Expens'},
                {extend: 'pdf', title: 'Today Expens'},

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

