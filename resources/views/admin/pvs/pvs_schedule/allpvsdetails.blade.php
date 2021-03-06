@extends('admin.layouts.layout')

@section('css')
<link href="{{ asset('public/backend/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2 class="font-weight-bold">{{ $order->customer->name }} - Pvs Details </h2>
    </div>
</div>
<div class="wrapper wrapper-content">
	<div class="ibox-content">
		<div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
               	<thead>
                    <tr>
                        <th>SL</th>
                        <th>Customer Name</th>
                        <th>Product Name</th>
                        <th>Pv</th>
                        <th>Date</th>
                        <th>Month</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ $order->customer->name }}</td>
                        <td>{{ $order->product->name }}</td>
                        <td>{{ $order->pv }}</td>
                        <td>{{ $order->date }}</td>
                        <td class="center">{{ $order->month }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>SL</th>
                        <th>Customer Name</th>
                        <th>Product Name</th>
                        <th>Pv</th>
                        <th>Date</th>
                        <th>Month</th>
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
                {extend: 'excel', title: 'Order List'},
                {extend: 'pdf', title: 'Order List'},

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

