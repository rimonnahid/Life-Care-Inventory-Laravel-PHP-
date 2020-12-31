@extends('admin.layouts.layout')

@section('css')
<link href="{{ asset('public/backend/css/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2 class="font-weight-bold">New Product Store Form <a href="{{ route('products') }}" class="btn btn-sm btn-primary float-right">All Product</a></h2>
    </div>
</div>
<div class="wrapper wrapper-content container">
	<form action="{{ route('update.product',$product->id) }}" method="POST" enctype="multipart/form-data">
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
					<input type="text" class="form-control" value="{{ old('name') }}{{ $product->name }}" name="name" placeholder="enter product name" required="">
				</div>
				<div class="form-group">
					<label>PV</label>
					<input type="text" class="form-control" value="{{ old('pv') }}{{ $product->pv }}" name="pv" placeholder="enter product pv">
				</div>
				<div class="form-group">
					<label>Buying Price</label>
					<input type="text" class="form-control" value="{{ old('buy_price') }}{{ $product->buy_price }}" name="buy_price" placeholder="enter buying price" required="">
				</div>
				{{-- <div class="form-group">
					<label>Buying Date</label>
					<input type="date" class="form-control" value="{{ old('buy_date') }}" name="buy_date" placeholder="enter buying date">
				</div> --}}
			</div>
			<div class="col-md-6">
						
			<div class="form-group">
				<label>Product Size</label>
				<input type="text" class="form-control" value="{{ old('buy_date') }}{{ $product->size }}" name="size" placeholder="enter product size">
			</div>
						
			<div class="form-group">
				<label>Product Quantity</label>
				<input type="text" class="form-control" value="{{ $product->quantity }}" name="quantity" placeholder="enter product quantity" required="">
			</div>
			<div class="form-group">
				<label>Selling Price</label>
				<input type="text" class="form-control" value="{{ old('selling_price') }}{{ $product->selling_price }}" name="selling_price" placeholder="enter selling price" required="">
			</div>
			{{-- 		<div class="col-md-8">
								
						<div class="form-group">
							<label>Supplier Name</label>
							<select class="form-control" name="supplier_id">
								<option selected="" disabled="">select supplier</option>
							@foreach($suppliers as $supplier)
								<option value="{{ old('supplier_id') }}{{ $supplier->id }}" <?php if($supplier->id == $product->supplier_id) { ?> selected="" <?php } ?>>{{ $supplier->name }}</option>
							@endforeach
							</select>
						</div>
					</div> --}}
					

				{{-- <div class="form-group">
					<label>Expire Date</label>
					<input type="date" class="form-control" value="{{ old('expire_date') }}" name="expire_date" placeholder="enter employee expire date">
				</div> --}}
			</div>
		</div>
		<div class="row">
			{{-- <div class="col-md-4 form-group">
				<label>Gudown (Garage)</label>
				<input type="text" class="form-control" value="{{ old('garage') }}" name="garage" placeholder="enter gudown/garage name">
			</div>
			<div class="col-md-4 form-group">
				<label>Gudawn Route (Garage Route)</label>
				<input type="text" class="form-control" value="{{ old('route') }}" name="route" placeholder="enter route of garage">
			</div> --}}
		</div>
		<div class="row">
			<div class="col-md-12 form-group">
				<label>Product Details</label>
				<textarea class="summernote no-padding" name="details">{{ $product->details }}</textarea>
				<button type="submit" class="btn btn-sm btn-block btn-success mt-3">Update Product Store</button>
			</div>
		</div>
{{-- 		<div class="row">
			<div class="col-md-4 form-group">
				<img src="" id="photo_1">
				<br>
				<label>Image One</label>
				<input class="form-control" type="file" id="file" value="{{ old('photo_1') }}" onchange="photoChange1(this)" name="photo_1">
			</div>
			<div class="col-md-4 form-group">
				<img src="" id="photo_2">
				<br>
				<label>Image Two</label>
				<input class="form-control" type="file" id="file" value="{{ old('photo_2') }}" onchange="photoChange2(this)" name="photo_2">
			</div>
			<div class="col-md-4 form-group">
				<img src="" id="photo_3">
				<br>
				<label>Image Three</label>
				<input class="form-control" type="file" id="file" value="{{ old('photo_3') }}" onchange="photoChange3(this)" name="photo_3">
			</div>
		</div> --}}

	</form>
</div>

<script src="{{ asset('public/backend/js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('public/backend/js/popper.min.js') }}"></script>
<script src="{{ asset('public/backend/js/bootstrap.js') }}"></script>
<script>
	function photoChange1(input) {
      	if (input.files && input.files[0]) {
          	var reader = new FileReader();
          	reader.onload = function (e) {
              	$('#photo_1')
              	.attr('src', e.target.result)
			  	.attr("class","img-thumbnail")
			  	.attr("height",'60px')
			  	.attr("width",'60px')
          	};
          	reader.readAsDataURL(input.files[0]);
     	}
    }
    function photoChange2(input) {
      	if (input.files && input.files[0]) {
          	var reader = new FileReader();
          	reader.onload = function (e) {
              	$('#photo_2')
              	.attr('src', e.target.result)
			  	.attr("class","img-thumbnail")
			  	.attr("height",'60px')
			  	.attr("width",'60px')
          	};
          	reader.readAsDataURL(input.files[0]);
     	}
    }
    function photoChange3(input) {
      	if (input.files && input.files[0]) {
          	var reader = new FileReader();
          	reader.onload = function (e) {
              	$('#photo_3')
              	.attr('src', e.target.result)
			  	.attr("class","img-thumbnail")
			  	.attr("height",'60px')
			  	.attr("width",'60px')
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

