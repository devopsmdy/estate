@extends('layout.master')

@section('content')

<div class="row mb-3 small">
    <div class="col-lg-6 bg-primary rounded"><span>Address : {{$estate->address}}</span></div>
    <div class="col-lg-6 bg-secondary rounded"><span>Road : {{$estate->road}}</span></div>
    <div class="col-lg-3 bg-success rounded"><span>Area : {{$estate->area}}</span></div>
    <div class="col-lg-3 bg-warning rounded"><span>Type : {{$type_name[0]}}</span></div>
    <div class="col-lg-3 bg-info rounded"><span>Township : {{$township_name[0]}}</span></div>
    <div class="col-lg-3 bg-white rounded"><span>Price : {{$estate->price}}</span></div>
    <div class="col-lg-9 bg-secondary rounded"><span>Note : {{$estate->note}}</span></div>
    <div class="col-lg-3 bg-primary rounded"><span>Deal : {{$estate->deal}}</span></div>
</div>
<div class="row">
    @foreach($pictures as $picture)
    <div class="col-lg-12 img-thumbnail border-info mb-3 mx-auto">
    <div><a href="/pictures/{{$estate->id}}/delete" class="float-right btn btn-danger rounded-circle" onclick="confirm('delete?');">X</a></div>
        <img src="https://assets.arzheng.xyz/estate_pictures/{{ $picture }}" class="img-fluid">
    </div>
    @endforeach
</div>


@endsection
