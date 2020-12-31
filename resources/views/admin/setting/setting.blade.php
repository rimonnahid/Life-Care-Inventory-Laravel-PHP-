@extends('admin.layouts.layout')



@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h3 class="font-weight-bold mt-3">
        	Setting Page
        @if($setting)
        	<a href="{{ route('create.setting') }}" class="btn btn-sm btn-success float-right">Edit Setting</a>
        @else
        	<a href="{{ route('create.setting') }}" class="btn btn-sm btn-success float-right">Edit Setting</a>
        @endif
    	</h3>
    </div>
</div>
@if($setting)
<div class="wrapper wrapper-content">
	<div class="row animated fadeInRight">
        <div class="col-md-4">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>{{ $setting->company_name }}</h5>
                </div>
                <div>
                    <div class="ibox-content no-padding border-left-right">
                        <img alt="image" class="img-fluid" src="{{ asset('storage/app/public/'.$setting->company_logo) }}" alt="{{ asset('storage/app/public/'.$setting->company_logo) }}" style="width: 100%; height: auto;">
                    </div>
                    <div class="ibox-content profile-content">
                        <h4><strong>{{ $setting->company_name }}</strong></h4>
                        <p><i class="fa fa-map-marker"></i> Phone <span class="float-right">{{ $setting->company_phone }}</span></p>
                        <p><i class="fa fa-map-marker"></i> E-mail <span class="float-right">{{ $setting->company_email }}</span></p>
                        <p><i class="fa fa-map-marker"></i> City <span class="float-right">{{ $setting->company_city }}</span></p>
                        <p><i class="fa fa-map-marker"></i> Post Code <span class="float-right">{{ $setting->company_zipcode }}</span></p>
                        <p><i class="fa fa-map-marker"></i> Country <span class="float-right">{{ $setting->company_country }}</span></p>
                        <h5>
                            <i class="fa fa-address-card"></i> Address
                        </h5>
                        <p>
                            {{ $setting->company_address }}
                        </p>
                        <div class="user-button">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-primary btn-sm btn-block"><i class="fa fa-envelope"></i> Send Message</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-default btn-sm btn-block"><i class="fa fa-coffee"></i> Buy a coffee</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>{{ $setting->company_name }} Details</h5>
                </div>
                <div class="ibox-content">
                    <div>
                        <p>{!! $setting->company_details !!}</p>
                        <button class="btn btn-primary btn-block m"><i class="fa fa-arrow-down"></i> Show More</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection



