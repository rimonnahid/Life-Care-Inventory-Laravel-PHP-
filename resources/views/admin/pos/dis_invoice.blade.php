@php
    $carts = Cart::content();
@endphp
@extends('admin.layouts.layout')

@section('css')
<link href="{{ asset('public/backend/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
<link href="{{ asset('public/backend/css/print.css') }}" rel="stylesheet" media="print">
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading" id="print-none">
    <div class="col-lg-12">
        <h3 class="font-weight-bold mt-3">Invoice <a href="#" target="_blank" class="btn btn-sm btn-primary float-right" onclick="print()"><i class="fa fa-print"></i> Print Invoice </a></h3>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="ibox-content p-xl" id="Print">
                <div class="row">
                    <div class="col-sm-4">
                        {{-- <h5>From:</h5>
                        <address>
                            <strong>{{ $company->company_name }}</strong><br>
                            {{ $company->company_address }}<br>
                            {{ $company->company_city }} - {{ $company->company_zipcode }}, {{ $company->company_country }}<br>
                            <abbr title="Phone">Phone:</abbr> {{ $company->company_phone }} <br>
                            <abbr title="Phone">Email:</abbr> {{ $company->company_email }}
                        </address> --}}
                    </div>


                    <div class="col-sm-4 text-center">
                        <h5>From:</h5>
                        <address>
                            <strong>Modern life care and Food</strong><br>
                            Address : ondho kollan Market (2nd Floor) , EYE Hospital Gate , Islampur , Mejortila , Sylhet<br>
                            <abbr>Phone:</abbr> :01726633047<br>
                        </address>
                    </div>

                    <div class="col-sm-4 text-right">
                        {{-- <h4>Tracking Code No.</h4>
                        <h4 class="text-navy">{{ $tracking_code }}</h4>
                        <span>To:</span>
                        <address>
                            <strong>{{ $customer->name }}</strong><br>
                            {{ $customer->address }}<br>
                            {{ $customer->city }}, Bangladesh<br>
                            <abbr title="Phone">Phone:</abbr> {{ $customer->phone }} <br>
                            @if($customer->email)
                            <abbr title="Phone">Email:</abbr> {{ $customer->email }}
                            @endif
                        </address>
                        <p>
                            <span><strong>Order Date:</strong> {{ date('d F,Y h:i A') }}</span><br/>
                            <span><strong>Due Date:</strong> {{ date('d F,Y' , strtotime('+7 day')) }}</span>
                        </p> --}}
                    </div>
                </div>

                <table class="table table-bordered">
                    <tr>
                        <td>Invoice No : {{ $order->tracking_code }}</td>
                        <td class="text-right"><Strong>Invoice Date</Strong> : {{ $order->created_at }}</td>
                    </tr>
                </table>
                <table class="table table-bordered">
                    <tr class="invoice_tr">
                        <td style="border:0; width: 20%;">ID :</td>
                        <td style="border:0;">{{ $customer->cus_id }}</td>
                    </tr>
                    <tr class="invoice_tr">
                        <td style="border:0;">Name :</td>
                        <td style="border:0;">{{ $customer->name }}</td>
                    </tr>

                    <tr>
                        <td style="border:0;">Address :</td>
                        <td style="border:0;">{{ $customer->address }}</td>
                    </tr>

                    <tr>
                        <td style="border:0;">Contact :</td>
                        <td style="border:0;">{{ $customer->phone }}</td>
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
                </div>
                <!-- /table-responsive -->
                                
                <table class="table invoice-total">
                    <tbody>
                        <tr>
                            <td><strong>Total Pv:</strong></td>
                            <td>{{ $sum_tot_Price}}</td>
                        </tr>
                        <tr>
                            <td><strong>Total :</strong></td>
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


               {{--  <div class="well m-t"><strong>Comments</strong>
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
                </div> --}}
                {{ Cart::destroy() }}
            </div>
        </div>
    </div>
</div>

@endsection
