@extends('admin.layouts.layout')

@section('css')
<link href="{{ asset('public/backend/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2 class="font-weight-bold">Customer List <a href="{{ route('new.customer') }}" class="float-right btn btn-sm btn-primary">New Customer</a></h2>
    </div>
</div>
<div class="wrapper wrapper-content">
	<div class="ibox-content">
		<div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
               	<thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <!-- <th>Account Name</th>
                        <th>Account Number</th>
                        <th>Image</th> -->
                        <th>Join Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($customers as $customer)
                    <tr class="gradeX">
                        <td>{{ $count++ }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->address }}</td>
                        <!-- <td>{{ $customer->account_name }}</td>
                        <td>{{ $customer->account_number }}</td>
                        <td><img src="{{ asset('storage/app/public/'.$customer->photo) }}" style="height: 40px; width: 40px;"></td> -->
                        <td>{{ $customer->created_at }}</td>
                        <td class="center">
                        	<a href="{{ route('profile.customer',$customer->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                        	<a href="{{ route('edit.customer',$customer->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                        	<a href="{{ route('delete.customer',$customer->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <!-- <th>Account Name</th>
                        <th>Account Number</th>
                        <th>Image</th> -->
                        <th>Join Date</th>
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
                {extend: 'excel', title: 'Customer List'},
                {extend: 'pdf', title: 'Customer List'},

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

