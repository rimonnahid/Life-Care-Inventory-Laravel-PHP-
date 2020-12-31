@extends('admin.layouts.layout')

@section('css')
<link href="{{ asset('public/backend/css/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h3 class="font-weight-bold mt-3">New Product Store Form <a href="{{ route('products') }}" class="btn btn-sm btn-primary float-right">All Product</a></h3>
    </div>
</div>
<div class="wrapper wrapper-content container">
	<form action="{{ route('store.product') }}" method="POST" enctype="multipart/form-data">
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
					<input type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="enter product name" required="">
				</div>
				<div class="form-group">
					<label>PV</label>
					<input type="text" class="form-control" value="{{ old('pv') }}" name="pv" placeholder="enter product pv">
				</div>
				<div class="form-group">
					<label>Buying Price</label>
					<input type="text" class="form-control" value="{{ old('buy_price') }}" name="buy_price" placeholder="enter buying price" required="">
				</div>
				{{-- <div class="form-group">
					<label>Buying Date</label>
					<input type="date" class="form-control" value="{{ old('buy_date') }}" name="buy_date" placeholder="enter buying date">
				</div> --}}
			</div>
			<div class="col-md-6">
						
				<div class="form-group">
					<label>Product Size</label>
					<input type="text" class="form-control" value="{{ old('buy_date') }}" name="size" placeholder="enter product size">
				</div>

				<div class=" form-group">
					<label>Product Quantity</label>
					<input type="text" class="form-control" name="quantity" placeholder="enter product quantity" required="">
				</div>
				<div class="form-group">
					<label>Selling Price</label>
					<input type="text" class="form-control" value="{{ old('selling_price') }}" name="selling_price" placeholder="enter selling price" required="">
				</div>
			{{-- 		<div class="col-md-8">
								
						<div class="form-group">
							<label>Supplier Name</label>
							<select class="form-control" name="supplier_id" value="supplier_id">
								<option selected="" disabled="">select supplier</option>
							@foreach($suppliers as $supplier)
								<option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
							@endforeach
							</select>
						</div>
					</div> --}}
{{-- 
				<div class="form-group">
					<label>Product Category</label>
					<select class="form-control" name="category_id" value="{{ old('category_id') }}" required="">
						<option selected="" disabled="">select product category</option>
					@foreach($categories as $category)
						<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
					</select>
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
		<div class="row">
			<div class="col-md-12 form-group">
				<label>Product Details</label>
				<textarea class="summernote no-padding" name="details"></textarea>
				<button type="submit" class="btn btn-sm btn-block btn-success mt-3">New Product Store</button>
			</div>
		</div>
	</form>
</div>

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

