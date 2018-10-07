<h3>List of Township <a href="/township/edit" class="btn btn-warning">Edit</a> </h3><hr />
<ul class="list-group">
	@foreach($townships as $township)
		<li class="list-group-item">{{ $township->name }}</li>
	@endforeach
</ul>