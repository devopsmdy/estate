@extends('layout.master')

@section('content')
@if($errors->any())
<div class="container">
    @include('layout.errors')
</div>
<hr />
@endif
<h1>Edit Real Estate</h1>
<hr />
<form method="POST" action="/estate/{{$estate->id}}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">
    <!-- Township -->
    <div class="form-group">
        <select class="form-control" id="township" name="township_id">
            //the original value
            <option value="{{ $estate->township_id }}">{{ $township_name[0] }}</option>
            @foreach($townships as $township)
            <option value="{{ $township->id }}">{{ $township->name }}</option>
            @endforeach
        </select>
    </div>
    <!-- Deal -->
    <div class="form-group border rounded p-3">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="deal" id="deal1" value="rent" {{$rent}}>
            <label class="form-check-label" for="deal1">
                Rent
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="deal" id="deal2" value="sale" {{$sale}}>
            <label class="form-check-label" for="deal2">
                Sale
            </label>
        </div>
    </div>


    <!-- Road -->
    <div class="form-group">
        <label for="road">Road</label>
        <input type="text" class="form-control" id="road" placeholder="Road" name="road" value="{{ $estate->road }}">
    </div>

    <!-- Address -->
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="address" placeholder="Address" name="address" value="{{ $estate->address }}">
    </div>

    <!-- Area -->
    <div class="form-group">
        <label for="area">Area</label>
        <input type="text" class="form-control" id="area" placeholder="Area" name="area" value="{{ $estate->area }}">
    </div>

    <!-- type -->
    <div class="form-group">
        <select class="form-control" id="type" name="type_id">
            <option value="{{ $estate->type_id }}">{{ $type_name[0] }}</option>
            @foreach($types as $type)
            <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Price -->
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" id="price" placeholder="Price" name="price" value="{{ $estate->price }}">
    </div>

    <!-- Note -->
    <div class="form-group">
        <label for="note">Note</label>
        <textarea class="form-control" id="note" rows="3" name="note" placeholder="Note">{{ $estate->note }}</textarea>
    </div>

    <!-- Available -->
    <div class="form-group border rounded p-3">

        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="status1" value="1" {{$available}}>
            <label class="form-check-label" for="status1">
                Available
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="status2" value="0" {{$not_available}}>
            <label class="form-check-label" for="status2">
                Not Available
            </label>
        </div>
    </div>
    {{-- Picture --}}
    <div class="form-group border rounded p-3">
        <a href="/pictures/{{$estate->id}}/edit">Edit Pictures</a>
    </div>
    <button type="submit" class="btn btn-success">Save</button>
</form>

@endsection
