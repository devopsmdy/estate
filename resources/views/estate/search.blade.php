@extends('layout.master')

@section('content')
<form class="row" method="POST" action="/estate/search">
    {{ csrf_field() }}
    <div class="form-group border rounded p-3 col-sm-4">
        <h4>Township</h4>
        @foreach($townships as $township)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="{{$township->id}}" id="township{{$township->id}}"
                name="township[]">
            <label class="form-check-label" for="township">
                {{$township->name}}
            </label>
        </div>
        @endforeach
    </div>
    <div class="form-group border rounded p-3 col-sm-4">
        <h4>Type</h4>
        @foreach($types as $type)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="{{ $type->id }}" id="type{{ $type->id }}" name="type[]">
            <label class="form-check-label" for="type">
                {{ $type->name }}
            </label>
        </div>
        @endforeach
    </div>
    <div class="form-group border rounded p-3 col-sm-4">
        <h4>Price</h4>
        <div class="form-group">
            <label for="min_price">From</label>
            <input type="number" class="form-control mb-1" id="min_price" placeholder="Minimum Price" name="min_price"
                required="" value="0">
            <label for="max_price">To</label>
            <input type="number" class="form-control" id="max_price" placeholder="Maximum Price" name="max_price"
                required="" value="999999999999999999999">
        </div>
        <hr />
        <h4>Status</h4>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="status1" name="status[]" checked="">
                <label class="form-check-label" for="status1">
                    Available
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="0" id="status2" name="status[]">
                <label class="form-check-label" for="status2">
                    Not Available
                </label>
            </div>
        </div>
        <hr />
        <h4>Deal</h4>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="rent" id="deal1" name="deal[]">
                <label class="form-check-label" for="deal1">
                    Rent
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="sale" id="deal2" name="deal[]">
                <label class="form-check-label" for="deal2">
                    Sale
                </label>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-secondary">Search</button>
</form>
@endsection
