@php
	$carts = Cart::content();
@endphp
@extends('admin.layouts.layout')

@section('css')
<link href="{{ asset('public/backend/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h3 class="font-weight-bold mt-3">Point of Sale (POS) <span class="float-right">{{ date('d-m-Y') }}</span></h3>
    </div>
</div>

<div class="wrapper wrapper-content  animated fadeInRight">
    <div class="row">
        <div class="col-lg-5">
            <div class="ibox">
                <div class="ibox-title" style="width: 100%;">
                    <h5>cart items (<span class="text-info">{{ Cart::count() }}</span>) List <small>(<a href="#" data-toggle="modal" data-target="#customerModal">Add New Customer</a>)</small></h5>
                </div>
                
                <div class="ibox-content" style="margin: 0px; padding: 0px; padding-bottom: 4px;">
                	<div class="panel panel-success" style="border-radius: 0px; border: none">
	                    <div class="panel-body">
	                    	
	                        <table class="table table-striped text-center">
	                        	<tr>
	                        		<th>Product Name</th>
	                        		<th>Qty</th>
	                        		<th>Price</th>
	                        		<th>Sub Total</th>
	                        		<th>Action</th>
	                        	</tr>
	                        	
	                        	@foreach($carts as $cart)
	                        	<tr>
	                        		<td>{{ Str::words($cart->name,3,'..') }}</td>
	                        		<td>
	                        			<form action="{{ route('update.cart',$cart->rowId) }}" method="POST">
	                        			@csrf
	                        				<input type="number" value="{{ $cart->qty }}" name="qty" style="width: 60px; height: 30px; border: 1px solid #E1E1E1; border-radius: 2px;">
	                        				<button type="submit" class="btn btn-sm btn-success mb-1"><i class="fa fa-check"></i></button>
	                        			</form>
	                        		</td>
	                        		<td>৳{{ $cart->price }}</td>
	                        		<td>৳{{ $cart->qty * $cart->price }}</td>
	                        		<td><a href="{{ route('delete.cart',$cart->rowId) }}" style="font-size: 18px;"><i class="fa fa-trash-o"></i></a></td>
	                        	</tr>
	                        	@endforeach
	                        </table>
	                        <div class="row">
                        		<div class="col-md-12" align="right">
                        			Total: ৳{{ str_replace(',','', Cart::subtotal())  }}
                        		</div>
                        		{{-- <div class="col-md-6 col-6" align="right">
                        			Total Vat: ${{ Cart::tax() }}
                        		</div> --}}
                        	</div>
	                    </div>
	                    <div class="panel-heading text-center" style="border-radius: 0px;">
	                        <h2>Total</h2>
	                        <h2>৳{{ Cart::subtotal() }}</h2>
	                    </div>
	                </div>

	                <div class="mx-3">
	                	<form action="{{ route('order.confirm') }}" method="POST">
	                		@csrf
	                		<div class="row">
	                			<div class="col-md-6">
	                				<div class="form-group">
	                					<label for="">Customer ID</label>
			                			<select class="form-control selectpicker" data-live-search="true"  name="customer_id" id="customer_id" required="">
						                	<option selected="" disabled="" value="">select customer</option>
								            	@foreach($customers as $customer)
								            		<option value="{{ $customer->id }}">{{ $customer->cus_id }}</option>
								            	@endforeach
						                </select>
						                @error('customer_id')
						                	<span class="text-danger">{{ $message }}</span>
						                @enderror
			                		</div>
	                			</div>
	                			<div class="col-md-6">
	                				<div class="form-group">
	                					<label for="">Customer Name</label>
	                					<select class="form-control" name="name" id="name">
                                    
                                  		</select>
	                				</div>
	                			</div>
	                		</div>

							<div class="row">
	                			<div class="col-md-6">
	                				<div class="form-group">
	                					<label>Phone</label>
	                					<select class="form-control" name="phone" id="phone">
                                    
                                  		</select>
	                				</div>
	                			</div>

	                			<div class="col-md-6">
	                				<div class="form-group">
	                					<label>Email <small>(Optional)</small></label>
	                					<input class="form-control" type="email" name="email" placeholder="enter customer email address">
	                				</div>
	                			</div>

	                				
	                			{{-- 	<div class="form-group">
	                					<label>Zip Code <small>(Optional)</small></label>
	                					<input class="form-control" type="text" name="zipcode" placeholder="post code">
	                				</div>

	                				<div class="form-group">
	                					<label>City <small>(Optional)</small></label>
	                					<input class="form-control" type="text" name="city" placeholder="enter city name">
	                				</div>

	                				<div class="form-group">
	                					<label>District <small>(Optional)</small></label>
	                					<input class="form-control" type="text" name="district" placeholder="enter district name">
	                				</div>

	                				<div class="form-group">
	                					<label>Shipping Expense <small>(Optional)</small></label>
	                					<input class="form-control" type="text" name="shipping" placeholder="enter district name">
	                				</div> --}}
	                			<div class="col-md-12">
	                				<div class="form-group">
	                					<label>Address : <small>(Optional)</small></label>
	                					<textarea class="form-control" name="address" id="address">
                                    
                                  		</textarea>
	                				</div>
	                			</div>

	                		</div>
{{-- 
	                		<div class="row">
	                			<div class="col-md-6">
	                				<div class="form-group">
	                					<label>Phone <small>(Optional)</small></label>
	                					<input class="form-control" name="phone" id="phone">
                                    
	                				</div>
	                			</div>
	                			<div class="col-md-6">
	                				<div class="form-group">
	                					<label>Email <small>(Optional)</small></label>
	                					<input class="form-control" type="email" name="email" placeholder="enter customer email address">
	                				</div>

	                				
	                				<div class="form-group">
	                					<label>Zip Code <small>(Optional)</small></label>
	                					<input class="form-control" type="text" name="zipcode" placeholder="post code">
	                				</div>

	                				<div class="form-group">
	                					<label>City <small>(Optional)</small></label>
	                					<input class="form-control" type="text" name="city" placeholder="enter city name">
	                				</div>

	                				<div class="form-group">
	                					<label>District <small>(Optional)</small></label>
	                					<input class="form-control" type="text" name="district" placeholder="enter district name">
	                				</div>

	                				<div class="form-group">
	                					<label>Shipping Expense <small>(Optional)</small></label>
	                					<input class="form-control" type="text" name="shipping" placeholder="enter district name">
	                				</div>
	                			</div>
	                			<div class="col-md-12">
	                				<div class="form-group">
	                					<label>Shipping Address <small>(Optional)</small></label>
	                					<textarea name="address" class="form-control"></textarea>
	                				</div>
	                			</div>
	                		</div> --}}
	                		<div class="row">
	                			<div class="col-md-6">
	                				<div class="form-group">
	                					<label>Pay By</label>
	                					<select name="payby" class="form-control">
	                						<option value="" disabled="">Select a payment option</option>
	                						<option value="HandCash">HandCash</option>
	                						<option value="Paypal">Paypal</option>
	                						<option value="Credit Card">Credit Card</option>
	                					</select>
	                				</div>
	                			</div>
	                			<div class="col-md-6">
	                				<div class="form-group">
	                					<label>Card Number <small>(Optional)</small></label>
	                					<input class="form-control" type="text" name="card_number" placeholder="enter credit card number">
	                				</div>
	                			</div>
	                		</div>
			                <div class="form-group">
			                	<button type="submit" class="btn btn-block btn-success btn-sm">Create Invoice</button>
			                </div>

			                <input type="hidden" name="total_products" value="{{ Cart::count() }}">
			                <input type="hidden" name="amount" value="{{ str_replace(',','', Cart::subtotal()) }}">
			                {{-- 
			                <input type="hidden" name="vat" value="{{ str_replace(',', '', Cart::tax()) }}">
			                <input type="hidden" name="total_amount" value="{{ str_replace(',', '', Cart::total()) }}"> --}}
			                <input type="hidden" name="date" value="{{ date('d') }}">
			                <input type="hidden" name="month" value="{{ date('m') }}">
			                <input type="hidden" name="year" value="{{ date('Y') }}">
			                <input type="hidden" name="tracking_code" value="{{ uniqid() }}">
			                <input type="hidden" name="status" value="0">
	                	</form>
	                </div>
                </div>
            </div>
        </div>

        <div class="col-lg-7">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Product List</h5>
                </div>
                <div class="ibox-content">
                	<div class="table-responsive">
			            <table class="table table-striped table-bordered table-hover dataTables-example" >
			               	<thead>
			                    <tr>
			                        <th>Add</th>
			                        <th>Name</th>
			                        <th>Size</th>
			                        <th>PV</th>
			                        <th>Qty</th>
			                        <th>Price</th>
			                    </tr>
			                </thead>

			                <tbody>
			                @foreach($products as $product)
			                    <tr class="gradeX">
			                        <td><a href="{{ route('add.cart',$product->id) }}" class="text-center" style="font-size: 25px;"><i class="fa fa-plus-square"></i></a></td>
			                        <td><a href="{{ route('show.product',$product->id) }}">{{ Str::words($product->name,5,'..') }}</a></td>
			                        <td>{{ $product->size }}</td>
			                        <td>{{ $product->pv }}</td>
			                        <td>{{ $product->quantity }}</td>
			                        <td>৳{{ $product->selling_price }}</td>
			                    </tr>
			                @endforeach
			                </tbody>
			                <tfoot>
			                    <tr>
			                        <th>Add</th>
			                        <th>Name</th>
			                        <th>Category</th>
			                        <th>PV</th>
			                        <th>Qty</th>
			                        <th>Price</th>
			                    </tr>
			                </tfoot>
			            </table>
			        </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="modal inmodal fade" id="customerModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <form action="{{ route('store.customer') }}" method="POST" enctype="multipart/form-data">
	    @csrf
	    @if($errors->any())
			@foreach($errors->all() as $error)
				<span class="text-danger">{{ $error }}</span>
			@endforeach
		@endif
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">New Customer Form</h4>
            </div>
            <div class="modal-body">
                <div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" name="name" placeholder="enter customer name" required="">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="text" class="form-control" name="email" placeholder="enter customer email">
						</div>
						<div class="form-group">
							<label>Bank Name</label>
							<input type="text" class="form-control" name="bank_name" placeholder="enter customer bank name">
						</div>
						<div class="form-group">
							<label>Account Name</label>
							<input type="text" class="form-control" name="account_name" placeholder="enter customer account name">
						</div>
						<div class="form-group">
							<label>City</label>
							<input type="text" class="form-control" name="city" placeholder="enter customer city">
						</div>
						<div class="form-group">
							<label>Address</label>
							<textarea class="form-control" name="address" required=""></textarea>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Gender</label>
							<select class="form-control" name="gender" required=""> 
								<option value="">select gender</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="tel" class="form-control" name="phone" placeholder="enter customer phone" required="">
						</div>
						<div class="form-group">
							<label>Shopname</label>
							<input type="text" class="form-control" name="shopname" placeholder="enter customer shopname">
						</div>
						<div class="form-group">
							<label>Bank Branch</label>
							<input type="text" class="form-control" name="bank_branch" placeholder="enter customer bank branch">
						</div>
						<div class="form-group">
							<label>Account Number</label>
							<input type="text" class="form-control" name="account_number" placeholder="enter customer account number">
						</div>
						<div class="form-group">
							<label>Photo</label>
							<div class="row">
								<div class="col-md-6">
									<input type="file" id="file" onchange="photoChange(this)" class="form-control mt-3" name="photo">
								</div>
								<div class="col-md-6">
									<img src="" id="photo">
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </form>
    </div>
