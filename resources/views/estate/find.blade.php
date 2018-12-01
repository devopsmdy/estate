@extends('layout.master')

@section('content')
<h4>Search results for</h4>
<div class="alert alert-primary">
    <ul>
        Townships:
        @if(isset($townships))
        @foreach($townships as $township)
        <span class="text-danger">{{ $township->name.", " }}</span>
        @endforeach
        @endif
    </ul>
    <ul>
        Types:
        @if(isset($types))
        @foreach($types as $type)
        <span class="text-danger">{{ $type->name.", " }}</span>
        @endforeach
        @endif
    </ul>
    <ul>
        Price: From <span class="text-danger">{{ $min_price }}</span> To <span class="text-danger">{{ $max_price }}</span>
    </ul>
    <ul>
        Deals:
        @if(isset($deals))
        @foreach($deals as $deal)
        <span class="text-danger">{{ $deal.", " }}</span>
        @endforeach
        @endif
    </ul>
</div>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Address</th>
                <th scope="col">Road</th>
                <th scope="col">Area</th>
                <th scope="col">Type</th>
                <th scope="col">Township</th>
                <th scope="col">Price</th>
                <th scope="col">Note</th>
                <th scope="col">Deal</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1 ?>
            @foreach($estates as $estate)
            <?php
				if($estate->status == 1 ) { 
					$color="bg-success"; 
				} else { 
					$color="bg-secondary"; 
				}
			?>
            <tr class={{$color}}>
                <th scope="row"><a href="/estate/{{ $estate->id }}/edit" class="text-dark" style="text-decoration: none">{{$i
                        }}</a></th>
                <td>{{$estate->address}}</td>
                <td>{{$estate->road}}</td>
                <td>{{$estate->area}}</td>
                <td>{{$estate->type->name}}</td>
                <td>{{$estate->township->name}}</td>
                <td>{{$estate->price}}</td>
                <td>{{$estate->note}}</td>
                <td>{{$estate->deal}}</td>
            </tr>
            <?php $i++ ?>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
