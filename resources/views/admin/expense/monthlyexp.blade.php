@extends('admin.layouts.layout')

@section('css')
<link href="{{ asset('public/backend/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h3 class="font-weight-bold mt-3">{{ $month.' '.date('Y') }} <a href="{{ route('expenses') }}" class="btn btn-sm btn-outline-success float-right">all expenses</a> <a href="{{ route('year.expenses') }}" class="btn btn-sm btn-outline-secondary float-right mr-1">this year</a> <a href="{{ route('today.expenses') }}" class="btn btn-sm btn-outline-danger float-right mr-1">today</a>

        <a href="{{ route('december.expenses') }}" class="btn btn-sm btn-warning float-right mr-1">December</a>
        <a href="{{ route('november.expenses') }}" class="btn btn-sm btn-primary float-right mr-1">November</a>
        <a href="{{ route('october.expenses') }}" class="btn btn-sm btn-danger float-right mr-1">October</a>
        <a href="{{ route('september.expenses') }}" class="btn btn-sm btn-info float-right mr-1">September</a>
        <a href="{{ route('august.expenses') }}" class="btn btn-sm btn-warning float-right mr-1">August</a>
        <a href="{{ route('july.expenses') }}" class="btn btn-sm btn-success float-right mr-1">July</a>
        <a href="{{ route('june.expenses') }}" class="btn btn-sm btn-primary float-right mr-1">June</a>
        <a href="{{ route('may.expenses') }}" class="btn btn-sm btn-danger float-right mr-1">May</a>
        <a href="{{ route('april.expenses') }}" class="btn btn-sm btn-info float-right mr-1">April</a>
        <a href="{{ route('march.expenses') }}" class="btn btn-sm btn-warning float-right mr-1">March</a>
        <a href="{{ route('february.expenses') }}" class="btn btn-sm btn-success float-right mr-1">February</a>
        <a href="{{ route('january.expenses') }}" class="btn btn-sm btn-primary float-right mr-1">January</a>
        </h3>
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
                {extend: 'excel', title: 'Monthly Expense'},
                {extend: 'pdf', title: 'Monthly Expense'},

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

