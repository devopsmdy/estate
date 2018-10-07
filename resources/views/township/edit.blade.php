@extends('layout.master')

@section('content')
<div class="container border rounded p-3 mb-3">
	<h3>Edit Township</h3><hr />
	<form method="POST" action="/township/update">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="type">Choose Township to edit</label>
			<select class="form-control" id="township" name="township">
				@foreach($townships as $township)
				<option value="{{ $township->id }}">{{$township->name}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="editedTownship">Edit to</label>
			<input type="text" class="form-control" id="editedTownship" placeholder="Your new Township" name="name" required="">
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