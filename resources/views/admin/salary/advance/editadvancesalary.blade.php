@extends('admin.layouts.layout')


@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2 class="font-weight-bold">Edit Advance Salary Form <a href="{{ route('advancesalary') }}" class="btn btn-sm btn-primary float-right">All AdvanceSalary</a></h2>
    </div>
</div>
<div class="wrapper wrapper-content container">
	<form action="{{ route('update.advancesalary',$advancesalary->id) }}" method="POST" enctype="multipart/form-data">
		@csrf
		@if($errors->any())
			@foreach($errors->all() as $error)
				<span class="text-danger">{{ $error }}</span>
			@endforeach
		@endif
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Employee</label>
					<select class="form-control" name="emp_id" required=""> 
							<option value="{{ $advancesalary->Employee->id }}">{{ $advancesalary->Employee->name }}</option>
					</select>
				</div>
				<div class="form-group">
					<label>Salary</label>
					<input type="text" name="salary" class="form-control" value="{{ $advancesalary->salary }}" placeholder="how much you pay?">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Month</label>
					<select class="form-control" name="month" required=""> 
							<option value="{{ $advancesalary->month }}" selected="">{{ $advancesalary->month }}</option>
							<option value="January">January</option>
							<option value="February">February</option>
							<option value="March">March</option>
							<option value="April">April</option>
							<option value="May">May</option>
							<option value="June">June</option>
							<option value="July">July</option>
							<option value="August">August</option>
							<option value="September">September</option>
							<option value="October">October</option>
							<option value="November">November</option>
							<option value="December">December</option>
					</select>
				</div>
				<div class="form-group">
					<label>Year</label>
					<select class="form-control" name="year" required=""> 
						<option value="{{ $advancesalary->year }}" selected="">{{ $advancesalary->year }}</option>
						<option value="2018">2018</option>
						<option value="2019">2019</option>
						<option value="2020">2020</option>
						<option value="2021">2021</option>
						<option value="2022">2022</option>
					</select>
				</div>
			</div>
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary btn-block col-md-12">Update AdvancePay Salary</button>
			</div>
		</div>
	</form>
</div>

@endsection
