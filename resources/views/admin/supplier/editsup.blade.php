@extends('admin.layouts.layout')

@section('css')

@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2 class="font-weight-bold">Customer Form</h2>
    </div>
</div>
<div class="wrapper wrapper-content container">
	<form action="{{ route('update.supplier',$supplier->id) }}" method="POST" enctype="multipart/form-data">
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
					<input type="text" class="form-control" value="{{ $supplier->name }}" name="name" placeholder="enter customer name">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" class="form-control" value="{{ $supplier->email }}" name="email" placeholder="enter customer email">
				</div>
				<div class="form-group">
					<label>Bank Name</label>
					<input type="text" class="form-control" value="{{ $supplier->bank_name }}" name="bank_name" placeholder="enter customer bank name">
				</div>
				<div class="form-group">
					<label>Account Name</label>
					<input type="text" class="form-control" value="{{ $supplier->account_name }}" name="account_name" placeholder="enter customer account name">
				</div>
				<div class="form-group">
					<label>City</label>
					<input type="text" class="form-control" value="{{ $supplier->city }}" name="city" placeholder="enter customer city">
				</div>
				<div class="form-group">
					<label>Address</label>
					<textarea class="form-control" name="address">{{ $supplier->address }}</textarea>
				</div>
				<button type="submit" class="btn btn-primary btn-block col-md-12">Update Supplier Information</button>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Supplier Type</label>
					<select class="form-control" name="type" required=""> 
						<option value="{{ $supplier->type }}" selected="">{{ $supplier->type }}</option>
						<option value="">select supplier type</option>
						<option value="Distributor">Distributor</option>
						<option value="Whole Seller">Whole Seller</option>
						<option value="Brochure">Brochure</option>
					</select>
				</div>
				<div class="form-group">
					<label>Phone</label>
					<input type="tel" class="form-control" value="{{ $supplier->phone }}" name="phone" placeholder="enter customer phone">
				</div>
				<div class="form-group">
					<label>Shopname</label>
					<input type="text" class="form-control" value="{{ $supplier->shopname }}" name="shopname" placeholder="enter customer shopname">
				</div>
				<div class="form-group">
					<label>Bank Branch</label>
					<input type="text" class="form-control" value="{{ $supplier->bank_branch }}" name="bank_branch" placeholder="enter customer bank branch">
				</div>
				<div class="form-group">
					<label>Account Number</label>
					<input type="text" class="form-control" value="{{ $supplier->account_number }}" name="account_number" placeholder="enter customer account number">
				</div>
				<div class="form-group">
					<label>Photo</label>
					<div class="row">
						<div class="col-md-6">
							<input type="file" id="file" onchange="photoChange(this)" class="form-control" name="photo">
						</div>
						<div class="col-md-6">
							<img class="img-thumbnail" src="{{ asset('storage/app/public/'.$supplier->photo) }}" style="height: 40px; width: 40px;" id="photo">
						</div>
					</div>
				</div>
				<input type="hidden" name="oldphoto" value="{{ $supplier->photo }}">
				<button type="submit" class="btn btn-danger btn-block col-md-12 mt-5">Clear All Data</button>
			</div>

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

