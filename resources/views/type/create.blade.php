@extends('layout.master')

@section('content')
<div class="container border rounded p-3 mb-3">
	<h3>New Real Estate Type</h3><hr />
	<form method="POST" action="/type">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="type">Type</label>
			<input type="text" class="form-control" id="type" placeholder="Type" name="name">
		</div>
		<button type="submit" class="btn btn-success">Add</button>
	</form>
</div>

@if($errors->any())
<div class="container p-3 mb-3">
	@include('layout.errors')
</div>
@endif

<div class="container p-3">
	@include('layout.type.typeList')
</div>



@endsection