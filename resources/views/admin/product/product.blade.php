@extends('admin.layouts.layout')

@section('css')
<link href="{{ asset('public/backend/css/plugins/slick/slick.css') }}" rel="stylesheet">
<link href="{{ asset('public/backend/css/plugins/slick/slick-theme.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">
                <div class="col-lg-12">

                    <div class="ibox product-detail">
                        <div class="ibox-content">

                            <div class="row">
                                <div class="col-md-5">
                                   {{--  <div class="product-images">
                                        <div>
                                            <div class="image-imitation" style="padding: 0px;">
                                                <img src="{{ asset('storage/app/public/'.$product->photo_1) }}" style="width: 100%;">
                                            </div>
                                        </div>
                                    @if($product->photo_2)
                                        <div>
                                            <div class="image-imitation" style="padding: 0px;">
                                                <img src="{{ asset('storage/app/public/'.$product->photo_2) }}" style="width: 100%;">
                                            </div>
                                        </div>
                                    @endif
                                    @if($product->photo_3)
                                        <div>
                                            <div class="image-imitation" style="padding: 0px;">
                                                <img src="{{ asset('storage/app/public/'.$product->photo_3) }}" style="width: 100%;">
                                            </div>
                                        </div>
                                    @endif
                                    </div> --}}
                                </div>
                                <div class="col-md-7">

                                    <h2 class="font-bold m-b-xs">
                                        {{ $product->name }}
                                    </h2>
                                    <small>Many desktop publishing packages and web page editors now.</small>
                                    <div class="m-t-md">
                                        <h4 class="product-main-price font-weight-bold">Selling Price: <span class="text-success">৳{{ $product->selling_price }}</span> <span class="float-right">Buying Price: <span class=" text-warning">৳{{ $product->buy_price }}</span></span></h4>
                                    </div>
                                    <hr>
                                    <dl class="small m-t-md">
                                        <dt>Product Code</dt>
                                        <dd>{{ $product->code }}</dd>
                                        <dt>Store Garage & Route</dt>
                                        <dd>{{ $product->garage }} & {{ $product->route }}</dd>
                                        <dt>Product Mfg. Date</dt>
                                        <dd>{{ $product->buy_date }}</dd>
                                        <dt>Product Expire Date</dt>
                                        <dd>{{ $product->expire_date }}</dd>
                                    </dl>

                                    <h4>Product description</h4>

                                    <div class="small text-muted">
                                        {!! $product->details !!}
                                    </div>
                                    
                                    <hr>

                                    <div>
                                        <div class="btn-group">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-cart-plus"></i> Add to cart</button>
                                            <button class="btn btn-white btn-sm"><i class="fa fa-star"></i> Add to wishlist </button>
                                            <button class="btn btn-white btn-sm"><i class="fa fa-envelope"></i> Contact with author </button>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="ibox-footer">
                            <span class="float-right">
                                Insert Date - <i class="fa fa-clock-o"></i> {{ $product->created_at }}
                            </span>
                            DelwarIT Product Detial
                        </div>
                    </div>

                </div>
            </div>

        </div>

@endsection

@section('js')
<!-- slick carousel-->
<script src="{{ asset('public/backend/js/plugins/slick/slick.min.js') }}"></script>
<script>
    $(document).ready(function(){

        $('.product-images').slick({
            dots: true
        });

    });

</script>
@endsection

