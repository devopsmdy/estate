@extends('layout.master')

@section('content')

<div class="row">
    <div class="col-lg-3"><span>Address : {{$estate->address}}</span></div>
    <div class="col-lg-3"><span>Road : {{$estate->road}}</span></div>
    <div class="col-lg-3"><span>Area : {{$estate->area}}</span></div>
    <div class="col-lg-3"><span>Type : {{$type_name[0]}}</span></div>
    <div class="col-lg-3"><span>Township : {{$township_name[0]}}</span></div>
    <div class="col-lg-3"><span>Price : {{$estate->price}}</span></div>
    <div class="col-lg-3"><span>Note : {{$estate->note}}</span></div>
    <div class="col-lg-3"><span>Deal : {{$estate->deal}}</span></div>
    @foreach($pictures as $picture)
    <div class="col-lg-12 img-thumbnail border-info mb-3">
    <img src="{{ asset('storage/pictures') }}/{{ $picture }}" class="img-fluid">
    </div>
    @endforeach
</div>


@endsection