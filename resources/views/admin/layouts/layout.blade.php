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

<body>
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <a data-toggle="dropdown" class="dropdown-toggle float-left" href="#">
                            <span class="block m-t-xs font-bold">{{ Auth::user()->name }}</span>
                            <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
                        </a>
                        @if($company)
                        <img alt="image" class="rounded-circle float-right" src="{{ asset('storage/app/public/'.$company->company_logo) }}" style="height: 45px;">
                        @endif
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="dropdown-item" href="{{ route('setting') }}">Profile</a></li>
                            <li class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        Delwar IT
                    </div>
                </li>
                <li class="active">
                    <a href="{{ route('admin.dashboard') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
                </li>
                <li>
                    <a href="{{ route('pos') }}"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Point-Of-Sale (POS)</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-folder"></i> <span class="nav-label">Orders</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ route('new.orders') }}">New Orders</a></li>
                        <li><a href="{{ route('orders') }}">All Orders</a></li>
                        {{-- <li><a href="{{ route('pending.orders') }}">Pending Orders</a></li> --}}
                        <li><a href="{{ route('approve.orders') }}">Approve Orders</a></li>
                        <li><a href="{{ route('cancel.orders') }}">Cancel Orders</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Check Pv</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ route('customer.pv') }}">Customer Pvs</a></li>
                        <li><a href="{{ route('customer.allpv') }}">All PVs</a></li>
                        <li><a href="{{ route('customer.todaypv') }}">Today PVs</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Employee</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ route('new.employee') }}">Add Employee</a></li>
                        <li><a href="{{ route('employees') }}">All Employee</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Customer</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ route('new.customer') }}">Add Customer</a></li>
                        <li><a href="{{ route('customers') }}">All Customer</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Supplier</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ route('new.supplier') }}">Add Supplier</a></li>
                        <li><a href="{{ route('suppliers') }}">All Supllier</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-usd"></i> <span class="nav-label">Salary</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ route('new.salary') }}">Pay Salary</a></li>
                        <li><a href="{{ route('lastmonth.salary') }}">Last Month Salary</a></li>
                        <li><a href="{{ route('salaries') }}">All Salary</a></li>
                        <li>
                            <a href="#">Advance Salary<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li><a href="{{ route('new.advancesalary') }}">Pay Advance Salary</a></li>
                                <li><a href="{{ route('advancesalary') }}">All Advance Salary</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Product</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ route('new.product') }}">New Product</a></li>
                        <li><a href="{{ route('products') }}">All Product</a></li>
                        <li>
                            <a href="#">Product Category<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li><a href="{{ route('category') }}">Category</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('stockout') }}"><span class="nav-label">Stock Out</span></a>
                        </li>
                    </ul>
                </li>             
                <li>
                    <a href="#"><i class="fa fa-usd"></i> <span class="nav-label">Expense</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ route('new.expense') }}">New Expense</a></li>
                        <li><a href="{{ route('today.expenses') }}">Today Expense</a></li>
                        <li><a href="{{ route('month.expenses') }}">Monthly Expense</a></li>
                        <li><a href="{{ route('year.expenses') }}">Yearly Expense</a></li>
                        <li><a href="{{ route('expenses') }}">All Expense</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Attendance</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ route('new.attendance') }}">New Attendance</a></li>
                        <li><a href="{{ route('today.attendance') }}">Today Attendance</a></li>
                        <li><a href="{{ route('current.attendance') }}">Current Month Attendance</a></li>
                        <li><a href="{{ route('yearly.attendance') }}">Yearly Attendance</a></li>
                        <li><a href="{{ route('attendances') }}">All Attendance</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('setting') }}"><i class="fa fa-wrench"></i> <span class="nav-label">Setting</span></a>
                </li>
{{--                 <li>
                    <a href="#"><i class="fa fa-picture-o"></i> <span class="nav-label">Gallery</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ route('employee.galary') }}">Employee Gallery</a></li>
                        <li><a href="{{ route('supplier.galary') }}">Supplier Gallery</a></li>
                        <li><a href="{{ route('customer.galary') }}">Customer Gallery</a></li>
                    </ul>
                </li> --}}
                
            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    {{-- <form role="search" class="navbar-form-custom" action="search_results.html">
                        <div class="form-group">
                            <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                        </div>
                    </form> --}}
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span class="m-r-sm text-muted welcome-message">Welcome to Delwar IT Inventory Management System.</span>
                    </li>
                    {{-- <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li>
                                <div class="dropdown-messages-box">
                                    <a class="dropdown-item float-left" href="profile.html">
                                        <img alt="image" class="rounded-circle" src="{{ asset('public/backend/img/a1.jpg') }}">
                                    </a>
                                    <div>
                                        <small class="float-right">46h ago</small>
                                        <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                        <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a href="mailbox.html" class="dropdown-item">
                                        <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="mailbox.html" class="dropdown-item">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                        <span class="float-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <a href="profile.html" class="dropdown-item">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                        <span class="float-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <a href="grid_options.html" class="dropdown-item">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="float-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a href="notifications.html" class="dropdown-item">
                                        <strong>See All Alerts</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li> --}}


                    <li>
                        <a class="text-info" href="{{ route('logout') }}">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                    <li>
                        {{-- <a class="right-sidebar-toggle">
                            <i class="fa fa-tasks"></i>
                        </a> --}}
                    </li>
                </ul>

            </nav>
        </div>
        
        @yield('content')

        <div class="footer" id="print-none">
            <div class="float-right">
                <strong>Delowar IT</strong>
            </div>
            <div>
                <strong>Copyright</strong> Delowar IT &copy; {{ date('Y') }}
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