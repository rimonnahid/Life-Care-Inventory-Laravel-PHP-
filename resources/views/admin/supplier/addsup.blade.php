@extends('admin.layouts.layout')

@section('css')

@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2 class="font-weight-bold">Supplier Form</h2>
    </div>
</div>
<div class="wrapper wrapper-content container">
	<form action="{{ route('store.supplier') }}" method="POST" enctype="multipart/form-data">
		@csrf
		@if($errors->any())
			@foreach($errors->all() as $error)
				<span class="text-danger">{{ $error }}</span>
			@endforeach
		@endif
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Name</label>
					<input type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="enter supplier name" required="">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" class="form-control" value="{{ old('email') }}" name="email" placeholder="enter supplier email">
				</div>
				<div class="form-group">
					<label>Bank Name</label>
					<input type="text" class="form-control" value="{{ old('bank_name') }}" name="bank_name" placeholder="enter supplier bank name">
				</div>
				<div class="form-group">
					<label>Account Name</label>
					<input type="text" class="form-control" value="{{ old('account_name') }}" name="account_name" placeholder="enter supplier account name">
				</div>
				<div class="form-group">
					<label>City</label>
					<input type="text" class="form-control" value="{{ old('city') }}" name="city" placeholder="enter supplier city">
				</div>
				<div class="form-group">
					<label>Address</label>
					<textarea class="form-control" value="" name="address" required="">{{ old('address') }}</textarea>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Supplier Type</label>
					<select class="form-control" value="{{ old('type') }}" name="type" required=""> 
						<option value="">select supplier type</option>
						<option value="Distributor">Distributor</option>
						<option value="Whole Seller">Whole Seller</option>
						<option value="Brochure">Brochure</option>
					</select>
				</div>
				<div class="form-group">
					<label>Phone</label>
					<input type="tel" class="form-control" value="{{ old('phone') }}" name="phone" placeholder="enter supplier phone" required="">
				</div>
				<div class="form-group">
					<label>Shopname</label>
					<input type="text" class="form-control" value="{{ old('shopname') }}" name="shopname" placeholder="enter supplier shopname">
				</div>
				<div class="form-group">
					<label>Bank Branch</label>
					<input type="text" class="form-control" value="{{ old('bank_branch') }}" name="bank_branch" placeholder="enter supplier bank branch">
				</div>
				<div class="form-group">
					<label>Account Number</label>
					<input type="text" class="form-control" value="{{ old('account_number') }}" name="account_number" placeholder="enter supplier account number">
				</div>
				<div class="form-group">
					<label>Photo</label>
					<div class="row">
						<div class="col-md-6">
							<input type="file" id="file" onchange="photoChange(this)" class="form-control" value="{{ old('photo') }}" name="photo">
						</div>
						<div class="col-md-6">
							<img src="" id="photo">
						</div>
					</div>
				</div>
			</div>

			<button type="submit" class="btn btn-primary btn-block col-md-12">Join New Supplier</button>

		</div>
	</form>
</div>

<script src="{{ asset('public/backend/js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('public/backend/js/popper.min.js') }}"></script>
<script src="{{ asset('public/backend/js/bootstrap.js') }}"></script>
<script>
	function photoChange(input) {
      	if (input.files && input.files[0]) {
          	var reader = new FileReader();
          	reader.onload = function (e) {
              	$('#photo')
              	.attr('src', e.target.result)
			  	.attr("class","img-thumbnail")
			  	.attr("height",'40px')
			  	.attr("width",'40px')
          	};
          	reader.readAsDataURL(input.files[0]);
     	}
    }
</script>
@endsection

@section('js')

@endsection

