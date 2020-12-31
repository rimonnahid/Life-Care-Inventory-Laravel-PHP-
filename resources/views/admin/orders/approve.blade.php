@extends('admin.layouts.layout')

@section('css')
<link href="{{ asset('public/backend/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h3 class="font-weight-bold mt-3">Approve Orders List</h3>
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
                        <th>Phone Number</th>
                        <th>Total Products</th>
                        <th>Tracking Code</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr class="gradeX">
                        <td>{{ $count++ }}</td>
                        <td>{{ $order->Customer->name }}</td>
                        <td>{{ $order->Customer->phone }}</td>
                        <td>{{ $order->total_products }}</td>
                        <td>{{ $order->tracking_code }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>
                            @if($order->status == 0)
                                <span class="badge badge-secondary">pending</span>
                            @elseif($order->status == 1)
                                <span class="badge badge-success">approved</span>
                          {{--   @elseif($order->status == 2)
                                <span class="badge badge-info">processing</span>
                            @elseif($order->status == 3)
                                <span class="badge badge-primary">delivered</span> --}}
                            @elseif($order->status == 2)
                                <span class="badge badge-danger">canceled</span>
                            @endif
                        </td>
                        <td class="center">
                            <a href="{{ route('show.order',$order->id) }}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>SL</th>
                        <th>Customer Name</th>
                        <th>Phone Number</th>
                        <th>Total Products</th>
                        <th>Tracking Code</th>
                        <th>Order Date</th>
                        <th>Status</th>
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
                {extend: 'excel', title: 'Approve Order List'},
                {extend: 'pdf', title: 'Approve Order List'},

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

