<h3>
	List of Real Estate Type
	<a href="/type/edit" class="btn btn-warning">Edit</a>
</h3><hr />
<ul class="list-group">
	@foreach($types as $type)
		<li class="list-group-item">
			{{ $type->name }}
			{{-- <a href="/type/edit?id={{ $type->id  }}" class="btn btn-warning float-right">Edit</a> --}}
		</li>
	@endforeach
</ul>