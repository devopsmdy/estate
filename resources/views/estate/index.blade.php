@extends('layout.master')

@section('content')
<div class="row">
    <div class="col-12 rounded">

        <?php $i=1 ?>
        @foreach($estates as $estate)
        <?php
            if($estate->status == 1 ) { 
                $color="bg-light"; 
            } else { 
                $color="bg-secondary"; 
            }
        ?>

        <!-- Card -->
        <div class="card col-12 {{$color}} mb-3">
            <div class="card-body">
                <h5 class="card-title">Address: {{$estate->address}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Road: {{$estate->road}}</h6>
                <p class="card-text">Area: {{$estate->area}}</p>
                <p class="card-text">Type: {{$estate->type->name}}</p>
                <p class="card-text">Township: {{$estate->township->name}}</p>
                <p class="card-text">Price: {{$estate->price}}</p>
                <p class="card-text">Note: {{$estate->note}}</p>
                <p class="card-text">Deal: {{$estate->deal}}</p>
            </div>
            <div class="card-footer">
                <a href="/estate/{{ $estate->id }}/edit" class="card-link">Edit</a>
                <a href="/estate/{{ $estate->id }}/show" class="card-link float-right">More</a>
            </div>
        </div>
        <?php $i++ ?>
        @endforeach
    </div>
</div>
@endsection
