@extends('admin.layouts.layout')

@section('css')
<link href="{{ asset('public/backend/css/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2 class="font-weight-bold">Employee Form</h2>
    </div>
</div>
<div class="wrapper wrapper-content container">
	<form action="{{ route('update.employee',$employee->id) }}" method="POST" enctype="multipart/form-data">
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
					<input type="text" class="form-control" value="{{ $employee->name }}" name="name" placeholder="enter employee name">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" class="form-control" value="{{ $employee->email }}" name="email" placeholder="enter employee email">
				</div>
				<div class="form-group">
					<label>Salary</label>
					<input type="text" class="form-control" value="{{ $employee->salary }}" name="salary" placeholder="enter employee sallery">
				</div>
				<div class="form-group">
					<label>City</label>
					<input type="text" class="form-control" value="{{ $employee->city }}" name="city" placeholder="enter employee city">
				</div>
				<div class="form-group">
					<label>Address</label>
					<textarea class="form-control" name="address">{{ $employee->address }}</textarea>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Phone</label>
					<input type="tel" class="form-control" value="{{ $employee->phone }}" name="phone" placeholder="enter employee phone">
				</div>
				<div class="form-group">
					<label>NID Number</label>
					<input type="text" class="form-control" value="{{ $employee->nid_no }}" name="nid_no" placeholder="enter employee nid number">
				</div>
				<div class="form-group">
					<label>Vacation</label>
					<input type="text" class="form-control" value="{{ $employee->vacation }}" name="vacation" placeholder="enter employee total vacations">
				</div>
				<div class="form-group">
					<label>Photo</label>
					<div class="row">
						<div class="col-md-6">
							<input type="file" id="file" onchange="photoChange(this)" class="form-control" name="photo">
						</div>
						<div class="col-md-6">
							<img src="{{ asset('storage/app/public/'.$employee->photo) }}" style="height: 40px; width: 40px;" id="photo">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Experience</label>
					<textarea class="form-control summernote" name="experience">{!! $employee->experience !!}</textarea>
				</div>
				<input type="hidden" name="oldphoto" value="{{ $employee->photo }}">
			</div>
			
			<button type="submit" class="btn btn-primary btn-block col-md-12">Update Employee</button>
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
<!-- SUMMERNOTE -->
<script src="{{ asset('public/backend/js/plugins/summernote/summernote-bs4.js') }}"></script>
<script>
$(document).ready(function(){

    $('.summernote').summernote();

});
</script>
@endsection

