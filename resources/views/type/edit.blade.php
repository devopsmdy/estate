@extends('layout.master')

@section('content')
<div class="container border rounded p-3 mb-3">
	<h3>Edit Types</h3><hr />
	<form method="POST" action="/type/update">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="type">Choose Type to edit</label>
			<select class="form-control" id="type" name="type">
				@foreach($types as $type)
				<option value="{{ $type->id }}">{{$type->name}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="editedType">Edit to</label>
			<input type="text" class="form-control" id="editedType" placeholder="Your new type" name="editedType" required="">
		</div>
		<button type="submit" class="btn btn-success">Edit</button>
	</form>
</div>

@if($errors->any())
<div class="container p-3 mb-3">
	@include('layout.errors')
</div>
@endif

{{-- <div class="container p-3">
	@include('layout.type.typeList')
</div> --}}



@endsection