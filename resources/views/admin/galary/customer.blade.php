@extends('admin.layouts.layout')

@section('css')

@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h3 class="font-weight-bold mt-3">Customer Galary </h3>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
	@foreach($customers as $customer)
    <div class="col-lg-2 col-md-3 col-sm-6">
        <div class="ibox">
            <div class="ibox-content product-box">
                <div class="product-imitation" style="padding: 0px;">
                	<img src="{{ asset('storage/app/public/'.$customer->photo) }}" style="height: 220px; width: 100%;">
                </div>
                <div class="m-2">
                    <a href="{{ route('profile.customer',$customer->id) }}" class="product-name"> {{ $customer->name }}</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

</div>


@endsection

@section('js')

@endsection

