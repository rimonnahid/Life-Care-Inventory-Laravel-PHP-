@extends('admin.layouts.layout')

@section('css')

@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2 class="font-weight-bold">New Expense <a href="{{ route('expenses') }}" class="btn btn-sm btn-success float-right">all expenses</a> <a href="{{ route('year.expenses') }}" class="btn btn-sm btn-secondary float-right mr-1">this year</a> <a href="{{ route('month.expenses') }}" class="btn btn-sm btn-primary float-right mr-1">this month</a> <a href="{{ route('today.expenses') }}" class="btn btn-sm btn-danger float-right mr-1">today</a></h2>
    </div>
</div>
<div class="wrapper wrapper-content container">
	<form action="{{ route('store.expense') }}" method="POST">
		@csrf
		@if($errors->any())
			@foreach($errors->all() as $error)
				<span class="text-danger">{{ $error }}</span>
			@endforeach
		@endif
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Expense Details</label>
					<textarea class="form-control" name="details" style="height: 109px;">{{ old('details') }}</textarea>
				</div>
				<div class="form-group">
					<label>Amount</label>
					<input type="text" class="form-control" value="{{ old('amount') }}" name="amount" placeholder="enter expense amount">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Date</label>
					<select class="form-control" name="date">
						<option value="{{ date('d-m-Y') }}" selected="">{{ date('d-m-Y') }}</option>
					</select>
				</div>
				<div class="form-group">
					<label>Month</label>
					<select class="form-control" name="month">
						<option value="{{ date('F') }}" selected="">{{ date('F') }}</option>
					</select>
				</div>
				<div class="form-group">
					<label>Year</label>
					<select class="form-control" name="year">
						<option value="{{ date('Y') }}" selected="">{{ date('Y') }}</option>
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-sm btn-block btn-success">Insert Expense</button>
			</div>
		</div>
	</form>
</div>

@endsection


