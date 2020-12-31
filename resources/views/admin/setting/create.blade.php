@extends('admin.layouts.layout')

@section('css')
<link href="{{ asset('public/backend/css/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h3 class="font-weight-bold mt-3">Edit Setting</h3>
    </div>
</div>
<div class="wrapper wrapper-content container">
	@if(!$setting)
	<form action="{{ route('store.setting') }}" method="POST" enctype="multipart/form-data">
		@csrf
		@if($errors->any())
			@foreach($errors->all() as $error)
				<span class="text-danger">{{ $error }}</span>
			@endforeach
		@endif
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Company Name</label>
					<input type="text" class="form-control" name="company_name" placeholder="enter company name">
				</div>
				<div class="form-group">
					<label>Company Email</label>
					<input type="text" class="form-control" name="company_email" placeholder="enter company email">
				</div>
				<div class="form-group">
					<label>Company Country</label>
					<input type="text" class="form-control" name="company_country" placeholder="enter company country">
				</div>
				<div class="form-group">
					<label>Company Address</label>
					<textarea class="form-control" name="company_address"></textarea>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Company Phone</label>
					<input type="tel" class="form-control" name="company_phone" placeholder="enter company phone">
				</div>
				<div class="form-group">
					<label>Company City</label>
					<input type="text" class="form-control" name="company_city" placeholder="enter company city">
				</div>
				<div class="form-group">
					<label>Zip Code</label>
					<input type="text" class="form-control" name="company_zipcode" placeholder="enter company zipcode">
				</div>
				<div class="form-group">
					<label>Company Photo</label>
					<div class="row">
						<div class="col-md-6">
							<input type="file" id="file" onchange="photoChange(this)" class="form-control mt-3" name="company_logo">
						</div>
						<div class="col-md-6">
							<img src="" id="photo">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label>Company Details</label>
					<textarea class="form-control" name="company_details"></textarea>
				</div>
				<button type="submit" class="btn btn-primary btn-block col-md-12">Insert Company Information</button>
			</div>
		</div>
	</form>

	@else

	<form action="{{ route('update.setting') }}" method="POST" enctype="multipart/form-data">
		@csrf
		@if($errors->any())
			@foreach($errors->all() as $error)
				<span class="text-danger">{{ $error }}</span>
			@endforeach
		@endif
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Company Name</label>
					<input type="text" class="form-control" name="company_name" value="{{ $setting->company_name }}" placeholder="enter company name">
				</div>
				<div class="form-group">
					<label>Company Email</label>
					<input type="text" class="form-control" name="company_email" value="{{ $setting->company_email }}" placeholder="enter company email">
				</div>
				<div class="form-group">
					<label>Company Country</label>
					<input type="text" class="form-control" name="company_country" value="{{ $setting->company_country }}" placeholder="enter company country">
				</div>
				<div class="form-group">
					<label>Company Address</label>
					<textarea class="form-control" name="company_address">{{ $setting->company_address }}</textarea>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Company Phone</label>
					<input type="tel" class="form-control" name="company_phone" value="{{ $setting->company_phone }}" placeholder="enter company phone">
				</div>
				<div class="form-group">
					<label>Company City</label>
					<input type="text" class="form-control" name="company_city" value="{{ $setting->company_city }}" placeholder="enter company city">
				</div>
				<div class="form-group">
					<label>Post Code</label>
					<input type="text" class="form-control" name="company_zipcode" value="{{ $setting->company_zipcode }}" placeholder="enter company zipcode">
				</div>
				<div class="form-group">
					<label>Company Photo</label>
					<div class="row">
						<div class="col-md-6">
							<input type="file" id="file" onchange="photoChange(this)" class="form-control mt-3" name="company_logo">
						</div>
						<div class="col-md-6">
							<img src="{{ asset('storage/app/public/'.$setting->company_logo) }}" id="photo" style="height: 80px; width: 70px;" class="img-thumbnail">
							<input type="hidden" name="oldlogo" value="{{ $setting->company_logo }}">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label>Company Details</label>
					<textarea class="summernote" name="company_details"> {{ $setting->company_details }}</textarea>
				</div>
				<button type="submit" class="btn btn-info btn-block col-md-12">Update Company Information</button>
			</div>
		</div>
	</form>

	@endif
</div>

<script>
	function photoChange(input) {
      	if (input.files && input.files[0]) {
          	var reader = new FileReader();
          	reader.onload = function (e) {
              	$('#photo')
              	.attr('src', e.target.result)
			  	.attr("class","img-thumbnail")
			  	.attr("height",'80px')
			  	.attr("width",'70px')
          	};
          	reader.readAsDataURL(input.files[0]);
     	}
    }
</script>
@endsection

@section('js')
<!-- SUMMERNOTE -->
<script src="{{ asset('public/backend/js/plugins/summernote/summernote-bs4.js') }}"></script>
<script>
$(document).ready(function(){

    $('.summernote').summernote();

});
</script>
@endsection

