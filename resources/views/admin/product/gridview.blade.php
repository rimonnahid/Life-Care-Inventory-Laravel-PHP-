@extends('admin.layouts.layout')


@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2 class="font-weight-bold">Product List <a href="{{ route('products') }}" class="btn btn-sm btn-primary float-right ml-2">List View</a> <a href="{{ route('new.product') }}" class="btn btn-sm btn-primary float-right">New Product</a></h2>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
	@foreach($products as $product)
    <div class="col-md-3">
        <div class="ibox">
            <div class="ibox-content product-box">
               <!--  <div class="product-imitation" style="padding: 0px;">
                	<img src="{{ asset('storage/app/public/'.$product->photo_1) }}" style="height: 220px; width: 200px;">
                </div> -->
                <div class="product-desc">
                    <span class="product-price">
                        Buy: ৳{{ $product->buy_price }} | Sell: ৳{{ $product->selling_price }}
                    </span>
                    <a href="{{ route('show.product',$product->id) }}" class="product-name"> {{ Str::words($product->name,5,'..') }}</a>

                    <div class="small m-t-xs">
                        Garage: {{ $product->garage }} - Route:{{ $product->route }}
                    </div>
                    <div class="m-t text-righ">

                        <a href="{{ route('show.product',$product->id) }}" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

</div>


@endsection

