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
        <h3 class="font-weight-bold mt-3">Order Details 
            <a href="#" target="_blank" class="btn btn-sm btn-primary float-right ml-5" onclick="print()"><i class="fa fa-print"></i> Print Invoice </a>
            @if($order->status==1)
            @if(Auth::user()->admin == 2)
            <a href="{{ route('cancel.order',$order->id) }}" class="btn btn-sm btn-outline-danger float-right ml-2">Cancel</a>
            @endif
            @else 
            @if(Auth::user()->admin == 2)
            <a href="{{ route('cancel.order',$order->id) }}" class="btn btn-sm btn-outline-danger float-right ml-2">Cancel</a>
            @endif
            <a href="{{ route('approve.order',$order->id) }}" class="btn btn-sm btn-outline-primary float-right ml-2">Approve</a>
            @endif
        </h3>
    </div>

</div>
<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="ibox-content p-xl" id="Print">
                <div class="row">
					<div class="col-sm-12">
						@if($order->status == 0)
                        <h4 class="text-center text-secondary">Order Pending...</h4>
                    @elseif($order->status == 1)
                       	<h4 class="text-center text-success">Order Approved!</h4>
                 {{--    @elseif($order->status == 2)
                      	<h4 class="text-center text-dark">Order Sent To Customer...</h4>
                    @elseif($order->status == 3)
                        <h4 class="text-center text-info">Order Delivery Done!</h4> --}}
                    @elseif($order->status == 2)
                      	<h4 class="text-center text-danger">Ops, Order Canceled!</h4>
                    @endif
					</div>
                    <div class="col-sm-4">
                       {{--  <h5>From:</h5>
                        <address>
                            <strong>{{ $company->company_name }}</strong><br>
                            {{ $company->company_address }}<br>
                            {{ $company->company_city }} - {{ $company->company_zipcode }}, {{ $company->company_country }}<br>
                            <abbr>Phone:</abbr> {{ $company->company_phone }} <br>
                            <abbr>Email:</abbr> {{ $company->company_email }}
                        </address>
                        <p>
                            <span><strong>Order Date:</strong> {{ $order->date }} {{ $order->month }}, {{ $order->year }}</span><br/>
                            <span><strong>Due Date:</strong> After 7 days To Order Date</span>
                        </p> --}}
                    </div>


                    <div class="col-sm-4 text-center">
                        <h5>From:</h5>
                        <address>
                            <strong>Modern life care and Food</strong><br>
                            Address : ondho kollan Market (2nd Floor) , EYE Hospital Gate , Islampur , Mejortila , Sylhet<br>
                            <abbr title="Phone">Phone:</abbr> :01726633047<br>
                        </address>
                    </div>

                    <div class="col-sm-4 text-right">
                       {{--  <h4>Tracking Code</h4>
                        <h4 class="text-navy">{{ $order->tracking_code }}</h4>
                        <span>To:</span>
                        <address>
                            <strong>{{ $order->Customer->name }}</strong><br>
                            {{ $order->Customer->address }}<br>
                            {{ $order->Customer->city }}<br>
                            <abbr>Phone:</abbr> {{ $order->Customer->phone }} <br>
                            @if($order->Customer->email)
                            <abbr>Email:</abbr> {{ $order->Customer->email }}
                            @endif
                        </address> --}}
                        
                    </div>
                </div>

                <table class="table table-bordered">
                    <tr>
                        <td>Invoice No : {{ $order->tracking_code }}</td>
                        <td class="text-right"><Strong>Invoice Date</Strong> : {{ date('d F,Y h:i A') }}</td>
                    </tr>
                </table>
                <table class="table table-bordered">
                    <tr class="invoice_tr">
                        <td style="border:0; width: 20%;">ID :</td>
                        <td style="border:0;">{{ $order->customer->cus_id }}</td>
                    </tr>
                    <tr class="invoice_tr">
                        <td style="border:0;">Name :</td>
                        <td style="border:0;">{{ $order->customer->name }}</td>
                    </tr>

                    <tr>
                        <td style="border:0;">Address :</td>
                        <td style="border:0;">{{ $order->customer->address }}</td>
                    </tr>

                    <tr>
                        <td style="border:0;">Contact :</td>
                        <td style="border:0;">{{ $order->customer->phone }}</td>
                    </tr>
                </table>

                <div class="table-responsive m-t">
                   <table class="table invoice-table">
                        <thead>
                           <tr>
                                <th>Item Name</th>
                                <th>Quantity</th>
                                <th>Unit Pv</th>
                                <th>Unit Price</th>
                                <th class="text-right">Total Pv</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sum_tot_Price = 0 ?>
                    @foreach($orderdetails as $content)
                        <tr>
                            <td>{{ $content->product_name }}</td>
                            <td>{{ $content->qty }}</td>
                            <td>{{ $content->product->pv }}</td>
                            <td>৳{{ $content->single_price }}</td>
                            <td class="text-right">{{ $content->qty * $content->product->pv}}</td>
                            <td>৳{{ $content->total_price }}</td>
                        </tr>
                        <?php $sum_tot_Price += $content->qty * $content->product->pv ?>
                    @endforeach
                        </tbody>
                    </table>
                </div><!-- /table-responsive -->
                <div class="row">
                    <div class="col-md-4">
                        
                        <table class="table invoice-total">
                            <tbody>
                            <tr>
                                <td><strong>Total Pv:</strong></td>
                                <td>{{ $sum_tot_Price}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-8">
                                
                        <table class="table invoice-total">
                            <tbody>
                            
                            @if($order->discount)
                            <tr>
                                <td><strong>Sub-Total :</strong></td>
                                <td>৳{{ $order->amount }}</td>
                            </tr>
                            <tr>
                                <td><strong>discount :</strong></td>
                                <td>
                                     {{ $order->discount }}%
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Total :</strong></td>
                                <td>
                                     ৳{{ $order->total }}
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td><strong>Total :</strong></td>
                                <td>৳{{ $order->amount }}</td>
                            </tr>
                            @endif
        
                            {{-- 
                            <tr>
                                <td><strong>TAX :</strong></td>
                                <td>${{ Cart::tax() }}</td>
                            </tr>
                            <tr>
                                <td><strong>TOTAL :</strong></td>
                                <td>${{ Cart::total() }}</td>
                            </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>

              {{--   <div class="well m-t"><strong>Comments</strong>
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
                </div> --}}
            </div>
        </div>
    </div>
</div>

@endsection