</div>

<script>
	function photoChange(input) {
      	if (input.files && input.files[0]) {
          	var reader = new FileReader();
          	reader.onload = function (e) {
              	$('#photo')
              	.attr('src', e.target.result)
			  	.attr("class","img-thumbnail")
			  	.attr("height",'60px')
			  	.attr("width",'60px')
          	};
          	reader.readAsDataURL(input.files[0]);
     	}
    }

</script>
@endsection

@section('js')
<script src="{{ asset('public/backend/js/plugins/dataTables/datatables.min.js') }}"></script>
<script src="{{ asset('public/backend/js/plugins/dataTables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $('.dataTables-example').DataTable({
            pageLength: 100,
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

 <script type="text/javascript">
$(document).ready(function(){
 $('select[name="customer_id"]').on('change', function(){
     var customer_id = $(this).val();
     if(customer_id) {
         $.ajax({
             url: "{{  url('admin/get_cus_id/') }}/"+customer_id,
             type:"GET",
             dataType:"json",
             success:function(data) {
               $("select[name='name']").empty();
               $("select[name='phone']").empty();
               $("textarea[name='address']").empty();
               $.each(data, function(key,value){
               		$('select[name="name"]').append('<option value="'+ value.id +'">' + value.name + '</option>');
               		$('select[name="phone"]').append('<option value="'+ value.phone +'">' + value.phone + '</option>');
               		$('textarea[name="address"]').append(value.address);

               })
             },
         });
     } else {
        $('select[name="name"]').append('<option>Select Category First</option>');
     }
 });      
});


 </script>

@endsection

