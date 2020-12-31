<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inventory Management System</title>
    @php
        $company = App\Setting::first();
    @endphp
    @if($company)
    <link rel="icon" href="{{ asset('storage/app/public/'.$company->company_logo) }}">
    @endif
    <link href="{{ asset('public/backend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/backend/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('public/backend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('public/backend/css/style.css') }}" rel="stylesheet">
    <link href="{{asset('public/backend/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">
    <link href="{{asset('public/backend/css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    @yield('css')
</head>

<body style="background-color: #fff;">
   
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
                            <abbr title="Phone">Phone:</abbr> :01726633047<br>
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
                </div><!-- /table-responsive -->
                @if($order->discount)
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
                    </div>
                </div>
                @else

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
                            <tr>
                                <td><strong>Total :</strong></td>
                                <td>৳{{ $order->amount }}</td>
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
                    </div>
                </div>
                @endif


               {{--  <div class="well m-t"><strong>Comments</strong>
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
                </div> --}}
                {{ Cart::destroy() }}
            </div>
        </div>
    </div>
</div>


    <!-- Mainly scripts -->
    <script src="{{ asset('public/backend/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/bootstrap.js') }}"></script>
    <script src="{{ asset('public/backend/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('public/backend/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/toastr.js') }}"></script>
    <script src="{{asset('public/backend/js/sweetalert.min.js')}}"></script>

    <!-- Flot -->
    <script src="{{ asset('public/backend/js/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('public/backend/js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/plugins/flot/jquery.flot.spline.js') }}"></script>
    <script src="{{ asset('public/backend/js/plugins/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('public/backend/js/plugins/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('public/backend/js/plugins/flot/jquery.flot.symbol.js') }}"></script>
    <script src="{{ asset('public/backend/js/plugins/flot/jquery.flot.time.js') }}"></script>

    <!-- Peity -->
    <script src="{{ asset('public/backend/js/plugins/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/demo/peity-demo.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('public/backend/js/inspinia.js') }}"></script>
    <script src="{{ asset('public/backend/js/plugins/pace/pace.min.js') }}"></script>

    <!-- jQuery UI -->
    <script src="{{ asset('public/backend/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Jvectormap -->
    <script src="{{ asset('public/backend/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

    <!-- EayPIE -->
    <script src="{{ asset('public/backend/js/plugins/easypiechart/jquery.easypiechart.js') }}"></script>

    <!-- Sparkline -->
    <script src="{{ asset('public/backend/js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
    @yield('js')

    <script>
        //Toastr Notification
        @if(Session::has('messege'))
            var type="{{Session::get('alert-type','info')}}"
            switch(type){
              case 'info':
                   toastr.info("{{ Session::get('messege') }}");
                   break;
              case 'success':
                  toastr.success("{{ Session::get('messege') }}");
                  break;
              case 'warning':
                  toastr.warning("{{ Session::get('messege') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('messege') }}");
                  break;
            }
        @endif

        //Delete Alert
        $(document).on("click","#delete", function(e){
          e.preventDefault();
          var link = $(this).attr("href");
            swal({
              title: "Are you sure?",
              text: "Delete for everytime!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                window.location.href = link;
              } else {
                swal("Your file is safe!");
              }
            });
        });



    </script>
    <script>
        $('.my-select').selectpicker();
    </script>
</body>
</html>