@extends('admin.layouts.layout')

@section('css')
<link href="{{ asset('public/backend/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2 class="font-weight-bold">Product List <a href="{{ route('gridview.products') }}" class="btn btn-sm btn-primary float-right ml-2">Grid View</a> <a href="{{ route('new.product') }}" class="btn btn-sm btn-primary float-right">New Product</a></h2>
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
                        <th>Buying Price</th>
                        <th>Selling Price</th>
                        <th>Qty</th>
                        <th>Store Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr class="gradeX">
                        <td>{{ $count++ }}</td>
                        <td><a href="{{ route('show.product',$product->id) }}">{{ Str::words($product->name,7,'..') }}</a></td>
                        <td>৳{{ $product->buy_price }}</td>
                        <td>৳{{ $product->selling_price }}</td>
                        <td>{{ $product->quantity }}</td>
                     {{--    <td>
                            <img src="{{ asset('storage/app/public/'.$product->photo_1) }}" style="height: 30px; width: 30px;">
                        @if($product->photo_2)
                            <img src="{{ asset('storage/app/public/'.$product->photo_2) }}" style="height: 30px; width: 30px;">
                        @endif
                        @if($product->photo_3)
                            <img src="{{ asset('storage/app/public/'.$product->photo_3) }}" style="height: 30px; width: 30px;">
                        @endif
                        </td> --}}
                        <td>{{ $product->created_at->diffForHumans() }}</td>
                        <td class="center">
                        	<a href="{{ route('show.product',$product->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                        	<a href="{{ route('edit.product',$product->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                        	<a href="{{ route('delete.product',$product->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Buying Price</th>
                        <th>Selling Price</th>
                        <th>Qty</th>
                        <th>Store Date</th>
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
                {extend: 'excel', title: 'Product List'},
                {extend: 'pdf', title: 'Product List'},

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

