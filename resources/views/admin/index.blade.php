@extends('admin.layouts.layout')

@section('content')
	<div class="wrapper wrapper-content">
        @if(auth()->user()->admin == 2)
        <div class="row">
            <div class="col-lg-3">
                <div class="ibox ">
                    <div class="ibox-title">
                        <span class="label label-primary float-right">Today</span>
                        <h5>Orders</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">{{ count($todayorders) }}</h1>
                        <small>{{ $todayorders->sum('total_products') }} products</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox ">
                    <div class="ibox-title">
                        <span class="label label-primary float-right">Today</span>
                        <h5>Pending Orders</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">{{ count($todayorders->where('status',0)) }}</h1>
                        <small>{{ $todayorders->where('status',0)->sum('total_products') }} products</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox ">
                    <div class="ibox-title">
                        <span class="label label-primary float-right">Today</span>
                        <h5>Expense</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">৳{{ $todayexpenses->sum('amount') }}</h1>
                        <small>{{ date('d/m/y') }} expenses</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox ">
                    <div class="ibox-title">
                        <span class="label label-primary float-right">Today</span>
                        <h5>Income</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">৳{{ $todayorders->sum('amount') }}</h1>
                        <small>Today Income</small>
                    </div>
                </div>
            </div>
        </div>   
        <div class="row">
            <div class="col-lg-3">
                <div class="ibox ">
                    <div class="ibox-title">
                        <span class="label label-info float-right">Monthly</span>
                        <h5>Orders</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">{{ count($monthlyorders) }}</h1>
                        <small>{{ $monthlyorders->sum('total_products') }} products</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox ">
                    <div class="ibox-title">
                        <span class="label label-info float-right">Monthly</span>
                        <h5>Delivery Orders</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">{{ count($monthlyorders->where('status',3)) }}</h1>
                        <small>{{ $monthlyorders->where('status',3)->sum('total_products') }} products</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox ">
                    <div class="ibox-title">
                        <span class="label label-info float-right">Monthly</span>
                        <h5>Expense</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">৳{{ $monthlyexpenses->sum('amount') }}</h1>
                        <small>{{ date('F') }} expenses</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox ">
                    <div class="ibox-title">
                        <span class="label label-info float-right">Monthly</span>
                        <h5>Income</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">৳{{ $monthlyorders->sum('mount') }}</h1>
                        <small>Monthly Income</small>
                    </div>
                </div>
            </div>
        </div> 
        <div class="row">
            <div class="col-lg-3">
                <div class="ibox ">
                    <div class="ibox-title">
                        <span class="label label-success float-right">Yearly</span>
                        <h5>Orders</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">{{ count($yearlyorders) }}</h1>
                        <small>{{ $yearlyorders->sum('total_products') }} products</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox ">
                    <div class="ibox-title">
                        <span class="label label-success float-right">Yearly</span>
                        <h5>Delivery Orders</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">{{ count($yearlyorders->where('status',3)) }}</h1>
                        <small>{{ $yearlyorders->where('status',3)->sum('total_products') }} products</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox ">
                    <div class="ibox-title">
                        <span class="label label-success float-right">Yearly</span>
                        <h5>Expense</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">৳{{ $yearlyexpenses->sum('amount') }}</h1>
                        <small>{{ date('Y') }} expenses</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox ">
                    <div class="ibox-title">
                        <span class="label label-success float-right">Yearly</span>
                        <h5>Income</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">৳{{ $yearlyorders->sum('amount') }}</h1>
                        <small>Yearly Income</small>
                    </div>
                </div>
            </div>
        </div> 
        <div class="row">
            <div class="col-lg-3">
                <div class="ibox ">
                    <div class="ibox-title">
                        <span class="label label-secondary float-right">Total</span>
                        <h5><i class="fa fa-shopping-cart"></i> Products</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">{{ count($products) }}</h1> 
                        <small>{{ $subproducts }} Products</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox ">
                    <div class="ibox-title">
                        <span class="label label-secondary float-right">Total</span>
                        <h5><i class="fa fa-users"></i> Customer</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">{{ count($customers) }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox ">
                    <div class="ibox-title">
                        <span class="label label-secondary float-right">Total</span>
                        <h5><i class="fa fa-users"></i> Empoyee</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">{{ count($employees) }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox ">
                    <div class="ibox-title">
                        <span class="label label-secondary float-right">Total</span>
                        <h5><i class="fa fa-users"></i> Supplier</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">{{ count($suppliers) }}</h1>
                    </div>
                </div>
            </div>
        </div>
        @else
        <h4>no permission yet</h4>
        @endif           
    </div>
@endsection