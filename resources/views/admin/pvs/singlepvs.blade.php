@extends('admin.layouts.layout')

@section('css')
<link href="{{ asset('public/backend/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('content')
{{-- <div class="row mt-3">
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-primary float-right">Today</span>
                <h5>PV</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">111</h1>
                <small> Total</small>
            </div>
        </div>
    </div>
</div> --}}
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2 class="font-weight-bold">{{ $customer->name }} <p class="float-right btn btn-sm btn-primary">{{ $orders->sum('amount') }}</p></h2>
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
                        <th>Order Tracking Code</th>
                        <th>Pv</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $count++ }}</td>
                        <td>
                            {{ $order->customer->name }}
                        </td>
                        <td>{{ $order->tracking_code }}</td>
                        <td>{{ $order->pv->sum('pv') }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td class="center">
                            <a href="{{ route('all.orders.pvs.details',$order->id) }}" class="btn btn-sm btn-success">Details</a>
                            <a href="{{ route('show.order',$order->id) }}" class="btn btn-sm btn-success">Invoice</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>SL</th>
                        <th>Customer Name</th>
                        <th>Order Tracking Code</th>
                        <th>Pv</th>
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

