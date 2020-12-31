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
	<form action="{{ route('update.customer',$customer->id) }}" method="POST" enctype="multipart/form-data">
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
					<input type="text" class="form-control" value="{{ old('name') }}{{ $customer->name }}"  name="name" placeholder="enter customer name" required="">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" class="form-control" value="{{ old('name') }}{{ $customer->email }}" name="email" placeholder="enter customer email">
				</div>
				{{-- <div class="form-group">
					<label>Bank Name</label>
					<input type="text" class="form-control" value="{{ old('bank_name') }}" name="bank_name" placeholder="enter customer bank name">
				</div>
				<div class="form-group">
					<label>Account Name</label>
					<input type="text" class="form-control" value="{{ old('account_name') }}" name="account_name" placeholder="enter customer account name">
				</div>
				<div class="form-group">
					<label>City</label>
					<input type="text" class="form-control" value="{{ old('city') }}" name="city" placeholder="enter customer city">
				</div> --}}
				<div class="form-group">
					<label>Address</label>
					<textarea class="form-control" name="address">{{ old('address') }}{{ $customer->address }}</textarea>
				</div>
			</div>
			<div class="col-md-6">

				<div class="form-group">
					<label>Customer ID : </label>
					<input type="tel" class="form-control" name="cus_id" value="{{ old('cus_id') }}{{ $customer->cus_id }}" placeholder="enter customer id" required="">
				</div>
				<div class="form-group">
					<label>Gender</label>
					<select class="form-control" name="gender" required=""> 
						<option value="">select gender</option>
						<option value="Male" @if($customer->gender == 'Male') selected @endif>Male</option>
						<option value="Female" @if($customer->gender == 'Female') selected @endif>Female</option>
					</select>
				</div>
				<div class="form-group">
					<label>Phone</label>
					<input type="tel" class="form-control" value="{{ old('phone') }}{{ $customer->phone }}" name="phone" placeholder="enter customer phone" required="">
				</div>
			{{-- 	<div class="form-group">
					<label>Shopname</label>
					<input type="text" class="form-control" value="{{ old('shopname') }}" name="shopname" placeholder="enter customer shopname">
				</div>
				<div class="form-group">
					<label>Bank Branch</label>
					<input type="text" class="form-control" value="{{ old('bank_branch') }}" name="bank_branch" placeholder="enter customer bank branch">
				</div>
				<div class="form-group">
					<label>Account Number</label>
					<input type="text" class="form-control" value="{{ old('account_number') }}" name="account_number" placeholder="enter customer account number">
				</div>
				<div class="form-group">
					<label>Photo</label>
					<div class="row">
						<div class="col-md-6">
							<input type="file" id="file" value="{{ old('photo') }}" onchange="photoChange(this)" class="form-control" name="photo">
						</div>
						<div class="col-md-6">
							<img src="" id="photo">
						</div>
					</div>
				</div> --}}
			</div>
			<button type="submit" class="btn btn-primary btn-block col-md-12">Update Customer Information</button>
		</div>
	</form>
</div>

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

