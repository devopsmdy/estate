@extends('layout.master')

@section('content')
@if($errors->any())
<div class="container">
    @include('layout.errors')
</div>
<hr />
@endif
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
    <div class="col-lg-12 border-info mb-3">
        <img src="https://assets.arzheng.com/estate_pictures/{{ $picture }}" class="img-fluid img-thumbnail mx-auto d-block">
    </div>
    @endforeach
</div>
<form action="/pictures" method="POST" class="row" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="col-lg-7"><input type="file" name="picture[]" class="float-right pt-2" required multiple></div>
    <input type="hidden" name="estate_id" value="{{$estate->id}}">
    <div class="col-lg-5"><button type="submit" class="float-left btn btn-success">Add</button></div>
</form>
@endsection
