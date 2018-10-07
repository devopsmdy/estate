@extends('layout.master')

@section('content')
@if($errors->any())
<div class="container">
	@include('layout.errors')
</div>
<hr />
@endif
<h1>New Real Estate</h1><hr />
<form method="POST" action="/estate">
	{{ csrf_field() }}
	<div class="form-group">
		<label for="township"><a href="/township/create" style="text-decoration: none">Township</a></label>
		<select class="form-control" id="township" name="township_id">
			@foreach($townships as $township)
			<option value="{{ $township->id }}">{{ $township->name }}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group border rounded p-3">
		<div class="form-check">
			<input class="form-check-input" type="radio" name="deal" id="deal1" value="rent" checked>
			<label class="form-check-label" for="deal1">
				Rent
			</label>
		</div>
		<div class="form-check">
			<input class="form-check-input" type="radio" name="deal" id="deal2" value="sale">
			<label class="form-check-label" for="deal2">
				Sale
			</label>
		</div>
	</div>
	<div class="form-group">
		<label for="road">Road</label>
		<input type="text" class="form-control" id="road" placeholder="Road" name="road">
	</div>

	<div class="form-group">
		<label for="address">Address</label>
		<input type="text" class="form-control" id="address" placeholder="Address" name="address">
	</div>

	<div class="form-group">
		<label for="area">Area</label>
		<input type="text" class="form-control" id="area" placeholder="Area" name="area">
	</div>

	<div class="form-group">
		<label for="type"><a href="/type/create" style="text-decoration: none">Type</a></label>
		<select class="form-control" id="type" name="type_id">
			@foreach($types as $type)
			<option value="{{ $type->id }}">{{ $type->name }}</option>
			@endforeach
		</select>
	</div>
	
	<div class="form-group">
		<label for="price">Price</label>
		<input type="number" class="form-control" id="price" placeholder="Price" name="price">
	</div>
	<div class="form-group">
		<label for="note">Note</label>
		<textarea class="form-control" id="note" rows="3" name="note" placeholder="Note"></textarea>
	</div>
	<div class="form-group border rounded p-3">
		<div class="form-check">
			<input class="form-check-input" type="radio" name="status" id="status1" value="1" checked>
			<label class="form-check-label" for="status1">
				Available
			</label>
		</div>
		<div class="form-check">
			<input class="form-check-input" type="radio" name="status" id="status2" value="0">
			<label class="form-check-label" for="status2">
				Not Available
			</label>
		</div>
	</div>
	<button type="submit" class="btn btn-success">Add</button>
</form>

@endsection