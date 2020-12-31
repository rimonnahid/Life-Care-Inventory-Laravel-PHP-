@extends('admin.layouts.layout')

@section('css')

@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2 class="font-weight-bold">{{ $supplier->name }}'s Profile</h2>
    </div>
</div>
<div class="wrapper wrapper-content">
	<div class="row animated fadeInRight">
        <div class="col-md-4">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Profile Details</h5>
                </div>
                <div>
                    <div class="ibox-content no-padding border-left-right">
                        <img alt="image" class="img-fluid" src="{{ asset('storage/app/public/'.$supplier->photo) }}">
                    </div>
                    <div class="ibox-content profile-content">
                        <h4><strong>{{ $supplier->name }}</strong></h4>
                        <p><i class="fa fa-map-marker"></i> {{ $supplier->city }} <span class="float-right">joined:{{ $supplier->created_at->diffForHumans() }}</span></p>
                        <p><i class="fa fa-map-marker"></i> Phone: <span class="float-right">{{ $supplier->phone }}</span></p>
                        <p><i class="fa fa-map-marker"></i> type: <span class="float-right">{{ $supplier->type }}</span></p>
                        <p><i class="fa fa-map-marker"></i> Email: <span class="float-right">{{ $supplier->email }}</span></p>
                        <p><i class="fa fa-map-marker"></i> Bank Name: <span class="float-right">{{ $supplier->bank_name }}</span></p>
                        <p><i class="fa fa-map-marker"></i> Account Number: <span class="float-right">{{ $supplier->account_number }}</span></p>

                        <h5>
                            Address
                        </h5>
                        <p>
                            {{ $supplier->address }}
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
                    <h5>Experience or CV</h5>
                </div>
                <div class="ibox-content">
                    <div>
                        <p>{!! $supplier->experience !!}</p>
                        <button class="btn btn-primary btn-block m"><i class="fa fa-arrow-down"></i> Show More</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')
<script>
    

</script>
@endsection

