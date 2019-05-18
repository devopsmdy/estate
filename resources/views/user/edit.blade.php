@extends('layout.master')

@section('content')
<div class="container border rounded p-3 mb-3">
    <h3>Edit Password</h3>
    <hr />
    <form method="POST" action="/user/update">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="type">Old</label>
            <input type="password" class="form-control" id="old_password" name="old_password" required>
        </div>
        <div class="form-group">
            <label for="type">New</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="type">Confirm</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>
        <input type="hidden" name="user_id" value="{{$user_id}}" required>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>

@if($errors->any())
<div class="container p-3 mb-3">
    @include('layout.errors')
</div>
@endif

@if (session('status'))
<div class="alert alert-info">
    {{ session('status') }}
</div>
@endif


@endsection